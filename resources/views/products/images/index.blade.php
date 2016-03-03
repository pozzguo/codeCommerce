@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Imagens do Produto {{$product->name}}:</h2>
                    <a href="{{ route('products.images.create',['id'=>$product->id])}}" class ='btn btn-success'>New Image...</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>View</th>
                            <th>Extension</th>
                            <th>Action</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach($product->images as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td><img src="{{ url('uploads/'.$image->id.'.'.$image->extension)}}" width="80"></td>
                            <td>{{ $image->extension }}</td>
                            <td><a href="{{ route('products.images.destroy',['id'=>$product->id,'idImage' => $image->id]) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>

                <a href="{{ route('products.index')}}" class ="btn btn-danger">Voltar</a>
                
            </div>
        </div>
    </div>
</div>
@endsection

