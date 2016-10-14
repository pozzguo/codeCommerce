@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Order: {{ $order->name }}</h2></div>  
                
                    @if ($errors->any())
                    
                    <ul class='alert'>
                        
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                    
                    @endif
                
                    {!! Form::open(['route'=>['orders.update',$order->id],'method'=>'put']) !!}
                    
                    <div class="form-group">

                        {!! Form::label('status_id','Status: ') !!} 
                        {!! Form::select('status_id', $status, $order->status_id, ['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::submit('Save Order',['class' => 'btn btn-primary']) !!} 
                        <a href="{{ route('orders.index') }}" class ="btn btn-danger">Cancel</a>
                        
                        
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

