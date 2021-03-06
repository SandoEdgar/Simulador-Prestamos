<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Simulador</title>
		<link rel="stylesheet" href="Vista/css/style.css">
	</head>

	<body>
		<header>
			<h1>SIMULADOR DE PRÉSTAMOS</h1>
			<div class="date">Fecha :</div>
			<div class="clock">Hora :</div>
		</header>
		<main>
			<div class="title-box">
				<h2>Préstamo al Cliente</h2>
			</div>
			<div class="division-1 clearfix">
				<p>¿Qué Producto desea Consultar?
				<select name="" id="">
					<option value="">Préstamo</option>
					<option value="">Préstamo al Estudiante</option>
				</select>
				</p>
			</div>
			<div class="division-2">
				<p>¿Cuánto desea Solicitar?
				<input type="text">
				<select name="" id="">
					<option value="">Soles</option>
					<option value="">Dólares</option>
					<option value="">Pesos</option>
				</select>
				</p>
			</div>
			<div class="division-3">
				<p>¿Por cuánto Tiempo?
				<input type="number" min="1" max="12">
				Meses</p>
			</div>
			<div class="different">
				<p>¿A qué Tasa?
				<input type="number" min="5" max="30" step="2"> <span>%</span>
				<select name="" id="">
					<option value="">Simple</option>
					<option value="">Compuesto</option>
				</select>
				</p>
			</div>
		</main>
		<input type="button" class="clean" value="Limpiar">
		<input type="submit" class="next" value="Continuar">
		
	</body>
</html>