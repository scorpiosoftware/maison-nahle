<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\ProductImage;

class ConvertImagesToWebp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:convert-to-webp 
                            {--days=7 : Convert images from last N days}
                            {--quality=85 : WebP quality (1-100)}
                            {--delete-original : Delete original files after conversion}
                            {--update-database : Update database records to point to new WebP files}
                            {--folder= : Target specific folder (relative to storage/app/public)}
                            {--path= : Full custom path (absolute or relative to project root)}
                            {--max-depth=10 : Maximum directory depth to scan}
                            {--show-structure : Show folder structure before conversion}
                            {--dry-run : Show what would be converted without actually converting}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert images in complex nested storage structure to WebP format';

    /**
     * Supported image extensions
     *
     * @var array
     */
    protected $supportedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff'];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = $this->option('days');
        $quality = (int) $this->option('quality');
        $deleteOriginal = $this->option('delete-original');
        $updateDatabase = $this->option('update-database');
        $targetFolder = $this->option('folder');
        $customPath = $this->option('path');
        $maxDepth = (int) $this->option('max-depth');
        $showStructure = $this->option('show-structure');
        $dryRun = $this->option('dry-run');
        
        // Determine target path
        if ($customPath) {
            // Handle custom path
            if (str_starts_with($customPath, '/')) {
                // Absolute path
                $storagePath = $customPath;
            } else {
                // Relative to project root
                $storagePath = base_path($customPath);
            }
            $this->info("Using custom path: {$storagePath}");
        } else {
            // Default storage path
            $storagePath = storage_path('app/public');
            
            // Target specific folder if provided
            if ($targetFolder) {
                $storagePath = $storagePath . '/' . trim($targetFolder, '/');
                $this->info("Targeting folder: {$targetFolder}");
            }
        }
        
        if (!is_dir($storagePath)) {
            $this->error("Target directory does not exist: {$storagePath}");
            return 1;
        }

        $this->info("Scanning storage structure...");
        $this->info("Base path: " . str_replace(storage_path('app/public'), '', $storagePath));
        $this->info("Max depth: {$maxDepth} levels");
        $this->info("Days filter: {$days} days");
        $this->info("Quality: {$quality}%");
        
        if ($updateDatabase) {
            $this->info("Database records will be updated");
        }
        
        if ($dryRun) {
            $this->warn("DRY RUN MODE - No files will be converted");
        }

        $manager = new ImageManager(new Driver());
        $cutoffDate = now()->subDays($days);
        
        // Get folder structure and images
        $folderStructure = $this->analyzeFolderStructure($storagePath, $maxDepth);
        $imageFiles = $this->getRecentImageFiles($storagePath, $cutoffDate, $maxDepth);
        
        // Show structure if requested
        if ($showStructure) {
            $this->displayFolderStructure($folderStructure);
            
            if (!$this->confirm('Continue with conversion?')) {
                $this->info('Conversion cancelled.');
                return 0;
            }
        }
        
        if (empty($imageFiles)) {
            $this->info("No recent images found to convert in the scanned directories.");
            return 0;
        }

        $this->displayImageSummary($imageFiles);
        
        $progressBar = $this->output->createProgressBar(count($imageFiles));
        $progressBar->start();
        
        $converted = 0;
        $errors = 0;
        $databaseUpdates = 0;
        $folderStats = [];

        foreach ($imageFiles as $filePath) {
            try {
                $relativePath = str_replace(storage_path('app/public') . '/', '', $filePath);
                $folder = dirname($relativePath);
                
                // Track stats per folder
                if (!isset($folderStats[$folder])) {
                    $folderStats[$folder] = ['converted' => 0, 'errors' => 0];
                }
                
                if ($dryRun) {
                    $this->line("\nWould convert: {$relativePath}");
                    if ($updateDatabase) {
                        $this->checkDatabaseReferences($relativePath, true);
                    }
                    $folderStats[$folder]['converted']++;
                } else {
                    $webpPath = $this->convertToWebp($manager, $filePath, $quality, $deleteOriginal);
                    $converted++;
                    $folderStats[$folder]['converted']++;
                    
                    // Update database records if requested
                    if ($updateDatabase && $webpPath) {
                        $webpRelativePath = str_replace(storage_path('app/public') . '/', '', $webpPath);
                        $updates = $this->updateDatabaseReferences($relativePath, $webpRelativePath);
                        $databaseUpdates += $updates;
                    }
                }
                
            } catch (\Exception $e) {
                $errors++;
                $folderStats[$folder]['errors']++;
                $this->line("\nError converting {$filePath}: " . $e->getMessage());
            }
            
            $progressBar->advance();
        }
        
        $progressBar->finish();
        $this->newLine(2);
        
        // Display results
        $this->displayResults($dryRun, $converted, $errors, $databaseUpdates, $folderStats);
        
        return 0;
    }

    /**
     * Analyze folder structure
     */
    protected function analyzeFolderStructure($basePath, $maxDepth)
    {
        $structure = [];
        
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($basePath, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        $iterator->setMaxDepth($maxDepth);

        foreach ($iterator as $file) {
            if ($file->isDir()) {
                $relativePath = str_replace($basePath . '/', '', $file->getPathname());
                $depth = $iterator->getDepth();
                $structure[] = [
                    'path' => $relativePath,
                    'depth' => $depth,
                    'full_path' => $file->getPathname()
                ];
            }
        }
        
        return $structure;
    }

    /**
     * Get recent image files with depth limit
     */
    protected function getRecentImageFiles($storagePath, $cutoffDate, $maxDepth)
    {
        $files = collect();
        
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($storagePath, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );
        $iterator->setMaxDepth($maxDepth);

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $extension = strtolower($file->getExtension());
                
                // Skip if already WebP
                if ($extension === 'webp') {
                    continue;
                }
                
                // Check if it's a supported image format
                if (in_array($extension, $this->supportedExtensions)) {
                    $fileTime = \Carbon\Carbon::createFromTimestamp($file->getMTime());
                    
                    // Check if file is recent enough
                    if ($fileTime->gte($cutoffDate)) {
                        $files->push($file->getPathname());
                    }
                }
            }
        }

        return $files;
    }

    /**
     * Display folder structure
     */
    protected function displayFolderStructure($structure)
    {
        $this->info("\nFolder Structure:");
        $this->info(str_repeat('=', 50));
        
        foreach ($structure as $folder) {
            $indent = str_repeat('  ', $folder['depth']);
            $this->line($indent . '📁 ' . $folder['path']);
        }
        
        $this->info(str_repeat('=', 50));
        $this->info("Total folders found: " . count($structure));
    }

    /**
     * Display image summary by folder
     */
    protected function displayImageSummary($imageFiles)
    {
        $folderCounts = [];
        
        foreach ($imageFiles as $filePath) {
            $relativePath = str_replace(storage_path('app/public') . '/', '', $filePath);
            $folder = dirname($relativePath);
            
            if (!isset($folderCounts[$folder])) {
                $folderCounts[$folder] = 0;
            }
            $folderCounts[$folder]++;
        }
        
        $this->info("\nImages found by folder:");
        $this->info(str_repeat('=', 50));
        
        foreach ($folderCounts as $folder => $count) {
            $this->line("📁 {$folder}: {$count} images");
        }
        
        $this->info(str_repeat('=', 50));
        $this->info("Total images: " . count($imageFiles));
        $this->newLine();
    }

    /**
     * Display final results
     */
    protected function displayResults($dryRun, $converted, $errors, $databaseUpdates, $folderStats)
    {
        if ($dryRun) {
            $this->info("DRY RUN COMPLETED!");
        } else {
            $this->info("CONVERSION COMPLETED!");
        }
        
        $this->info(str_repeat('=', 50));
        
        // Overall stats
        if ($dryRun) {
            $this->info("Would convert: " . array_sum(array_column($folderStats, 'converted')) . " images");
        } else {
            $this->info("Successfully converted: {$converted} images");
            if ($databaseUpdates > 0) {
                $this->info("Database records updated: {$databaseUpdates}");
            }
        }
        
        if ($errors > 0) {
            $this->warn("Errors encountered: {$errors}");
        }
        
        // Per-folder breakdown
        if (!empty($folderStats)) {
            $this->newLine();
            $this->info("Results by folder:");
            $this->info(str_repeat('-', 50));
            
            foreach ($folderStats as $folder => $stats) {
                $status = $dryRun ? 'would convert' : 'converted';
                $line = "📁 {$folder}: {$status} {$stats['converted']}";
                
                if ($stats['errors'] > 0) {
                    $line .= " (errors: {$stats['errors']})";
                }
                
                $this->line($line);
            }
        }
    }

    /**
     * Convert image to WebP format
     */
    protected function convertToWebp($manager, $filePath, $quality, $deleteOriginal)
    {
        $pathInfo = pathinfo($filePath);
        $webpPath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '.webp';
        
        // Skip if WebP version already exists
        if (file_exists($webpPath)) {
            return $webpPath;
        }

        // Load and convert image
        $image = $manager->read($filePath);
        $image->toWebp((int) $quality)->save($webpPath);
        
        // Delete original if requested
        if ($deleteOriginal) {
            unlink($filePath);
        }
        
        return $webpPath;
    }

    /**
     * Update database references from old path to new WebP path
     */
    protected function updateDatabaseReferences($oldPath, $newWebpPath)
    {
        $updates = 0;
        
        // Update Product main_image_url
        $productUpdates = Product::where('main_image_url', $oldPath)
            ->update(['main_image_url' => $newWebpPath]);
        $updates += $productUpdates;
        
        // Update ProductImage image_url
        $imageUpdates = ProductImage::where('image_url', $oldPath)
            ->update(['image_url' => $newWebpPath]);
        $updates += $imageUpdates;
        
        return $updates;
    }

    /**
     * Check what database references would be updated (dry run)
     */
    protected function checkDatabaseReferences($oldPath, $dryRun = false)
    {
        $productCount = Product::where('main_image_url', $oldPath)->count();
        $imageCount = ProductImage::where('image_url', $oldPath)->count();
        
        $total = $productCount + $imageCount;
        
        if ($total > 0 && $dryRun) {
            $this->line("  → Would update {$total} database records");
        }
        
        return $total;
    }
}