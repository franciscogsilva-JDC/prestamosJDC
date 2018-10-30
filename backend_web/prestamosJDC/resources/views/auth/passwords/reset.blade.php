@extends('front.layouts.front_layout')

@section('content')
<div class="container container-login">
        @include('admin.layouts.partials._messages')
        <div class="col s12 m6">
            <div class="card card-front">
                <div class="card-content">
                    <h4 class="title-panel-postulate center-text">Restablecer Contraseña</h4>
                    <div class="divider divider-panel"></div>
                    <div class="row"></div>
                    <div class="row"> 
                        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-field col s12 m12 l12">
                                    <i class="material-icons prefix">email</i>
                                    {!! Form::email('email', $email or old('email'), ['class' => '', 'required', 'id' => 'email']) !!}
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
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">lock_outline</i>
                                    {!! Form::password('password_confirmation', null, ['class' => '', 'id' => 'password-confirm']) !!}
                                    <label for="password-confirm">Confirmar contraseña</label>
                                </div>
                            </div>
                            <div class="row center-text">
                                <div class="col s12 m12 l12">
                                    <button type="submit" class="btn waves-effect btn-bts-edit btn-login">
                                        Restablecer Contraseña
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
