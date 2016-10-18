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
            <p>Falta pouco agora! Efetue o pagamento do seu pedido clicando <a href="{{ route('checkout.payOrder',['idOrder' => $order->id]) }}">aqui</a> (pagSeguro).</p>
            <p>Você também pode efetuar o pagamento e ver os detalhes de seus pedidos em <a href="{{ route('account.orders') }}">meus pedidos</a>.</p>
            @endif
        </div>
        <div class="row">&nbsp;<br></div>
    </div>
</div>
@stop