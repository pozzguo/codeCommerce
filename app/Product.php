<?php

namespace codeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    public function category() {
        
        return $this->belongsTo('codeCommerce\Category');
                
    }

}
