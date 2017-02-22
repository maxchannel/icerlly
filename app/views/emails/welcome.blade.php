<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Hola {{ $full_name }} Bienvenido :)</h1>

		<div>
			<p>Para poder agregar pagos a tu cuenta es necesario confirmar tu email.</p>
			<p>Tu clave para confirmar email es: {{ $key }}</p>
			<p>Copia y pegala en: <a href="http://icerlly.com/settings/confirmemail">Confirmar Email (Click)</a></p>
			<p>Este mensaje no puede ser contestado, contacto directo:</p>
			<p>Icerlly monetiza tus tweets!</p>
			<p><a href="https://twitter.com/icerlly">@icerlly</a></p>
			<p><a href="http://icerlly.com">Icerlly.com</a></p>
		</div>
	</body>
</html>