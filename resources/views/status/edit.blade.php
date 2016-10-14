@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Status: {{ $status->name }}</h2></div>  
                
                    @if ($errors->any())
                    
                    <ul class='alert'>
                        
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                    
                    @endif
                
                    {!! Form::open(['route'=>['status.update',$status->id],'method'=>'put']) !!}
                    
                    
                    
                    <div class="form-group">

                        {!! Form::label('description','Description: ') !!} 
                        {!! Form::text('description',$status->description,['class' => 'form-control']) !!}
                        
                    </div>
                    
                    <div class="form-group">

                        {!! Form::submit('Save Status',['class' => 'btn btn-primary']) !!} 
                        <a href="{{ route('status.index') }}" class ="btn btn-danger">Cancel</a>
                        
                        
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

