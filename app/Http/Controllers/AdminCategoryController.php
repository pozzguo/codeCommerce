<?php

namespace codeCommerce\Http\Controllers;

use codeCommerce\Category;

class AdminCategoryController extends Controller
{
    private $categories;
    
    public function __construct(Category $category) {
        $this->categories = $category;
    }
    
    public function index() {
        
        $categories = $this->categories->all();
             
        return view("admincategory",  compact('categories'));
        
    }
}