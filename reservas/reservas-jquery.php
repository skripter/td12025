<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
session_start();
require('./db.php');
?>
<html>
<head>
<title>Buscar reservas</title>
<meta charset='UTF-8'>
<link href='./estilo-diagramacion.css' rel='stylesheet' type='text/css'>
<script src="/js/jquery-3.7.1.min.js"></script>
<script>
$(function(){
    $("#resestado").on("change", function(){
        var resestado = $("#resestado option:selected").val();
		var resfechaini = $("#resfechaini").val();
        $("#visor").load("reservas-buscar-jquery.php?resestado="+resestado+"&resfechaini="+resfechaini);
    });//Fin resestado
	
	$("#resfechaini").on("change", function(){
        var resestado = $("#resestado option:selected").val();
		var resfechaini = $("#resfechaini").val();
        $("#visor").load("reservas-buscar-jquery.php?resestado="+resestado+"&resfechaini="+resfechaini);
    });//Fin resfechaini
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
	<caption>Datos de la reserva</caption>
	<tr>
	<td>Estado:</td>
	<td>
	<select name='resestado' id='resestado'>
	<option value="">Seleccione estado</option>
	<option value="N">Nueva</option>
	<option value="C">Cancelado</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Fecha inicio:</td>
	<td>
	<input type="date" name='resfechaini' id='resfechaini'>
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