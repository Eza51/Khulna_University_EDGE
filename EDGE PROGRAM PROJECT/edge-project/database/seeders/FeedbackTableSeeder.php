<?php

// database/seeders/FeedbackTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feedback;

class FeedbackTableSeeder extends Seeder
{
    public function run()
    {
        Feedback::create([
            'comment' => 'Great course!',
            'student_id' => 1,  // Assuming student_id 1 refers to John Doe
            'teacher_id' => 1,   // Assuming teacher_id 1 refers to Dr. Alice Johnson
        ]);
        
        Feedback::create([
            'comment' => 'Informative lecture!',
            'student_id' => 2,  // Assuming student_id 2 refers to Jane Smith
            'teacher_id' => 2,   // Assuming teacher_id 2 refers to Prof. Bob Lee
        ]);
    }
}

