@extends('store.store')

@section('content')

<section id="cart_items">
    <div class="container">
        <div class ="alert alert-danger">
            <h1>Ooopps!! Não achei nenhuma compra com os dados passados...</h1>
            <p>Você pode ver os detalhes de seus pedidos em <a href="{{ route('account.orders') }}">meus pedidos</a>.</p>
        </div>

    </div>
</section>

@stop

