<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use Faker\Factory as Faker;

use codeCommerce\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        
        factory('codeCommerce\Category',15)->create();
        
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
