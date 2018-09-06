<p>
	<b>Dear {{ $user->name }}</b>
</p>
<p>La contraseña ha sido cambiada.</p>
<br>
<br>
{{ env('APP_NAME') }}
<br>
<a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a>