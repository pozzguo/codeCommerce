@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>New Image for Product {{$product->name}}:</h2></div>  
                
                    @if ($errors->any())
                    
                    <ul class='alert'>
                        
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                    
                    @endif
                
                    {!! Form::open(['route'=> ['products.images.store',$product->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                    
                                       
                    <div class="form-group">

                        {!! Form::label('image','Image: ') !!} 
                        {!! Form::file('image',null,['class' => 'form-control']) !!}
                        
                    </div>
              
                    <div class="form-group">

                        {!! Form::submit('Upload Image',['class' => 'btn btn-primary']) !!} 
                        <a href="{{ route('products.images.index',['id'=>$product->id]) }}" class ="btn btn-danger">Cancel</a>
                        
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

