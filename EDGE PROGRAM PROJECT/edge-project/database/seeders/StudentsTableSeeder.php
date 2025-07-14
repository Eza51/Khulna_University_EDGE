<?php

// database/seeders/StudentsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'name' => 'EZA',
            'course_id' => 1,  // Assuming course_id 1 refers t
        ]);
        
        Student::create([
            'name' => 'pompom',
            'course_id' => 2,  // Assuming course_id 2 refers t
        ]);
    }
}
