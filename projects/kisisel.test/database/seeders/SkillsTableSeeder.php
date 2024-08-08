<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillsTableSeeder extends Seeder
{
    public function run()
    {
        Skill::create(['name' => 'Bootstrap', 'progress' => 85]);
        Skill::create(['name' => 'React', 'progress' => 75]);
        Skill::create(['name' => 'Vue', 'progress' => 65]);
        Skill::create(['name' => 'WordPress', 'progress' => 25]);
    }
}
