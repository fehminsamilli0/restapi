<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('products')->truncate();
        DB::table('products')->insert([
            'name' =>'Car',
            'slug'=>'car',
            'description'=>'hello some',
            'price'=> 19.8
        ]);
        Product::factory(100)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
