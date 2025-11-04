<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //gunanya memanggil factory untuk membuat 50 data palsu di tabel todos
        \App\Models\Todo::factory(15)->create();
    }
}
