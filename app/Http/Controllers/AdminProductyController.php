<?php

namespace codeCommerce\Http\Controllers;

use codeCommerce\Producty;

class AdminProductyController extends Controller
{
    private $producties;
    
    public function __construct(Producty $producty) {
        $this->producties = $producty;
    }
    
    public function index() {
        
        $producties = $this->producties->all();
             
        return view("adminproducty",  compact('producties'));
        
    }
}