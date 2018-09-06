<p>
	<b>Querido {{ $user->name }}, coordial saludo.</b>
</p>
<p>Se ha creado una cuenta en el sistema {{ env('APP_NAME') }} y la siguiente es tu contraseña de acceso</p>
<p><b>{{ $generatedPassword }}</b></p><br>
<p>Te recomendamos realizar el cambio por una contraseña que recuerdes en el siguiente link:</p>
<p><a href="{{ url('password/reset') }}">Cambiar contraseña aquí</a></p>
<br>
<br>
{{ env('APP_NAME') }}
<br>
<a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a>