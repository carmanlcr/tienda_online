@extends('store.template')

@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page">
                <div class="panel panel-default">
                    <div class="panel-heading page-header"><h1><i class="fa fa-user"></i>Iniciar Sesión</h1></div>
                        <div class="panel-body">
                            {!!Form::open(['route'=>'login','method'=>'POST','action' => "{{ route('login') }}",'class'=>'form-horizontal'])!!}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {!!Form::label('email','Email: ',['class'=>'col-md-4 control-label'])!!}
                                <div class="col-md-6">
                                    {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa tu Email','required','autofocus','value' => "{{ old('email') }}"])!!}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {!!Form::label('password','Password ',['class'=>'col-md-4 control-label'])!!}
                                <div class="col-md-6">
                                    {!!Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Ingresa tu contraseña','required'])!!}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    {!!Form::submit('Iniciar Sesión',['class'=>'btn btn-primary'])!!}
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                </div>
                            </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
