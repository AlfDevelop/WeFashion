<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use WeFashion\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 80)->create();
    }
}
