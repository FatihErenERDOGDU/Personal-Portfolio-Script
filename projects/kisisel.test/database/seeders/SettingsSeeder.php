<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'logo_url' => 'https://example.com/logo.png',
                'twitter_url' => 'https://twitter.com/example',
                'linkedin_url' => 'https://linkedin.com/company/example',
                'facebook_url' => 'https://facebook.com/example',
                'instagram_url' => 'https://instagram.com/example',
            ]
        );
    }
}
