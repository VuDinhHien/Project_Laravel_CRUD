<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $f = Faker::create();
        for($i = 0; $i<10; $i ++){
            Course::create([
                'courseName' => $f->sentence(1, true),
                'teacher' => $f->name()
     
             ]);
        }
    }
}
