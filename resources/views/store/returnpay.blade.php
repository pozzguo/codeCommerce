@extends('store.store')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            @if ($pagSeguroId == 'empty')
            <div class='col-md-4'>
                <h3>Pagamento não realizado:</h3>
                <p>Id do PagSeguro voltou Vazio :(</p>
            </div>
            @else    
            <h3>Pagamento realizado com sucesso!</h3>
            <p>O id do PagSeguro é #{{ $pagSeguroId }}.</p>
            <p>Falta pouco agora! </p>
            <p>Acompanhe esse e outros pedidos em <a href="{{ route('account.orders') }}">meus pedidos</a>.</p>
            @endif
        </div>
        <div class="row">&nbsp;<br></div>
    </div>
</div>
@stop