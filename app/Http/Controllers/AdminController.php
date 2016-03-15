<?php

namespace codeCommerce\Http\Controllers;

class AdminController extends Controller
{
    public function index() {
        
        $nome = 'Walter';
        $sobrenome = 'Pozzguo';
        
        return view("admin",compact('nome','sobrenome'));
        
    }
}

