@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Categorias</h2>
                    <a href="{{ route('categories.create')}}" class ='btn btn-success'>Create Category</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td><a href="{{ route('categories.edit',['id' => $category->id]) }}">Edit</a> | <a href="{{ route('categories.destroy',['id' => $category->id]) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
                
                {!! $categories->render() !!}
                
            </div>
        </div>
    </div>
</div>
@endsection

