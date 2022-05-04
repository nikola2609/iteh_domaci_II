<?php

namespace Database\Seeders;

use App\Models\Ispit;
use App\Models\Prijava;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        User::truncate();
        Student::truncate();
        Ispit::truncate();
        Prijava::truncate();

        $studenti = Student::factory(2)->create();
        $ispiti = Ispit::factory(3)->create();

        foreach ($ispiti as $ispit) {
            Prijava::factory()->create([
                'student_id' => $studenti[0]->id,
                'ispit_id' => $ispit->id
            ]);
            Prijava::factory()->create([
                'student_id' => $studenti[1]->id,
                'ispit_id' => $ispit->id
            ]);
        }
    }
}
