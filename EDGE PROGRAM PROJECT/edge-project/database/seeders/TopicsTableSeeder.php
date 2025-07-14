<?php

// database/seeders/TopicsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        Topic::create([
            'name' => 'npm',
            'course_id' => 1,  // Assuming course_id 1 refers to Computer Science
        ]);
        
        Topic::create([
            'name' => 'validation,verification',
            'course_id' => 1,  // Assuming course_id 1 refers to Computer Science
        ]);
        
        Topic::create([
            'name' => 'Control Structures',
            'course_id' => 2,  // Assuming course_id 2 refers to Electrical Engineering
        ]);
    }
}
