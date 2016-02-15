<?php

namespace codeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use codeCommerce\Http\Requests;
use codeCommerce\Http\Controllers\Controller;

use codeCommerce\Product;

class ProductsController extends Controller
{
   private $productModel;
    
    public function __construct(Product $product) {
    
        $this->productModel = $product;
    
        
    }
    
    public function index(){
        
        $products = $this->productModel->all();
             
        return view("products.index",  compact('products'));
            
    }
    
    public function create(){
        
        return view("products.create");
        
    }
    
    public function store(Requests\ProductRequest $request){
        
        $input = $request->all();
        
        $product = $this->productModel->fill($input);
        
        $product->save();
        
        return redirect()->route('products.index');
    }
    
    public function destroy($id){
        
        $product = $this->productModel->find($id)->delete();
        
        return redirect()->route('products.index');
    }
    
    public function edit($id){
        
        $product = $this->productModel->find($id);
        
        return view("products.edit",  compact('product'));
    }
    
    public function update(Requests\ProductRequest $request, $id){
        
        $input = $request->all();
        
        $product = $this->productModel->find($id)->update($input);
        
        return redirect()->route('products.index');
    }
}
