<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

//use Faker\Factory as Faker;
use codeCommerce\User;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->truncate();

        factory('codeCommerce\User')->create(
                [
                    'name' => 'Admin',
                    'email' => 'admin@codecommerce.com.br',
                    'password' => bcrypt('12345'),
                    'is_admin' => 1
                ]
        );
        
        factory('codeCommerce\User',10)->create();

        /*
          User::create([
          'name' => 'Walter',
          'email' => 'walter@todotech.com.br',
          'password' => Hash::make('12345'),
          ]);


          $faker = Faker::create();


          foreach (range(2,10) as $i){

          User::create([
          'name' => $faker->name(),
          'email' => $faker->email(),
          'password' => Hash::make($faker->word()),
          ]);

          }
         * 
         */
    }

}
