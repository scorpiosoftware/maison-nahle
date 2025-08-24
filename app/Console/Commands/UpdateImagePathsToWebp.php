<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class UpdateImagePathsToWebp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:update-database-to-webp 
                            {table : Table name to update}
                            {field : Field name containing image paths}
                            {--id-field=id : Primary key field name (default: id)}
                            {--verify-files : Only update if WebP file actually exists}
                            {--from-extensions=jpg,jpeg,png,gif,bmp,tiff : Extensions to convert from}
                            {--storage-disk=public : Storage disk to check files (public, local, s3, etc)}
                            {--dry-run : Show what would be updated without actually updating}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update database image paths to use WebP extensions for any table and field';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $table = $this->argument('table');
        $field = $this->argument('field');
        $idField = $this->option('id-field');
        $verifyFiles = $this->option('verify-files');
        $fromExtensions = explode(',', $this->option('from-extensions'));
        $storageDisk = $this->option('storage-disk');
        $dryRun = $this->option('dry-run');

        // Validate inputs
        if (!$this->validateInputs($table, $field, $idField)) {
            return 1;
        }

        $this->info("Updating {$table}.{$field} to use WebP extensions");
        $this->info("ID field: {$idField}");
        $this->info("Storage disk: {$storageDisk}");
        $this->info("Converting from: " . implode(', ', $fromExtensions));
        
        if ($verifyFiles) {
            $this->info("File verification: ENABLED (only update if WebP exists)");
        }
        
        if ($dryRun) {
            $this->warn("DRY RUN MODE - No records will be updated");
        }

        // Get records that need updating
        $records = $this->getRecordsToUpdate($table, $field, $idField, $fromExtensions);
        
        if ($records->isEmpty()) {
            $this->info("No records found that need WebP conversion.");
            return 0;
        }

        $this->info("Found {$records->count()} records to update");
        
        if ($dryRun || $this->confirm("Do you want to continue?")) {
            $this->processRecords($records, $table, $field, $idField, $verifyFiles, $storageDisk, $dryRun);
        } else {
            $this->info("Update cancelled.");
        }

        return 0;
    }

    /**
     * Validate command inputs
     */
    protected function validateInputs($table, $field, $idField)
    {
        // Check if table exists
        if (!Schema::hasTable($table)) {
            $this->error("Table '{$table}' does not exist!");
            return false;
        }

        // Check if field exists
        if (!Schema::hasColumn($table, $field)) {
            $this->error("Field '{$field}' does not exist in table '{$table}'!");
            return false;
        }

        // Check if ID field exists
        if (!Schema::hasColumn($table, $idField)) {
            $this->error("ID field '{$idField}' does not exist in table '{$table}'!");
            return false;
        }

        return true;
    }

    /**
     * Get records that need updating
     */
    protected function getRecordsToUpdate($table, $field, $idField, $fromExtensions)
    {
        $query = DB::table($table)
            ->whereNotNull($field)
            ->where($field, '!=', '')
            ->where($field, 'not like', '%.webp');

        // Add extension filters
        $query->where(function ($subQuery) use ($field, $fromExtensions) {
            foreach ($fromExtensions as $ext) {
                $subQuery->orWhere($field, 'like', "%.{$ext}");
            }
        });

        return $query->select($idField, $field)->get();
    }

    /**
     * Process records for updating
     */
    protected function processRecords($records, $table, $field, $idField, $verifyFiles, $storageDisk, $dryRun)
    {
        $progressBar = $this->output->createProgressBar($records->count());
        $progressBar->start();

        $updated = 0;
        $skipped = 0;
        $errors = 0;
        $extensionStats = [];

        foreach ($records as $record) {
            try {
                $oldPath = $record->{$field};
                $newWebpPath = $this->convertPathToWebp($oldPath);
                
                // Track extension stats
                $extension = strtolower(pathinfo($oldPath, PATHINFO_EXTENSION));
                if (!isset($extensionStats[$extension])) {
                    $extensionStats[$extension] = ['processed' => 0, 'updated' => 0];
                }
                $extensionStats[$extension]['processed']++;

                // Verify WebP file exists if requested
                if ($verifyFiles) {
                    if (!Storage::disk($storageDisk)->exists($newWebpPath)) {
                        $skipped++;
                        $progressBar->advance();
                        continue;
                    }
                }

                if ($dryRun) {
                    $this->line("\nWould update {$table} ID {$record->{$idField}}: {$oldPath} → {$newWebpPath}");
                } else {
                    // Update the record
                    DB::table($table)
                        ->where($idField, $record->{$idField})
                        ->update([$field => $newWebpPath]);
                    
                    $updated++;
                }
                
                $extensionStats[$extension]['updated']++;

            } catch (\Exception $e) {
                $errors++;
                $this->line("\nError updating record ID {$record->{$idField}}: " . $e->getMessage());
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine(2);

        // Display results
        $this->displayUpdateResults($dryRun, $updated, $skipped, $errors, $extensionStats, $table, $field);
    }

    /**
     * Convert file path to WebP equivalent
     */
    protected function convertPathToWebp($imagePath)
    {
        $pathInfo = pathinfo($imagePath);
        return $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '.webp';
    }

    /**
     * Display update results
     */
    protected function displayUpdateResults($dryRun, $updated, $skipped, $errors, $extensionStats, $table, $field)
    {
        if ($dryRun) {
            $this->info("DRY RUN COMPLETED!");
            $this->info("Would update {$updated} records in {$table}.{$field}");
        } else {
            $this->info("DATABASE UPDATE COMPLETED!");
            $this->info("Successfully updated: {$updated} records");
        }

        if ($skipped > 0) {
            $this->warn("Skipped (WebP not found): {$skipped} records");
        }

        if ($errors > 0) {
            $this->error("Errors encountered: {$errors} records");
        }

        // Extension breakdown
        if (!empty($extensionStats)) {
            $this->newLine();
            $this->info("Breakdown by extension:");
            $this->info(str_repeat('-', 40));
            
            foreach ($extensionStats as $ext => $stats) {
                $action = $dryRun ? 'would update' : 'updated';
                $this->line("📄 .{$ext}: {$action} {$stats['updated']}/{$stats['processed']}");
            }
        }
    }

    /**
     * Display image summary by folder for custom paths
     */
    protected function displayImageSummary($imageFiles)
    {
        $folderCounts = [];
        
        foreach ($imageFiles as $filePath) {
            $folder = dirname($filePath);
            
            if (!isset($folderCounts[$folder])) {
                $folderCounts[$folder] = 0;
            }
            $folderCounts[$folder]++;
        }
        
        if (count($folderCounts) <= 10) {
            $this->info("\nRecords found by path:");
            $this->info(str_repeat('=', 50));
            
            foreach ($folderCounts as $folder => $count) {
                $this->line("📁 {$folder}: {$count} records");
            }
            
            $this->info(str_repeat('=', 50));
        }
        
        $this->info("Total records: " . count($imageFiles));
        $this->newLine();
    }

    /**
     * Analyze folder structure
     */
    protected function analyzeFolderStructure($basePath, $maxDepth)
    {
        $structure = [];
        
        if (!is_dir($basePath)) {
            return $structure;
        }
        
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
        // For database updates, we get paths from database, not filesystem
        // This method is kept for compatibility but may not be used in this context
        return collect();
    }

    /**
     * Display folder structure
     */
    protected function displayFolderStructure($structure)
    {
        if (empty($structure)) {
            $this->info("No subdirectories found.");
            return;
        }
        
        $this->info("\nFolder Structure:");
        $this->info(str_repeat('=', 50));
        
        foreach ($structure as $folder) {
            $indent = str_repeat('  ', $folder['depth']);
            $this->line($indent . '📁 ' . $folder['path']);
        }
        
        $this->info(str_repeat('=', 50));
        $this->info("Total folders found: " . count($structure));
    }
}