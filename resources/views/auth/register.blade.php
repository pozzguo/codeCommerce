@extends('store.store')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address_cep') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">CEP:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_cep" value="{{ old('address_cep') }}">

                                @if ($errors->has('address_cep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_cep') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address_location') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Rua:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_location" value="{{ old('address_location') }}">

                                @if ($errors->has('address_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address_number') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Número:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_number" value="{{ old('address_number') }}">

                                @if ($errors->has('address_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address_neighborhood') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Bairro:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_neighborhood" value="{{ old('address_neighborhood') }}">

                                @if ($errors->has('address_neighborhood'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_neighborhood') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address_city') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cidade:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_city" value="{{ old('address_city') }}">

                                @if ($errors->has('address_city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address_state') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">UF:</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_state" value="{{ old('address_state') }}">

                                @if ($errors->has('address_state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
