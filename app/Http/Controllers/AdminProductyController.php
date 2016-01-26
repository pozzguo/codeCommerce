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
    
    public function create() {
        
        return "productyCreate";
        
    }
    
    public function read($id) {
        
        return "productyRead: {$id}";
        
    }
    
    public function update($id) {
        
        return "productyUpdate: {$id}";
        
    }
    
    public function delete($id) {
        
        return "productyDelete: {$id}";
        
    }
    
    public function postCreate() {
        
        return "productyCreate: POST!";
        
    }
    
    public function putUpdate() {
        
        return "productyUpdate: PUT!";
        
    }
    
    public function deleteDelete() {
        
        return "productyDelete: DELETE!";
        
    }
}