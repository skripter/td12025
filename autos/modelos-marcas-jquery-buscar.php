<br>
<table class='tablita'>
<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);

//Forma vieja y manual
//$modid = $_GET['modid'];
//Forma automatizada
extract($_GET,EXTR_OVERWRITE);
require('./db.php');
$buscar = mysqli_real_escape_string($conn, $buscar);
$sql = "SELECT * FROM modelos ";
$sql .= "INNER JOIN marcas ON modelos.modmarca = marcas.marid ";
$sql .= "WHERE modnombre LIKE '%".$buscar."%' OR marnombre LIKE '%".$buscar."%'";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if
$i=1;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	if($i == 1){ $marca =$row['marid']; }
	echo "<tr>\n";
	echo "<td>".$row['modid']."</td>\n";
	echo "<td>".$row['modnombre']."</td>\n";
	echo "<td>".$row['marid']." - ".$row['marnombre']."</td>\n";
	echo "<td><a href='./modelo-ver-resenia.php?modid=".$row['modid']."'>Leer rese&ntilde;a</td>\n";
	echo "</tr>\n";
	$i=2;
}//fin while
?>
</table>
<hr>
<table class='tablita'>
<caption>Recomendaciones</caption>
<?php
$sql = "SELECT * FROM modelos ";
$sql .= "INNER JOIN marcas ON modelos.modmarca = marcas.marid ";
$sql .= "WHERE modmarca = '".$marca."'";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if
$i=1;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	if($i == 1){ $autor =$row['modid']; }
	echo "<tr>\n";
	echo "<td>".$row['modid']."</td>\n";
	echo "<td>".$row['modnombre']."</td>\n";
	echo "<td>".$row['marid']." - ".$row['marnombre']."</td>\n";
	echo "<td><a href='./modelo-ver-resenia.php?libid=".$row['libid']."'>Leer rese&ntilde;a</td>\n";
	echo "</tr>\n";
	$i=2;
}//fin while
?>
</table>