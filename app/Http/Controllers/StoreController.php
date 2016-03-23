<?php

  namespace codeCommerce\Http\Controllers;

  use Illuminate\Http\Request;
  use codeCommerce\Http\Requests;
  use codeCommerce\Http\Controllers\Controller;
  use codeCommerce\Category;
  use codeCommerce\Product;
  use codeCommerce\Tag;

  class StoreController extends Controller {

      private $categoryModel;
      private $productModel;
      private $tagModel;

      public function __construct(Category $category, Product $product, Tag $tag) {

          $this->categoryModel = $category;

          $this->productModel = $product;
          
          $this->tagModel = $tag;
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
      
      public function tag($id){
          
          $categories = $this->categoryModel->orderBy('name')->get();
          
          $tag = $this->tagModel->find($id);
          
          $productOfTag = $tag->products;
          
          return view('store.tag', compact('categories', 'tag', 'productOfTag'));
      }

  }
  