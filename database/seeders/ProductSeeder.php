<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Sản phẩm 1',
            'views' => 100
        ]);

        Product::create([
            'title' => 'Sản phẩm 2',
            'views' => 200
        ]);

        Product::create([
            'title' => 'Sản phẩm 3',
            'views' => 50
        ]);
    }
}
