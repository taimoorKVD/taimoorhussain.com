<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::truncate();
        Home::create([
            'title' => 'Mr. Taimoor Hussain',
            'description' => 'A Software Engineer Based In Karachi, Pk.',
            'image' => url('website/images/covers/img.png'),
            'social_link' => [
                [
                    'link' => 'https://x.com/Mohamma97977712',
                    'svg' => url('website/images/social-links/twitter.svg'),
                ],
                [
                    'link' => 'https://github.com/taimoorKVD',
                    'svg' => url('website/images/social-links/github.svg'),
                ],
                [
                    'link' => 'https://www.linkedin.com/in/hafiz-mohammad-taimoor-hussain',
                    'svg' => url('website/images/social-links/linkedin.svg'),
                ]
            ]
        ]);
    }
}
