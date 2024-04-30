<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Categories::create(['name' => 'Single Room']);
        Categories::create(['name' => 'Double Room']);
        Categories::create(['name' => 'Bedsitter']);
        Categories::create(['name' => 'One-bed Room']);
        Categories::create(['name' => 'Two-bed Room']);
        Categories::create(['name' => 'Three-bed Room']);
        Categories::create(['name' => 'Mansion']);
        Categories::create(['name' => 'Studio']);
    }
}
