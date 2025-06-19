<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
require('./db.php');
$msgok = "";
$msgerror = "";
$masid = 0;

if(!$_GET and !$_POST){
	header("Location: ./mascotas-listar.php");
	exit("No hay datos");
}

if($_POST){
	extract($_POST,EXTR_OVERWRITE);
	unset($msgerror);
	//var_dump($_POST);
	if(!is_numeric($masid) or $masid < 1){ $msgerror = "ID incorrecto"; }
	if(!is_numeric($petrace)){ $msgerror = "No se pudo guardar, raza incorrecta"; }
	/*if(!is_numeric($petowner)){
		$msgerror = "No se pudo guardar, dueño incorrecto";
	}*/
	
if(!isset($msgerror)){
	$masid = mysqli_real_escape_string($conn, $masid);
	$petname = mysqli_real_escape_string($conn, $petname);
	//guardo en la DB
	$sql = "UPDATE mascotas SET masnombre='".$petname."',  masespecie='".$petspecie."', masraza='".$petrace."', massexo='".$petsex."', masfechanac='".$petdob."', maspropietario='".$petownername."'";
	$sql .= " WHERE masid='".$masid."'";
	echo $sql;//exit();
	$result = mysqli_query($conn, $sql);
	$petname = stripslashes($petname);
	$msgok = "Se guardó correctamente la mascota: ". $petname;
}//if msgerror

}//fin POST

if($_GET){
	$masid = $_GET['masid'];
	if(!is_numeric($masid) or $masid < 1){
		header("Location: ./mascotas-listar.php");
		exit("No hay datos");
	}//fin if $masid
	$masid = mysqli_real_escape_string($conn,$masid);
	$sql = "SELECT * FROM mascotas WHERE masid='".$masid."'";
	//echo $sql;
	$resultado = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		$petname = $row['masnombre'];
		$petspecie = $row['masespecie'];
		$petrace = $row['masraza'];
		$petsex = $row['massexo'];
		$petdob = $row['masfechanac'];
		$petownername = $row['maspropietario'];
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
<input type="hidden" name="masid" value='<?php echo $masid; ?>'>
<?php
echo "<h4>$msgerror</h4>";
echo "<h4>$msgok</h4>";
?>
	<table>
	<caption>Datos de la mascota</caption>
	
	<tr>
	<td>Nombre:</td>
	<td><input type='text' name='petname' id='petname' value='<?php echo htmlentities($petname); ?>' autofocus required></td>
	</tr>
	
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
		$selected = "";
		if($row['espid'] == $petspecie){ $selected = " selected";}
		echo "<option value='".$row['espid']."'".$selected.">";
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
	<option value="">Seleccione raza</option>
	<?php
	$sql = "SELECT * FROM razas ORDER BY razespecie";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$selected = "";
		if($row['razid'] == $petrace){ $selected = " selected";}
		echo "<option value='".$row['razid']."'".$selected.">";
		echo $row['razid']." - ".$row['raznombre']."</option>\n";
}//fin while
	?>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Sexo:</td>
	<td>
	<select name='petsex' id='petsex'>
	<option value="">Seleccione sexo</option>
	<option value="H" <?php if($petsex=="H"){ echo " selected";} ?>>Hembra</option>
	<option value="M" <?php if($petsex=="M"){ echo " selected";} ?>>Macho</option>
	</select>
	</td>
	</tr>
	
	<tr>
	<td>Fecha Nac.:</td>
	<td><input type='date' name='petdob' id='petdob' value='<?php echo $petdob; ?>' required></td>
	</tr>
	
	<tr>
	<td>Dueño:</td>
	<td>
	<input type='text' name='petowner' id='petowner' readonly>
	<input type='text' name='petownername' id='petownername' value='<?php echo $petownername; ?>'required>
	</td>
	</tr>
	
	<tr>
	<td><button type='reset'>Limpiar</button></td>
	<td><button type='submit'>Editar</button></td>
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