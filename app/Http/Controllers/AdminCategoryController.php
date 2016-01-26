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
    
    public function create() {
        
        return "categoryCreate";
        
    }
    
    public function read($id) {
        
        return "categoryRead: {$id}";
        
    }
    
    public function update($id) {
        
        return "categoryUpdate: {$id}";
        
    }
    
    public function delete($id) {
        
        return "categoryDelete: {$id}";
        
    }
    
    public function postCreate() {
        
        return "categoryCreate: POST!";
        
    }
    
    public function putUpdate() {
        
        return "categoryUpdate: PUT!";
        
    }
    
    public function deleteDelete() {
        
        return "categoryDelete: DELETE!";
        
    }
    
}