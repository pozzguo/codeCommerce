<?php

namespace codeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description'];
    
    public function products(){
        
        return $this->hasMany('codeCommerce\Product');
        
    }
}
