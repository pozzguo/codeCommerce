<?php

namespace codeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use codeCommerce\Http\Requests;
use codeCommerce\Http\Controllers\Controller;
use codeCommerce\Order;
use codeCommerce\Status;

class OrdersController extends Controller
{
    private $orderModel;
    
    public function __construct(Order $order) {
    
        $this->orderModel = $order;
    
        
    }
    
    public function index(){
        
        $orders = $this->orderModel->paginate(10);
             
        return view("orders.index",  compact('orders'));
            
    }
    
    public function create(Status $statusModel){
        
        $status = $statusModel::pluck('id','code','description');
        
        return view("orders.create", compact('status'));
    }
    
    public function store(Requests\OrderRequest $request){
        
        $input = $request->all();
        
        $order = $this->orderModel->fill($input);
        
        $order->save();
        
        return redirect()->route('orders.index');
    }
    
    public function destroy($id){
        
        $order = $this->orderModel->find($id)->delete();
        
        return redirect()->route('orders.index');
    }
    
    public function edit($id, Status $statusModel){
        
        $status = $statusModel::pluck('description','id');
        
        $order = $this->orderModel->find($id);
        
        return view("orders.edit",  compact('order','status'));
    }
    
    public function update(Requests\OrderRequest $request, $id){
        
        $input = $request->all();
        
        $order = $this->orderModel->find($id)->update($input);
        
        return redirect()->route('orders.index');
    }
}
