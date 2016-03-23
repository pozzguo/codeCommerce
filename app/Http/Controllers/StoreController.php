<?php

  namespace codeCommerce\Http\Controllers;

  use Illuminate\Http\Request;
  use codeCommerce\Http\Requests;
  use codeCommerce\Http\Controllers\Controller;
  use codeCommerce\Category;
  use codeCommerce\Product;

  class StoreController extends Controller {

      private $categoryModel;
      private $productModel;

      public function __construct(Category $category, Product $product) {

          $this->categoryModel = $category;

          $this->productModel = $product;
      }

      public function index() {

          $categories = $this->categoryModel->orderBy('name')->get();

          $productFeatured    = $this->productModel->featured();
          $productRecommended = $this->productModel->recommended();

          return view('store.index', compact('categories', 'productFeatured','productRecommended'));
      }
      
      public function category($id){
          
          $categories = $this->categoryModel->orderBy('name')->get();
          
          $category = $this->categoryModel->find($id);

          $productOfCategory = $this->productModel->productOfCategory($id);
     
          
          return view('store.category', compact('categories', 'category', 'productOfCategory'));
      }
      
      public function product($id){
          
          $categories = $this->categoryModel->orderBy('name')->get();
          
          $product = $this->productModel->find($id);

          return view('store.product', compact('categories', 'product'));
      }

  }
  