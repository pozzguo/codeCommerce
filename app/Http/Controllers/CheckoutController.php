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

}
