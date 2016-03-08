<?php

namespace codeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use codeCommerce\Http\Requests;
use codeCommerce\Http\Controllers\Controller;

use codeCommerce\Product;
use codeCommerce\Category;
use codeCommerce\Tag;

class ProductsController extends Controller
{
   private $productModel;
    
    public function __construct(Product $product) {
    
        $this->productModel = $product;
    
        
    }
    
    public function index(){
        
        $products = $this->productModel->paginate(10);
             
        return view("products.index",  compact('products'));
            
    }
    
    public function create(\codeCommerce\Category $category){
        
        $categories = $category->lists('name','id');
        return view("products.create", compact('categories'));
        
    }
    
    public function store(Requests\ProductRequest $request){
        
        $input = $request->all();
        
        $product = $this->productModel->fill($input);
        
        $product->save();
        
        $tags = $request->tags;
        
        $t = $this->addTags($product, $tags);
        
        return redirect()->route('products.index');
    }
    
    private function addTags($product,$tags){
        
        //Insert New Tags or get a id for existents tags:
        $idsTags = array(); //Initiates array to get tag's ids
        $tags = strtolower($tags); //All tags to lower case!
        $tagsArray = explode(",",$tags); //Transform tags strings in array
   
        foreach ($tagsArray as $tag){
            $tag=  trim($tag);
            $newTag = Tag::firstOrCreate(['name' => $tag]);
            $idsTags[] = $newTag->id;
        }
        
        //Attach tags with array idsTags by Sinc():
        sort($idsTags);
        $product->tags()->sync($idsTags);
        
        return;
        
    }
    
    public function destroy($id){
        
        $product = $this->productModel->find($id)->delete();
        
        return redirect()->route('products.index');
    }
    
    public function edit($id,  Category $category){
        
       $categories = $category->lists('name','id');
        
        $product = $this->productModel->find($id);
        
        return view("products.edit",  compact('product','categories'));
    }
    
    public function update(Requests\ProductRequest $request, $id){
        
        $input = $request->all();
        
        $product = $this->productModel->find($id);
        $product->update($input);
        
        $tags = $request->tags;
        
        $t = $this->addTags($product, $tags);
        
        return redirect()->route('products.index');
    }
}
