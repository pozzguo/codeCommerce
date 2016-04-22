@extends('store.store')

@section('content')
   
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                
                <table class="table table-condensed">
                    
                    <thead>
                        
                        <tr class="cart_menu">
                            
                            <th class="image">Item</th>
                            <th class="description">Description</th>
                            <th class="price">Price</th>
                            <th class="price">Qtd</th>
                            <th class="price">Total</th>
                            <th class="image">Ação</th>
                            
                        </tr>
                        
                    </thead>
                    
                    <tbody>
                        
                        @forelse($cart->all() as $k=>$item)
                            <tr>

                                <td class="cart_product">
                                    <a href="{{ route('store.product',['id' => $k])}}">
                                        <img src="{{ url('uploads') . '/'.$item['image'] . '.' .$item['imageextension'] }}" alt="{{ $item['name'] }}" width="50"/>
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="{{ route('store.product',['id' => $k])}}">{{ $item['name'] }}</a></h4>
                                    <p>Código: {{ $k }}</p>
                                </td>
                                <td class="cart_price">R$ {{ $item['price'] }}</td>
                                <td class="cart_quantity">{{ $item['qtd'] }}</td>
                                <td class="cart_total_price">{{ $item['price'] * $item['qtd'] }}</td>
                                <td class="cart_delete">
                                    <a href="{{ route('cart.add',['id' => $k]) }}"><i class='fa fa-plus-square'></i></a>
                                    <a href="{{ route('cart.remove',['id' => $k]) }}"><i class='fa fa-minus-square'></i></a>
                                    <a href="{{ route('cart.destroy',['id' => $k]) }}" class="cart_quantity_delete">Destroy</a>
                                </td>

                            </tr>
                        
                        @empty
                            
                            <tr>

                                <td class="" colspan="6">
                                    
                                    <p>Nenhum produto encontrado ...</p>
                                    
                                </td>
                                
                            </tr>                          
                        
                        @endforelse
                        
                        <tr>
                                
                            <td colspan="6">

                                <div class="pull-right">

                                    <span>

                                        TOTAL: R$ {{ $cart->getTotal() }}

                                    </span>
                                    
                                    @if( $cart->getTotal() > 0 )
                                        <a href='#' class='btn btn-success'>Fechar a Conta</a>
                                    @endif    

                                </div>

                            </td>
                                
                        </tr>
                        
                    </tbody>
                    
                </table>
                
            </div>
        </div>
    </section>

@stop