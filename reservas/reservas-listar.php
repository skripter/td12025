<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
session_start();
require('./db.php');
?>
<html>
<head>
<title>Reservas</title>
<meta charset='UTF-8'>
<link href='./estilo-diagramacion.css' rel='stylesheet' type='text/css'>
</head>
<body>
<div class='contenedor'>
	<header>
	<a href='/'>Agencia Viajes "La Catalina"</a>
	</header>
	
	<nav>
	<a href='#'>Inicio</a> |
	<a href='#'>Hoteles</a> | 
	<a href='#'>Noticias</a> | 
	<a href='#'>Personas</a> | 
	<a href='#'>Ayuda</a>
	</nav>
	
	<section>
	<?php //include('menu-lateral.php'); ?>
	</section>
	
<article>

<table class='tablita'>
<caption>Listado de Reservas Nuevas</caption>
<tr>
	<th>ID</th>
	<th>Hotel</th>
	<th>Persona</th>
	<th>Fecha Inicio</th>
	<th>Fecha Fin</th>
	<th>Estado</th>
	<th></th>
</tr>
<?php
$sql = "SELECT * FROM reservas ";
$sql .= "INNER JOIN hoteles ON hoteles.hotid = reservas.reshotid ";
$sql .= "INNER JOIN personas ON personas.perid = reservas.resperid ";
//$sql .= "WHERE resestado='N' ";
$sql .= "ORDER BY resfechaini";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<tr>\n";
	echo "<td>".$row['resid']."</td>\n";
	echo "<td>".$row['hotnombre']."</td>\n";
	echo "<td>".$row['pernombre']." ".$row['perapellido']."</td>\n";
	echo "<td>".$row['resfechaini']."</td>\n";
	echo "<td>".$row['resfechafin']."</td>\n";
	echo "<td>".$row['resestado']."</td>\n";
	echo "<td><a href='./reserva-ver.php?resid=".$row['resid']."'>Ver reserva</td>\n";
	echo "</tr>\n";
}//fin while
?>
</table>
<br>

</article>
	
<footer>
	&copy; TDA1 2025
</footer>
</div><!-- fin contenedor -->
</body>
</html>