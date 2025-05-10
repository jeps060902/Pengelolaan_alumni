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
            'angkatan' => '1',
            'Jurusan' => 'RPL',
        ]);
        Alumni::create([
            'Nama' => 'Jeps',
            'angkatan' => '1',
            'Jurusan' => 'Akuntansi',
        ]);
        Alumni::create([
            'Nama' => 'Jeps',
            'angkatan' => '1',
            'Jurusan' => 'Perhotelan',
        ]);
    }
}
