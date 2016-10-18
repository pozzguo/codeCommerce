<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

//use Faker\Factory as Faker;
use codeCommerce\Status;

class StatusTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('status')->truncate();

        factory('codeCommerce\Status')->create(
                [
                    'description' => 'Em processamento',
                ]
        );
        
        factory('codeCommerce\Status')->create(
                [
                    'description' => 'Aguardando Pagamento',
                ]
        );
        
        factory('codeCommerce\Status')->create(
                [
                    'description' => 'Pagamento em Análise',
                ]
        );
        
        factory('codeCommerce\Status')->create(
                [
                    'description' => 'Pago',
                ]
        );
        
        factory('codeCommerce\Status')->create(
                [
                    'description' => 'Separado para entrega',
                ]
        );
        
        factory('codeCommerce\Status')->create(
                [
                    'description' => 'Postado',
                ]
        );
        
        factory('codeCommerce\Status')->create(
                [
                    'description' => 'Entregue',
                ]
        );
        
        factory('codeCommerce\Status')->create(
                [
                    'description' => 'Cancelado',
                ]
        );
        
        factory('codeCommerce\Status')->create(
                [
                    'description' => 'Extraviado',
                ]
        );
        
        
    }

}
