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

<table class='tablita'>
<caption>Listado de razas</caption>
<tr>
	<th>ID</th>
	<th>Raza</th>
	<th>Especie</th>
</tr>
<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
$conn = mysqli_connect("127.0.0.1", "td12025", "Td1.2025*", "td12025") or exit("Error al conectar a la DB.");
$sql = "SELECT * FROM razas ";
$sql .= "INNER JOIN especies ON razas.razespecie = especies.espid";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<tr>\n";
	echo "<td>".$row['razid']."</td>\n";
	echo "<td>".$row['raznombre']."</td>\n";
	echo "<td>".$row['razespecie']." - ".$row['espnombre']."</td>\n";
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