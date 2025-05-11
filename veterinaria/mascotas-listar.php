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
	<a href='./mascotas-agregar.php'><img src='./images/add.png'>Nueva mascota</a>
	<a href='#'><img src='./images/add.png'>Nuevo cliente</a>
	<a href='#'><img src='./images/add.png'>Nuevo vet.</a>
	<a href='#'>Stock Prod.</a>
	<a href='#'>Estadistica Prod.</a>
	<a href='#'>Estadistica atencion</a>
	<a href='./especies-listar.php'>Listado de especies</a>
	<a href='./razas-listar.php'>Listado de razas</a>
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
ini_set('display_errors', '1');
error_reporting(E_ALL);
$conn = mysqli_connect("127.0.0.1", "td12025", "Td1.2025*", "td12025") or exit("Error al conectar a la DB.");
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