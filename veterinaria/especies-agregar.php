<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
require('./db.php');
unset($msgerror);

if($_POST){
	extract($_POST,EXTR_OVERWRITE);
	//var_dump($_POST);
	
if(!isset($msgerror)){
	$espnombre = mysqli_real_escape_string($conn, $espnombre);
	//guardo en la DB
	$sql = "INSERT INTO mascotas (masnombre, masespecie, masraza, massexo, masfechanac, maspropietario) ";
	$sql .= "VALUES ('".$petname."', '".$petspecie."', '".$petrace."', '".$petsex."','".$petdob."', '".$petownername."')";
	echo $sql;exit();
	$result = mysqli_query($conn, $sql);
	$msgok = "Se guardó correctamente la especie: ". $espnombre;
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
	<?php include('menu-superior.php'); ?>
	</nav>
	
	<section>
	<?php include('menu-lateral.php'); ?>
	</section>
	
<article>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<?php
echo "<h4>$msgerror</h4>";
echo "<h4>$msgok</h4>";
?>
	<table>
	<caption>Datos de la especie a agregar</caption>
	
	<tr>
	<td>Nombre:</td>
	<td><input type='text' name='espnombre' id='espnombre' value='<?php echo $espnombre; ?>' autofocus required></td>
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