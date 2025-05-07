<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'name' => 'Machine Learning',
            'color' => 'blue',
            'slug' => 'machine-learning'

        ]);
        Kategori::create([
            'name' => 'Data Structure',
            'color' => 'red',
            'slug' => 'data-scructure'
        ]);
        Kategori::create([
            'name' => 'Web Design',
            'color' => 'yellow',
            'slug' => 'web-design'
        ]);
        Kategori::create([
            'name' => 'UI UX',
            'color' => 'green',
            'slug' => 'ui-ux'
        ]);
    }
}
