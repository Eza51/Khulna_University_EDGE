<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        Course::create(['name' => 'Laravel']);
        Course::create(['name' => 'Python']);
        Course::create(['name' => 'Ms Word']);
    }
}
