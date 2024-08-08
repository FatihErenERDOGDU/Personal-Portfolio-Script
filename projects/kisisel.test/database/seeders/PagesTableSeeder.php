<?php
// database/seeders/PagesTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->insert([
            [
                'title' => 'Home',
                'slug' => 'home',
                'content' => 'This is the home page content.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'About Me',
                'slug' => 'about-me',
                'content' => 'This is the about me page content.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Skills',
                'slug' => 'skills',
                'content' => 'This is the skills page content.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Blog',
                'slug' => 'blog',
                'content' => 'This is the blog page content.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'content' => 'This is the contact page content.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
