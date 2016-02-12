<?php

namespace codeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use codeCommerce\Http\Requests;
use codeCommerce\Http\Controllers\Controller;
use codeCommerce\Category;

class CategoriesController extends Controller
{
    private $categoryModel;
    
    public function __construct(Category $category) {
    
        $this->categoryModel = $category;
    
        
    }
    
    public function index(){
        
        $categories = $this->categoryModel->all();
             
        return view("categories.index",  compact('categories'));
            
    }
    
    public function create(){
        return view("categories.create");
    }
    
    public function store(Requests\CategoryRequest $request){
        
        $input = $request->all();
        
        $category = $this->categoryModel->fill($input);
        
        $category->save();
        
        return redirect()->route('categories.index');
    }
    
    public function destroy($id){
        
        $category = $this->categoryModel->find($id)->delete();
        
        return redirect()->route('categories.index');
    }
    
    public function edit($id){
        
        $category = $this->categoryModel->find($id);
        
        return view("categories.edit",  compact('category'));
    }
    
    public function update(Requests\CategoryRequest $request, $id){
        
        $input = $request->all();
        
        $category = $this->categoryModel->find($id)->update($input);
        
        return redirect()->route('categories.index');
    }
}
