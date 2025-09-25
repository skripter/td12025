<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
require('./db.php');
unset($msgerror);

?>
<html>
<head>
<title>Veterinaria</title>
<meta charset='UTF-8'>
<link href='./estilo-diagramacion.css' rel='stylesheet' type='text/css'>
<script src="/js/jquery-3.7.1.min.js"></script>
<script>
$(function(){
    $("#petspecie").on("change", function(){
        var espid = $("#petspecie option:selected").val();
        $("#visor").load("mascotas-especies-jquery-mostrar.php?espid="+espid);
        $("#petrace").load("mascotas-especies-jquery-combo.php?espid="+espid);

    });//Fin petspecie


});//Fin $
</script>    
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
	<caption>Datos de la mascota</caption>
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
	<option value="">Seleccione especie primero</option>
	</select>
	</td>
	</tr>
	</table>
<div id="visor">&nbsp;</div>	
</form>	
</article>
	
<footer>
	&copy; TDA1 2025
</footer>
</div><!-- fin contenedor -->
</body>
</html>