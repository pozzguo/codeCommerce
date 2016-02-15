@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Produtos</h2>
                    <a href="{{ route('products.create')}}" class ='btn btn-success'>Create Product</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Featured</th>
                            <th>Recommend</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->featured }}</td>
                            <td>{{ $product->recommend }}</td>
                            <td><a href="{{ route('products.edit',['id' => $product->id]) }}">Edit</a> | <a href="{{ route('products.destroy',['id' => $product->id]) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

