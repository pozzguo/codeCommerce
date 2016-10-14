@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Create a Status</h2></div>  
                
                    @if ($errors->any())
                    
                    <ul class='alert'>
                        
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                    
                    @endif
                
                    {!! Form::open(['route'=>'status.store']) !!}
                    
                    
                    
                    <div class="form-group">

                        {!! Form::label('description','Description: ') !!} 
                        {!! Form::text('description',null,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::submit('Add Status',['class' => 'btn btn-primary']) !!} 
                        <a href="{{ route('status.index') }}" class ="btn btn-danger">Cancel</a>
                        
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

