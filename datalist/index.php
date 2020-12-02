<!DOCTYPE html>
<html>
<head>
	<title>Sugerencias AJAX</title>
	<meta charset="utf-8" />

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- JQuery -->
	<script src="../jquery-3.5.1.js"></script>
	<script>

		$(document).ready(function()
		{
			
			// detectamos un cambio en el campo INPUT y realizamos
			// una petición AJAX enviándole el patrón introducido
			// por el usuario
			$("input").keyup(function(ev)
			{
				// el método AJAX necesita los parámetros:
				// 
				// - url     : script que procesará la información
				// - method  : (GET|POST)
				// - dataType: tipo de dato que se espera como respuesta
				// - data    : objeto JSON con los parámetros a enviar

				$.ajax({
					url     : "script.php",
					method  : "get",
					dataType: "html",
					data    : { pattern: $(this).val() }

				}) 
				  .done(function(data)
				{
					// añadimos las opciones al DATALIST
					$("#sugerencias").html(data) ;
				}) ;
			}) ;
		}) ;
		

	</script>

</head>
<body>

	<div class="container mt-4">
		<form>
			<label for="pat">Introduce un texto:</label>
			<input class="form-control" type="text" 
				   placeholder="Introduce un texto para obtener sugerencias" 
				   name="pat" id="pat" list="sugerencias" 
				   autocomplete="off" autofocus />

			<datalist id="sugerencias"></datalist>
		</form>
	</div>

</body>
</html>