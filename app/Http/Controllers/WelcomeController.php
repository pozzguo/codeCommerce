<?php

namespace codeCommerce\Http\Controllers;

class WelcomeController extends Controller
{
    public function index() {
        
        $nome = 'Walter';
        $sobrenome = 'Pozzguo';
        
        return view("welcome",compact('nome','sobrenome'));
        
    }
}

