<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);

unset($msgerror);
$conn = mysqli_connect("127.0.0.1", "td12025", "Td1.2025*", "td12025") or exit("Error al conectar a la DB.");
if($_POST){
	extract($_POST,EXTR_OVERWRITE);
	//var_dump($_POST);
	if(!is_numeric($petrace)){
		$msgerror = "No se pudo guardar, raza incorrecta";
	}
	/*if(!is_numeric($petowner)){
		$msgerror = "No se pudo guardar, dueño incorrecto";
	}*/
	
if(!isset($msgerror)){
	$petname = mysqli_real_escape_string($conn, $petname);
	//guardo en la DB
	$sql = "INSERT INTO mascotas (masnombre, masespecie, masraza, massexo, masfechanac, maspropietario) ";
	$sql .= "VALUES ('".$petname."', '".$petspecie."', '".$petrace."', '".$petsex."','".$petdob."', '".$petownername."')";
	$result = mysqli_query($conn, $sql);
	$msgok = "Se guardó correctamente la mascota: ". $petname;
}//if msgerror

}//fin _POST
?>
<html>
<head>
<title>Veterinaria</title>
<meta charset='UTF-8'>
<link href='./estilo-diagramacion.css' rel='stylesheet' type='text/css'>
</head>
<body>
<div class='contenedor'>
	<header>
	<a href='/'>Veterinaria "La Catalina"</a>
	</header>
	
	<nav>
	<a href='#'>Inicio</a> |
	<a href='#'>Productos</a> | 
	<a href='#'>Noticias</a> | 
	<a href='#'>Clientes</a> | 
	<a href='#'>Mascotas</a> | 
	<a href='#'>Ayuda</a>
	</nav>
	
	<section>
	<a href='#'><img src='./images/add.png'>Nueva mascota</a>
	<a href='#'><img src='./images/add.png'>Nuevo cliente</a>
	<a href='#'><img src='./images/add.png'>Nuevo vet.</a>
	<a href='#'>Stock Prod.</a>
	<a href='#'>Estadistica Prod.</a>
	<a href='#'>Estadistica atencion</a>
	<a href='./especies-listar.php'>Listado de especies</a>
	</section>
	
<article>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<?php
echo "<h4>$msgerror</h4>";
echo "<h4>$msgok</h4>";
?>
	<table>
	<caption>Datos de la mascota</caption>
	
	<tr>
	<td>Nombre:</td>
	<td><input type='text' name='petname' id='petname' value='<?php echo $petname; ?>' autofocus required></td>
	</tr>
	
	<tr>
	<td>Especie:</td>
	<td>
	<select name='petspecie' id='petspecie'>
	<option value="">Seleccione especie</option>
	<?php
	$sql = "SELECT * FROM especies";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<option value='".$row['espid']."'>";
	echo $row['espid']." - ".$row['espnombre']."</option>\n";
}//fin while
	?>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Raza:</td>
	<td>
	<select name='petrace' id='petrace'>
	<option value="">Seleccione raza</option>
	<?php
	$sql = "SELECT * FROM razas ORDER BY razespecie";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<option value='".$row['razid']."'>";
	echo $row['razid']." - ".$row['raznombre']."</option>\n";
}//fin while
	?>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Sexo:</td>
	<td>
	<select name='petsex' id='petsex'>
	<option value="">Seleccione sexo</option>
	<option value="H">Hembra</option>
	<option value="M">Macho</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Fecha Nac.:</td>
	<td><input type='date' name='petdob' id='petdob' max='<?php echo date('Y-m-d'); ?>' required></td>
	</tr>
	
	<tr>
	<td>Dueño:</td>
	<td>
	<input type='text' name='petowner' id='petowner' readonly required>
	<input type='text' name='petownername' id='petownername' required>
	</td>
	</tr>
	
	<tr>
	<td><button type='reset'>Limpiar</button></td>
	<td><button type='submit'>Guardar</button></td>
	</tr>
	
	</table>
</form>	
</article>
	
<footer>
	&copy; TDA1 2025
</footer>
</div><!-- fin contenedor -->
</body>
</html>