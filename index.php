<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<!-- Bootstrap CDN! -->
	<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>
	<script>
		function curtime() {
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('hora').innerHTML =
			h + ":" + m + ":" + s;
			var t = setTimeout(curtime, 500);
		}
		function checkTime(i) {
			if (i < 10) {i = "0" + i};
			return i;
		}
	</script>
</head>
<body onload="curtime()">
	<div class="container">
		<!--Jombutron-->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">CRUD App</h1>
				<p class="lead">Jesús Díaz Muñoz</p>
			</div>
		</div>
		<!--Fin Jombutron-->

		<!--ROW-->
		<div class="row">
			<!--Registrar un nuevo empleado-->
			<div class="col-md-6">
				<h3>Registro de un nuevo empleado.</h3>
				<form class="was-validated" action="main.php" method="POST">
					<!--Nombre-->
					<div class="mb-3">
						<label for="nombre">Nombre:</label>
						<input class="form-control is-invalid" name="nombre" placeholder="Introduzca un nombre" required>
					</div>

					<!--Sede-->
					<div class="form-group">
						<label for="sede">Sede:</label>
						<select class="custom-select" required name="sede">
							<option value="">Asigne una sede</option>
							<option value="EEUU">Palo Alto (EEUU)</option>
							<option value="UK">Londres (UK)</option>
							<option value="ES">Madrid (ES)</option>
							<option value="AU">Sydney (AU)</option>
							<option value="AU">Varsovia (PL)</option>
						</select>
					</div>

					<!--Departamento-->
					<div class="form-group">
						<label for="dpto">Departamento:</label>
						<select class="custom-select" required name="dpto">
							<option value="">Seleccione una departamento</option>
							<option value="Administracion">Administración</option>
							<option value="Programacion">Programación</option>
							<option value="Taller">Taller</option>
						</select>
					</div>

					<!--Registrar-->
					<input class="btn btn-success" type="submit" value="Registrar">
					<input class="btn btn-danger" type="reset" value="Limpiar campos">
				</form>
			</div>
			<!--Sus datos-->
			<div class="col-md-6">
				<span>Bienvenido, <i>administrador<i>.</span><br>
				<span><b><span id="hora"></span></b></span>
			</div>

			</div>
			<!--Fin ROW-->

			<br><hr style="background-color:black;"><br>
			<!--ROW2-->
			<!--Listado de empleados-->
			<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">Lista de empleados</h3>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col" colspan="2">#ID</th>
							<th scope="col" colspan="2">Nombre</th>
							<th scope="col" colspan="2">Sede asignada</th>
							<th scope="col" colspan="2">Departamento</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include("main.php");
							GetFromDB();
						?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</body>
	</html>
