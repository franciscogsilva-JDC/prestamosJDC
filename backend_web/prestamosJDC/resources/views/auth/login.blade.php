@extends('front.layouts.front_layout')

@section('content')
<div class="container container-login">
        @include('admin.layouts.partials._messages')
        <div class="col s12 m6">
            <div class="card card-front">
                <div class="card-content">
                    <h4 class="title-panel-postulate center-text">Ingresar</h4>
                    <div class="divider divider-panel"></div>
                    <div class="row"></div>
                    <div class="row"> 
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
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
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="input-field col s12 m12 l12">
                                        <i class="material-icons prefix">lock_outline</i>
                                        {!! Form::password('password', null, ['class' => '', 'required', 'id' => 'password']) !!}
                                        <label for="password">Contraseña</label>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row center-text">
                                <div class="col s12 m12 l12">
                                    <button type="submit" class="btn waves-effect btn-bts-edit btn-login btn-fgs-show">
                                        Ingresar
                                    </button>
                                </div>
                                <div class="col s12 m12 l12">
                                    <a class="btn waves-effect btn-bts-edit btn-login" href="{{ route('register') }}">
                                        Registrarse
                                    </a>
                                </div>
                                <!--
                                <div class="col s12 m12 l12 forget-bts">
                                    <a class="" href="{{ route('password.request') }}">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                </div>
                            -->
                            </div>
                            <div class="row center-text">
                                <div class="checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember"/>
                                    <label for="remember">Recordarme </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
