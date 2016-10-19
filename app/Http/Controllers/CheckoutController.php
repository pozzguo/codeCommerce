<?php

namespace codeCommerce\Http\Controllers;

use codeCommerce\Http\Controllers\Controller;
use Illuminate\Session\Store as Session;
use codeCommerce\Order as Order;
use codeCommerce\OrderItem as OrderItem;
use codeCommerce\Events\CheckoutEvent;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller {

    private $cart;
    private $session;

    /*
     * @param Cart $cart
     */

    public function __construct(Session $session) {

        $this->session = $session;
    }

    public function place(Order $orderModel) {

        if (!$this->session->has('cart')) {

            return false;
        }

        $cart = $this->session->get('cart');

        if ($cart->getTotal() > 0) {

            $userId = Auth::user()->id;

            $order = $orderModel->create(['user_id' => $userId, 'total' => $cart->getTotal(), 'status_id' => 1]);

            foreach ($cart->all() as $k => $item) {

                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);
            }
            
            $this->session->set('orderId', $order->id);

            $cart->clear();


            /**
             * Dispara evento:
             */
            //event(new CheckoutEvent(Auth::user(),$order));


            return view('store.checkout', compact('order'))->with(['cart' => '']);
        }

        return view('store.checkout', ['cart' => 'empty']);
    }

    public function payOrder($orderId, Order $orderModel, CheckoutService $checkoutService) {

        $order = $orderModel->find($orderId);
        $this->session->set('orderId', $orderId);

        if ($order) {

            if ($order->user_id == Auth::user()->id) {

                $checkout = $checkoutService->createCheckoutBuilder();

                foreach ($order->items as $item) {

                    $checkout->addItem(new Item($item->product_id, $item->product->name, $item->price));
                }

                $response = $checkoutService->checkout($checkout->getCheckout());

                return  redirect($response->getRedirectionUrl());
            }
        }

        return view("errors.noorders");
    }
    
    public function payReturn(Request $request, Order $orderModel){
        
        //Pega o código de retorno do pagseguro:
        $pagSeguroId = $request->input('pagSeguroId', 'empty');
        
        //Pega o número da order que está na sessão:
        $orderId = $this->session->get('orderId');
        
        //Associa o ID do pagseguro à order:
        if($orderId){
           $order = $orderModel->find($orderId); 
           $order->pagSeguroId = $pagSeguroId;
           $order->save();
        }   
        
        Log::info('::.Pay.Return.::',['request' => $request->all()]);
        
        return view('store.returnpay', ['pagSeguroId' => $pagSeguroId]);
        
    }
    
    public function payTransactionChange(Request $request){
        
        Log::info('::.Pay.StatusChange.::',['request' => $request->all()]);
        
        return response('Ok', 200)
                  ->header('Content-Type', 'text/plain');
    }

}
