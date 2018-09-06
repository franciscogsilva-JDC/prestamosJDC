<p>
	<b>Querido {{ $user->name }}, coordial saludo.</b>
</p>
<p>Por favor verifica tu cuenta en el siguiente enlace</p>
<p><a href="{{ url('register/verify/'.$user->confirmation_code) }}">Link de Verificación de cuenta</a></p>
<br>
<br>
{{ env('APP_NAME') }}
<br>
<a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a>