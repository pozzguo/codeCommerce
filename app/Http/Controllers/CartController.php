<?php

namespace codeCommerce\Http\Controllers;

use Illuminate\Session\Store as Session;

use codeCommerce\Http\Controllers\Controller;

use codeCommerce\Cart as Cart;
use codeCommerce\Product as Product;

class CartController extends Controller
{
    
    private $cart;
    private $session;
    
    /*
     * @param Cart $cart
     */
    
    public function __construct(Cart $cart, Session $session)
    {
            
        $this->cart = $cart;
        $this->session = $session;
        
    }
    
    
    public function getCart(){
        
        if(!$this->session->has('cart')){
            
           $this->session->set('cart', $this->cart);
        }    
            
        return $this->session->get('cart'); 

    }
    
    public function setCart($cart){
        
        $this->cart = $cart;
        
        $this->session->set('cart', $this->cart);
                           
    }
    
    
    public function index()
    {
        $cart = $this->getCart();
       
        return view('store.cart', compact('cart'));
        
    }
    
    
    public function add($id, Product $product)
    {
        
        $cart = $this->getCart();
        
        $productAdd = $product->find($id);
        
        if( count($productAdd->images) > 0 ){
            $image = $productAdd->images->first()->id;
            $imageextension = $productAdd->images->first()->extension;
        } else {
            $image = 'no-img';
            $imageextension = 'jpg';
        }
        
        $cart->add($id, $productAdd->name, $productAdd->price, $image, $imageextension);
        
        $this->setCart($cart);
        
        return redirect()->route('cart');
        
        
    }
    
    public function remove($id)
    {
        
        $cart = $this->getCart();
                
        $cart->remove($id);
        
        $this->setCart($cart);
        
        return redirect()->route('cart');
        
        
    }
    
    
    public function destroy($id)
    {
        
        $cart = $this->getCart();
        
        $cart->destroy($id);
        
        $this->setCart($cart);
        
        return redirect()->route('cart');
        
        
    }
    
}
