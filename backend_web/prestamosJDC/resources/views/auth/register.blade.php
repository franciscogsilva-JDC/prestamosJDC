@extends('front.layouts.front_layout')

@section('content')
<div class="container container-login">
        @include('admin.layouts.partials._messages')
        <div class="col s12 m6">
            <div class="card card-front">
                <div class="card-content">
                    <h4 class="title-panel-postulate center-text">Registro</h4>
                    <div class="divider divider-panel"></div>
                    <p class="message-register">Este registro es para usuarios externos a la Fundación Universitaria Juan de Castellanos y los usuarios que utilicen este método solo podrán acceder a la solicitud de espacios físicos como usuarios externos con los gastos que esto conlleva.</p>
                    <div class="row"></div>
                    <div class="row">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="input-field col s12 m12 l12">
                                    <i class="material-icons prefix">store</i>
                                    {!! Form::text('name', null, ['class' => '', 'required', 'id' => 'name']) !!}
                                    <label for="name">Nombre <span class="required-input">*</span></label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-field col s12 m12 l12">
                                    <i class="material-icons prefix">email</i>
                                    {!! Form::email('email', null, ['class' => '', 'required', 'id' => 'email']) !!}
                                    <label for="email">Correo Electronico <span class="required-input">*</span></label>
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
                                        <label for="password">Contraseña <span class="required-input">*</span></label>
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
                                    <label for="password-confirm">Confirmar contraseña <span class="required-input">*</span></label>
                                </div>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">layers</i>
                                <select name="dni_type_id" id="dni_type_id" class="icons">
                                    <option value="" disabled selected>Selecciona el Tipo de Documento</option>
                                    @foreach($dniTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <label for="dni_type_id">Tipo de Documento <span class="required-input">*</span></label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">credit_card</i>
                                {!! Form::number('dni', null, ['class' => '', 'id' => 'dni', 'min' => '0', 'required']) !!}
                                <label for="dni">Número de documento <span class="required-input">*</span></label>
                            </div>
                            <div class="input-field col s12 m6 l6 external-user">
                                <i class="material-icons prefix">phone</i>
                                {!! Form::number('cellphone_number', null, ['class' => '', 'required', 'id' => 'cellphone_number', 'min' => '100']) !!}
                                <label for="cellphone_number">Número Telefonico <span class="required-input">*</span></label>
                            </div> 
                            <div class="input-field col s12 m6 l6 external-user">
                                <i class="material-icons prefix">account_balance</i>
                                {!! Form::text('company_name', null, ['class' => '', 'id' => 'company_name']) !!}
                                <label for="company_name">Nombre de Empresa</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">wc</i>
                                <select name="gender_id" id="gender_id" class="icons">
                                    <option value="" disabled selected>Selecciona el Genero</option>
                                    @foreach($genders as $gender) 
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                                <label for="gender_id">Genero del Usuario <span class="required-input">*</span></label>
                            </div>
                            <div class="row"></div>
                            <div class="row center-text">
                                <div class="col s12 m12 l12">
                                    <button type="submit" class="btn waves-effect btn-bts-edit btn-login btn-fgs-show">
                                        Registrarse
                                    </button>
                                </div>
                                <div class="col s12 m12 l12">
                                    <a class="btn waves-effect btn-bts-edit btn-login" href="{{ route('login') }}">
                                        Ingresar
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
