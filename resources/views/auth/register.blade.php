@extends('store.template')

@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading page-header"> <h1><i class="fa fa-pencil-square-o "></i> Registrar</h1></div>
                <div class="panel-body">

                    {!!Form::open(['route'=>'register','method'=>'POST','class'=>'form-horizontal','role' => 'form','action' =>"{{ url('/register') }}"])!!}

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!!Form::label('name','Nombre: ',['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa tu nombre','required','value' => "{{ old('name') }}",'id'=>'name','autofocus'])!!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div><!--Aqui esta el nombre-->

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            {!!Form::label('last_name','Apellido: ',['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Ingresa tu apellido','required','value' => "{{ old('last_name') }}"])!!}
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!--Aqui esta el apellido-->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!!Form::label('email','Email: ',['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa tu Email','required','value'=>"{{ old('email') }}",'id'=>'email'])!!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!--Aqui esta el email-->

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            {!!Form::label('username','Usuario: ',['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('username',null,['class'=>'form-control','placeholder'=>'Ingresa tu usuario','required','value' => "{{ old('username') }}"])!!}
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!--Aqui esta el username-->

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!!Form::label('password','Password: ',['class'=>'col-md-4 control-label'])!!}

                            <div class="col-md-6">
                                {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa tu contraseña','required','id' => 'password'])!!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!--Aqui esta la contraseña-->

                        <div class="form-group">
                            {!!Form::label('password','Confirmar Password: ',['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Repite tu contraseña','required','id' => 'password-confirm'])!!}
                            </div>
                        </div><!--Aqui esta la contraseña repetida-->
                        
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            {!!Form::label('direccion','Direccion: ',['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::textarea('direccion',null,['class'=>'form-control','placeholder'=>'Ingresa tu direccion','required','value' => "{{ old('direccion') }}"])!!}
                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!--Aqui esta la dirección-->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!!Form::button('<i class="fa fa-user-plus"></i> Registrar',['class'=>'btn btn-primary','type' =>'submit'])!!}
                            </div>
                        </div> <!--Aquí esta el boton de registrar-->

                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
