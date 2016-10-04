@extends('store.store')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            @if ($cart == 'empty')
            <div class='col-md-4'>
                <h3>Pedido não realizado:</h3>
                <p>Carrinho Vazio :(</p>
                <p>Vamos <a href='{{ url('/') }}'>comprar! \o/</a></p>
            </div>
            @else    
            <h3>Pedido realizado com sucesso!</h3>
            <p>O Pedido #{{ $order->id }} foi realizado com sucesso!</p>
            @endif
        </div>
        <div class="row">&nbsp;<br></div>
    </div>
</div>
@stop