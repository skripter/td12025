<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
session_start();
require('./db.php');
?>
<html>
<head>
<title>Modelos</title>
<meta charset='UTF-8'>
<link href='./estilo-diagramacion.css' rel='stylesheet' type='text/css'>
</head>
<body>
<div class='contenedor'>
	<header>
	<a href='/'>Garage "La Catalina"</a>
	</header>
	
	<nav>
	<a href='#'>Inicio</a> |
	<a href='#'>Productos</a> | 
	<a href='#'>Noticias</a> | 
	<a href='#'>Clientes</a> | 
	<a href='#'>Escritores</a> | 
	<a href='#'>Ayuda</a>
	</nav>
	
	<section>
	<?php //include('menu-lateral.php'); ?>
	</section>
	
<article>

<table class='tablita'>
<caption>Listado de marcas</caption>
<tr>
	<th>ID</th>
	<th>Marca</th>
	<th>Modelo</th>
	<th>Año</th>
	<th></th>
</tr>
<?php
$sql = "SELECT * FROM modelos ";
$sql .= "INNER JOIN marcas ON marcas.marid = modelos.modmarca ";
$sql .= "ORDER BY marnombre";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<tr>\n";
	echo "<td>".$row['modid']."</td>\n";
	echo "<td>".$row['marnombre']."</td>\n";
	echo "<td>".$row['modnombre']."</td>\n";
	echo "<td>".$row['modanio']."</td>\n";
	echo "<td><a href='./modelo-ver.php?modid=".$row['modid']."'>Ver detalle</td>\n";
	echo "</tr>\n";
}//fin while
?>
</table>
<br>

<table class='tablita'>
<caption>Listado de marcas JOIN</caption>
<tr>
	<th>ID</th>
	<th>Marca</th>
	<th>Modelo</th>
	<th>Año</th>
	<th></th>
</tr>
<?php
$sql = "SELECT * FROM marcas ";
$sql .= "INNER JOIN modelos ON marcas.marid = modelos.modmarca ";
$sql .= "ORDER BY marnombre";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<tr>\n";
	echo "<td>".$row['modid']."</td>\n";
	echo "<td>".$row['marnombre']."</td>\n";
	echo "<td>".$row['modnombre']."</td>\n";
	echo "<td>".$row['modanio']."</td>\n";
	echo "<td><a href='./modelo-ver.php?modid=".$row['modid']."'>Ver detalle</td>\n";
	echo "</tr>\n";
}//fin while
?>
</table>
<br>
<table class='tablita'>
<caption>Listado de potencias > 200</caption>
<tr>
	<th>ID</th>
	<th>Marca</th>
	<th>Modelo</th>
	<th>Año</th>
	<th>Potencia</th>
	<th></th>
</tr>
<?php
$sql = "SELECT * FROM modelos ";
$sql .= "INNER JOIN marcas ON marcas.marid = modelos.modmarca ";
$sql .= "WHERE modpotencia > 200 ";
$sql .= "ORDER BY modpotencia DESC";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<tr>\n";
	echo "<td>".$row['modid']."</td>\n";
	echo "<td>".$row['marnombre']."</td>\n";
	echo "<td>".$row['modnombre']."</td>\n";
	echo "<td>".$row['modanio']."</td>\n";
	echo "<td>".$row['modpotencia']."</td>\n";
	echo "<td><a href='./modelo-ver.php?modid=".$row['modid']."'>Ver detalle</td>\n";
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