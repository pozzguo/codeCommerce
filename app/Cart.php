<?php

namespace codeCommerce;


class Cart
{
    
    private $items;
    
    public function __construct()
    {
        
        $this->items = [];
        
    }
    
    
    public function add($id,$name,$price, $image, $imageextension)
    {
        
        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name,
                'image' => $image,
                'imageextension' => $imageextension
            ]
        ];
        
    }
    
    
    public function remove($id)
    {
        
       if(isset($this->items[$id]['qtd']) && $this->items[$id]['qtd'] > 0 ) {
           
           $this->items[$id]['qtd']--;
           
       }
        
    }
    
    
    public function destroy($id)
    {
        
        unset($this->items[$id]);
        
    }
    
    public function all()
    {
        
        return $this->items;
        
    }
    
    public function getTotal()
    {
        $total = 0;
        
        foreach($this->items as $items){
            
            $total += $items['qtd'] * $items ['price'];
            
        }
        
        return $total;
        
    }
    
    
}