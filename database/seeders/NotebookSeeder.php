<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notebook;

class NotebookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notebook::factory()->count(10)->create();
    }
}
