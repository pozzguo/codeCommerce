<?php

namespace codeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'extension'
    ];
    
    
    public function product(){
        
        return $this->belongsTo('codeCommerce\Product');
        
    }
}
