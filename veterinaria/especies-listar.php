<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
session_start();
require('./db.php');
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
	<?php include('menu-lateral.php'); ?>
	</section>
	
<article>
<?php
echo "<h4>".$_SESSION['msgerror']."</h4>";
echo "<h4>".$_SESSION['msgok']."</h4>";
unset($_SESSION['msgerror']);
unset($_SESSION['msgok']);
?>
<table class='tablita'>
<caption>Listado de especies</caption>
<tr>
	<th>ID</th>
	<th>Especie</th>
	<th></th>
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
	echo "<td><a href='./especies-editar.php?espid=".$row['espid']."'>Editar</td>\n";
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