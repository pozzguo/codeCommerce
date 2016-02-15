@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Create a Product</h2></div>  
                
                    @if ($errors->any())
                    
                    <ul class='alert'>
                        
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                    
                    @endif
                
                    {!! Form::open(['route'=>'products.store']) !!}
                    
                    <div class="form-group">

                        {!! Form::label('name','Name: ') !!} 
                        {!! Form::text('name',null,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('description','Description: ') !!} 
                        {!! Form::textarea('description',null,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('price','Price: ') !!} 
                        {!! Form::number('price',null,['class' => 'form-control', 'step'=>'0.01']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('featured','Featured? ') !!} 
                        {!! Form::hidden('featured',false) !!}
                        {!! Form::checkbox('featured',true,true,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('recommend','Recommend? ') !!} 
                        {!! Form::hidden('recommend',false) !!}
                        {!! Form::checkbox('recommend',true,true,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::submit('Add Product',['class' => 'btn btn-primary']) !!} 
                        <a href="{{ route('products.index') }}" class ="btn btn-danger">Cancel</a>
                        
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

