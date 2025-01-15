<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        $this->call(UserSeeder::class);
        $this->call(FamilySeeder::class);
        $this->call(OptionSeeder::class);

        Product::factory(50)->create();
    }
}
