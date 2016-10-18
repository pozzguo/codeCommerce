@extends('store.store')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">

            <h3>Meus pedidos:</h3>

            <table class="table">
                <tbody>
                    <tr>
                        <th>#ID</th>
                        <th>Itens</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </tbody>

                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <ul>
                        @foreach($order->items as $item)
                        <li>{{ $item->product->name }}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status->description }}</td>
                    <td>
                        @if(1 == $order->status->id)
                        <a href="{{ route('checkout.payOrder',['orderId' => $order->id]) }}">Pagar</a>
                        @else
                          - 
                        @endif
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
        <div class="row">&nbsp;<br></div>
    </div>
</div>
@stop