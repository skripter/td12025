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

<table class='tablita'>
<caption>Listado de mascotas</caption>
<tr>
	<th>ID</th>
	<th>Nombre</th>
	<th>Especie</th>
	<th>Raza</th>
	<th>Sexo</th>
	<th>Fecha Nac.</th>
	<th>Propietario</th>
	<th></th>
</tr>
<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
require('./db.php');
$sql = "SELECT * FROM mascotas ";
$sql .= "INNER JOIN especies ON mascotas.masespecie = especies.espid ";
$sql .= "INNER JOIN razas ON mascotas.masraza = razas.razid ";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<tr>\n";
	echo "<td>".$row['masid']."</td>\n";
	echo "<td>".$row['masnombre']."</td>\n";
	echo "<td>".$row['masespecie']." - ".$row['espnombre']."</td>\n";
	echo "<td>".$row['masraza']." - ".$row['raznombre']."</td>\n";
	echo "<td>".$row['massexo']."</td>\n";
	echo "<td>".$row['masfechanac']."</td>\n";
	echo "<td>".$row['maspropietario']."</td>\n";
	echo "<td><a href='./mascotas-editar.php?masid=".$row['masid']."'>Editar</td>\n";
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