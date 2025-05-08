<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alumni::create([
            'Nama' => 'Jeps',
            'angkatan_id' => '1',
            'Jurusan_id' => '1',
        ]);
        Alumni::create([
            'Nama' => 'Jeps',
            'angkatan_id' => '1',
            'Jurusan_id' => '2',
        ]);
        Alumni::create([
            'Nama' => 'Jeps',
            'angkatan_id' => '1',
            'Jurusan_id' => '3',
        ]);
    }
}
