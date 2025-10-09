<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
session_start();
require('./db.php');
?>
<html>
<head>
<title>Libros</title>
<meta charset='UTF-8'>
<link href='./estilo-diagramacion.css' rel='stylesheet' type='text/css'>
<script src="/js/jquery-3.7.1.min.js"></script>
<script>
$(function(){
    $("#marid").on("change", function(){
        var marid = $("#marid option:selected").val();
        $("#visor").load("modelos-marcas-jquery-mostrar.php?marid="+marid);
        $("#modid").load("modelos-marcas-jquery-combo.php?marid="+marid);
    });//Fin petspecie
});//Fin $
</script>    
</head>
<body>
<div class='contenedor'>
	<header>
	<a href='/'>Biblioteca "La Catalina"</a>
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
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<?php
echo "<h4>$msgerror</h4>";
echo "<h4>$msgok</h4>";
?>
	<table>
	<caption>Datos de la marca</caption>
	<tr>
	<td>Marca:</td>
	<td>
	<select name='marid' id='marid'>
	<option value="">Seleccione marca</option>
	<?php
	$sql = "SELECT * FROM marcas";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<option value='".$row['marid']."'>";
	echo $row['marid']." - ".$row['marnombre']."</option>\n";
}//fin while
	?>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Modelos:</td>
	<td>
	<select name='modid' id='modid'>
	<option value="">Seleccione marca primero</option>
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