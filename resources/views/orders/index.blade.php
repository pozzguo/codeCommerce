@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Orders</h2>
                </div>

                <table class="table">
                <tbody>
                    <tr>
                        <th>#ID</th>
                        <th>User</th>
                        <th>Itens</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>IdPag</th>
                        <th>Actions</th>
                    </tr>
                </tbody>

                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}<br>{{ $order->user->email }}</td>
                    <td>
                        <ul>
                        @foreach($order->items as $item)
                        <li>{{ $item->product->name }}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status_id }} - {{ $order->status->description }}</td>
                    <td>{{ $order->pagSeguroId }}</td>
                    <td><a href="{{ route('orders.edit',['id' => $order->id]) }}">Edit</a> | <a href="{{ route('orders.destroy',['id' => $order->id]) }}">Delete</a></td>
                </tr>
                @endforeach

            </table>
                
                {!! $orders->render() !!}
                
            </div>
        </div>
    </div>
</div>
@endsection

