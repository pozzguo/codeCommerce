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
    
    public function images() {
        
        return $this->hasMany('codeCommerce\ProductImage');
                
    }
    
    public function tags() {
        
        return $this->belongsToMany('codeCommerce\Tag');
                
    }
    
    public function getProductTagAttribute(){
        
        $tags = $this->tags->lists('name')->all();
        return implode(',',$tags);
        return "tags,tags,tags,tags";
    }
    
    public function scopeFeatured($query){
        
        return $query->where('featured',    '=', 1)->orderBy('name')->get();
        
    }
    
    
    public function scopeRecommended($query){
        
        return $query->where('recommend', '=', 1)->orderBy('name')->get();
        
    }
    
    public function scopeProductOfCategory($query,$id){
        
        return $query->where('category_id', '=', $id)->orderBy('name')->get();
        
    }
}
