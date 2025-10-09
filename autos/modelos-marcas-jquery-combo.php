<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);

//Forma vieja y manual
//$marid = $_GET['marid'];
//Forma automatizada
extract($_GET,EXTR_OVERWRITE);
require('./db.php');
if(!is_numeric($marid) or $marid < 1){ exit("ID incorrecto"); }
$marid = mysqli_real_escape_string($conn, $marid);
$sql = "SELECT * FROM modelos ";
$sql .= "INNER JOIN marcas ON modelos.modmarca = marcas.marid ";
$sql .= "WHERE modmarca='".$marid."'";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<option value=''>No se encontro raza de esta especie.</option>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<option value='".$row['modid']."'>".$row['modid']." - ".$row['modnombre'];
	echo "</option>\n";
}//fin while
?>