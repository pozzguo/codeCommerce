@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Category: {{ $category->name }}</h2></div>  
                
                    @if ($errors->any())
                    
                    <ul class='alert'>
                        
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                    
                    @endif
                
                    {!! Form::open(['route'=>['categories.update',$category->id],'method'=>'put']) !!}
                    
                    <div class="form-group">

                        {!! Form::label('name','Name: ') !!} 
                        {!! Form::text('name',$category->name,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::label('description','Description: ') !!} 
                        {!! Form::textarea('description',$category->description,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::submit('Save Category',['class' => 'btn btn-primary']) !!} 
                        <a href="{{ route('categories.index') }}" class ="btn btn-danger">Cancel</a>
                        
                        
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

