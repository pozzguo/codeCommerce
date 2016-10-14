<?php

namespace codeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use codeCommerce\Http\Requests;
use codeCommerce\Http\Controllers\Controller;
use codeCommerce\Status;

class StatusController extends Controller
{
    private $statusModel;
    
    public function __construct(Status $status) {
    
        $this->statusModel = $status;
    
        
    }
    
    public function index(){
        
        $status = $this->statusModel->paginate(10);
             
        return view("status.index",  compact('status'));
            
    }
    
    public function create(){
        return view("status.create");
    }
    
    public function store(Requests\StatusRequest $request){
        
        $input = $request->all();
        
        $status = $this->statusModel->fill($input);
        
        $status->save();
        
        return redirect()->route('status.index');
    }
    
    public function destroy($id){
        
        $status = $this->statusModel->find($id)->delete();
        
        return redirect()->route('status.index');
    }
    
    public function edit($id){
        
        $status = $this->statusModel->find($id);
        
        return view("status.edit",  compact('status'));
    }
    
    public function update(Requests\StatusRequest $request, $id){
        
        $input = $request->all();
        
        $status = $this->statusModel->find($id)->update($input);
        
        return redirect()->route('status.index');
    }
}
