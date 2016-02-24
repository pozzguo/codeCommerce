<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use Faker\Factory as Faker;

use codeCommerce\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        
        factory('codeCommerce\Product',40)->create();
        
        /*
        
        $faker = Faker::create();
        
        
        foreach (range(1,15) as $i){
        
        Category::create([
           'name' => $faker->word(),
           'description' => $faker->sentence(),
        ]);
        
        }
         * 
         */
    }
}
