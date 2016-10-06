<h3>Pedido Realizado!</h3>

<p>Caro {{ $user->name }},</p>
<p>Seguem os dados do seu pedido:</p>

<table class="table">
    <tbody>
        <tr>
            <th>#ID</th>
            <th>Itens</th>
            <th>Valor</th>
            <th>Status</th>
        </tr>
    </tbody>

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
        <td>{{ $order->status }}</td>
    </tr>

</table>

<p>Aguarde... seu pedido será despachado em breve.</p>
<p>Agradecemos por ter comprado em nossa loja!</p>
