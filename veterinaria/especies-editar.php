<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
require('./db.php');
$msgok = "";
$msgerror = "";
$espid = 0;

if(!$_GET and !$_POST){
	header("Location: ./mascotas-listar.php");
	exit("No hay datos");
}

if($_POST){
	extract($_POST,EXTR_OVERWRITE);
	unset($msgerror);
	//var_dump($_POST);
	if(!is_numeric($espid) or $espid < 1){ $msgerror = "ID incorrecto"; }
	
if(!isset($msgerror)){
	$espid = mysqli_real_escape_string($conn, $espid);
	$espnombre = mysqli_real_escape_string($conn, $espnombre);
	//guardo en la DB
	$sql = "UPDATE especies SET espnombre='".$espnombre."'";
	$sql .= " WHERE espid='".$espid."'";
	//echo $sql;//exit();
	$result = mysqli_query($conn, $sql);
	$petname = stripslashes($petname);
	$msgok = "Se guardó correctamente la especie: ". $espnombre;
}//if msgerror

}//fin POST

if($_GET){
	$espid = $_GET['espid'];
	if(!is_numeric($espid) or $espid < 1){
		header("Location: ./especies-listar.php");
		exit("No hay datos");
	}//fin if $masid
	$espid = mysqli_real_escape_string($conn,$espid);
	$sql = "SELECT * FROM especies WHERE espid='".$espid."' LIMIT 1";
	//echo $sql;
	$resultado = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		$espnombre = $row['espnombre'];
	}//fin while
}//fin GET
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
<input type="hidden" name="espid" value='<?php echo $espid; ?>'>
<?php
echo "<h4>$msgerror</h4>";
echo "<h4>$msgok</h4>";
?>
	<table>
	<caption>Datos de la especie</caption>
	
	<tr>
	<td>Nombre:</td>
	<td><input type='text' name='espnombre' id='espnombre' value='<?php echo htmlentities($espnombre); ?>' autofocus required></td>
	</tr>
	
	<tr>
	<td><button type='reset'>Limpiar</button></td>
	<td><button type='submit'>Editar especie</button></td>
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