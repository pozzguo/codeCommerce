@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Product: {{ $product->name }}</h2></div>  
                
                    @if ($errors->any())
                    
                    <ul class='alert'>
                        
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                    
                    @endif
                
                    {!! Form::open(['route'=>['products.update',$product->id],'method'=>'put']) !!}
                    
                    <div class="form-group">

                        {!! Form::label('category','Category: ') !!} 
                        {!! Form::select('category_id', $categories, $product->category->id, ['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('name','Name: ') !!} 
                        {!! Form::text('name',$product->name,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('description','Description: ') !!} 
                        {!! Form::textarea('description',$product->description,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('price','Price: ') !!} 
                        {!! Form::number('price',$product->price,['class' => 'form-control', 'step'=>'0.01']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('featured','Featured? ') !!} 
                        {!! Form::hidden('featured',false) !!}
                        {!! Form::checkbox('featured',true,$product->featured,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('recommend','Recommend? ') !!} 
                        {!! Form::hidden('recommend',false) !!}
                        {!! Form::checkbox('recommend',true,$product->recommend,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('tags','Tags: ') !!} 
                        {!! Form::textarea('tags',$product->product_tag,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::submit('Save Product',['class' => 'btn btn-primary']) !!} 
                        <a href="{{ route('products.index') }}" class ="btn btn-danger">Cancel</a>
                        
                        
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

