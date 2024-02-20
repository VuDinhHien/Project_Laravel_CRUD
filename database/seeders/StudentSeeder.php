<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Course;
use App\Models\Student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $f = Faker::create();
        $courseIds = Course::pluck('id');

        for($i = 0; $i<10; $i ++){
            Student::create([
                'name' => $f->name(),
                'gender' => $f->randomElement(['Male', 'Female', 'other']),
                'birthday' => $f->date(),
                'address' => $f->city(),
                'phone'=> $f->numerify('0#########'),
                'courseId' => $courseIds->random()


             ]);
        }
    }
}
