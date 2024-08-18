<?php

namespace Database\Seeders;

use App\Models\Home;
use App\Models\HomeSocialLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Home::truncate();
        $home = Home::create([
            'title' => 'Mr. Taimoor Hussain',
            'description' => 'A Software Engineer Based In Karachi, Pk.',
            'bg-image' => url('website/images/covers/img.png')
        ]);
        HomeSocialLink::insert([
            [
                'link' => 'https://x.com/Mohamma97977712',
                'svg' => url('website/images/social-links/twitter.svg'),
                'home_id' => $home->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link' => 'https://github.com/taimoorKVD',
                'svg' => url('website/images/social-links/github.svg'),
                'home_id' => $home->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link' => 'https://www.linkedin.com/in/hafiz-mohammad-taimoor-hussain',
                'svg' => url('website/images/social-links/linkedin.svg'),
                'home_id' => $home->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
