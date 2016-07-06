<?php

namespace codeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use codeCommerce\Http\Requests;
use codeCommerce\Http\Controllers\Controller;

use Illuminate\Session\Store as Session;

use codeCommerce\Order as Order;
use codeCommerce\OrderItem as OrderItem;
use codeCommerce\Product as Product;

use Auth;

class CheckoutController extends Controller
{
    
    private $cart;
    private $session;
    
    /*
     * @param Cart $cart
     */
    
    public function __construct(Session $session)
    {
            
        $this->session = $session;
        
    }
    
    public function place(Order $orderModel,OrderItem $orderItemModel){
        
        if(!$this->session->has('cart')){
            
           return false;
        } 
        
        $cart = $this->session->get('cart');
        
        if($cart->getTotal() > 0 ){
            
            $userId = Auth::user()->id;
            
            $order = $orderModel->create(['user_id'=>$userId, 'total'=>$cart->getTotal()]);
            
            foreach ($cart->all() as $k => $item){
                
                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);
                
            }
            
            dd($order->items);
            
        }
        
    }
}
