<?php

  namespace codeCommerce;

  use Illuminate\Database\Eloquent\Model;

  class Status extends Model {
      
      protected $table = 'status';


      protected $fillable =[
          'description'
      ];

      public function orders() {

          return $this->hasMany('codeCommerce\Order');
      }

  }
  