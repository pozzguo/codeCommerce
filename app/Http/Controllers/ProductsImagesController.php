<?php

namespace codeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use codeCommerce\Http\Requests;
use codeCommerce\Http\Controllers\Controller;

use codeCommerce\Product;
use codeCommerce\ProductImage;
use codeCommerce\Http\Requests\ProductImageRequest;

class ProductsImagesController extends Controller
{
    private $productModel;
    
    public function __construct(Product $product) {
    
        $this->productModel = $product;
      
    }
    
    public function index($id){
        
        $product = $this->productModel->find($id);
        return view('products.images.index', compact('product'));
        
    }
    
    public function create($id){
        
        $product = $this->productModel->find($id);
        
        return view('products.images.create', compact('product'));
        
    }
    
    public function store(ProductImageRequest $request, $id, ProductImage $productImage){
        
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        
        $image = $productImage::create(['product_id' => $id,'extension'=>$extension]);
        
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        
        return redirect()->route('products.images.index',['id' => $id]);
   
    }
    
    public function destroy($id, $idImage, ProductImage $productImage){
        
        $image = $productImage->find($idImage);
        
        $fileName = $image->id.'.'.$image->extension;
        
        if (Storage::disk('public_local')->exists($fileName)){
        
            Storage::disk('public_local')->delete($fileName);
                    
        }
        
        $image->delete();
        
        return redirect()->route('products.images.index',['id' => $id]);

    }
}
