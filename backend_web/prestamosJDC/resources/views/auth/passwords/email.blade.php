@extends('front.layouts.front_layout')@section('content')
<div class="container container-login">
        @include('admin.layouts.partials._messages')
        <div class="col s12 m6">
            <div class="card card-front">
                <div class="card-content">
                    <h4 class="title-panel-postulate center-text">Restablecer Contraseña</h4>
                    <div class="divider divider-panel"></div>
                    <div class="row"></div>
                    <div class="row"> 
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-field col s12 m12 l12">
                                    <i class="material-icons prefix">email</i>
                                    {!! Form::email('email', null, ['class' => '', 'required', 'id' => 'email']) !!}
                                    <label for="email">Correo Electronico</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row center-text">
                                <div class="col s12 m12 l12">
                                    <button type="submit" class="btn waves-effect btn-bts-edit btn-login">
                                        Enviar correo para restablecer Contraseña
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()