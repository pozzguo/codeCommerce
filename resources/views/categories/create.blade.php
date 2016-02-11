@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Create a Category</h2></div>  
                
                    @if ($errors->any())
                    
                    <ul class='alert'>
                        
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                    
                    @endif
                
                    {!! Form::open(['url'=>'categories']) !!}
                    
                    <div class="form-group">

                        {!! Form::label('name','Name: ') !!} 
                        {!! Form::text('name',null,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('description','Description: ') !!} 
                        {!! Form::textarea('description',null,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::submit('Add Category',['class' => 'btn btn-primary']) !!} 
                        
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

