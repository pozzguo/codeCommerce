@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Status</h2>
                    <a href="{{ route('status.create')}}" class ='btn btn-success'>Create Status</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Description</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @foreach($status as $stat)
                        <tr>
                            <td>{{ $stat->id }}</td>
                            <td>{{ $stat->code }}</td>
                            <td>{{ $stat->description }}</td>
                            <td><a href="{{ route('status.edit',['id' => $stat->id]) }}">Edit</a> | <a href="{{ route('status.destroy',['id' => $stat->id]) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
                
                {!! $status->render() !!}
                
            </div>
        </div>
    </div>
</div>
@endsection

