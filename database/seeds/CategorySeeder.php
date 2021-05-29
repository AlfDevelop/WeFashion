<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'Hommes',
            'description' => 'Vêtements pour hommes',
            'active' => 1,
            'id_parent' => 0
        ]);
        DB::table('categories')->insert([
            'title' => 'Femmes',
            'description' => 'Vêtements pour femmes',
            'active' => 1,
            'id_parent' => 0
        ]);
    }
}
