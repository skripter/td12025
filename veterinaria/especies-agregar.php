<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
session_start();
require('./db.php');
unset($msgok);
unset($msgerror);

if($_POST){
	extract($_POST,EXTR_OVERWRITE);
	//var_dump($_POST);
	$espnombre = ucfirst($espnombre);
	if(strlen($espnombre) < 2){
		$msgerror = "Debe ingresar un nombre de especie.";
	}
	$sqlbusqueda = "SELECT * FROM especies WHERE espnombre='".$espnombre."'";
	//echo $sqlbusqueda;//exit();
	$resultbusqueda = mysqli_query($conn, $sqlbusqueda);
	if(mysqli_num_rows($resultbusqueda) > 0){
		$msgerror = "Nombre de especie ya ingresado.";
	}
	
if(!isset($msgerror)){
	$espnombre = mysqli_real_escape_string($conn, $espnombre);
	//guardo en la DB
	$sql = "INSERT INTO especies (espnombre) VALUES ('".$espnombre."')";
	//echo $sql;//exit();
	$result = mysqli_query($conn, $sql);
	$_SESSION['msgok'] = "Se guardó correctamente la especie: ". $espnombre;
	header("Location: ./mascotas-listar.php");
	exit();
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
<table class='tablita'>
<caption>Listado de especies ya ingresadas</caption>
<tr>
	<th>ID</th>
	<th>Especie</th>
</tr>
<?php
$sql = "SELECT * FROM especies";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<tr>\n";
	echo "<td>".$row['espid']."</td>\n";
	echo "<td>".$row['espnombre']."</td>\n";
	echo "</tr>\n";
}//fin while
?>
</table>
</article>
	
<footer>
	&copy; TDA1 2025
</footer>
</div><!-- fin contenedor -->
</body>
</html>