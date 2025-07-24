<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socialPlatforms = [
            [
                'name' => 'WhatsApp',
                'url' => 'https://wa.me/1234567890', // Replace with your WhatsApp number
                'icon' => null, // You can manually upload icons later
                'is_active' => true,
            ],
            [
                'name' => 'Facebook',
                'url' => 'https://facebook.com/yourpage', // Replace with your Facebook page
                'icon' => null, // You can manually upload icons later
                'is_active' => true,
            ],
            [
                'name' => 'Instagram',
                'url' => 'https://instagram.com/yourusername', // Replace with your Instagram username
                'icon' => null, // You can manually upload icons later
                'is_active' => true,
            ],
            [
                'name' => 'TikTok',
                'url' => 'https://tiktok.com/@yourusername', // Replace with your TikTok username
                'icon' => null, // You can manually upload icons later
                'is_active' => true,
            ],
        ];

        // Clear existing records (optional)
        Social::truncate();

        foreach ($socialPlatforms as $platform) {
            Social::create($platform);
        }

        $this->command->info('✅ Social media platforms seeded successfully!');
        $this->command->info('💡 Remember to update the URLs with your actual social media links');
        $this->command->info('📷 You can upload icons through the web interface');
    }
}