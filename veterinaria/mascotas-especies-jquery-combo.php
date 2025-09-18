<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);

//Forma vieja y manual
//$espid = $_GET['espid'];
//Forma automatizada
extract($_GET,EXTR_OVERWRITE);
require('./db.php');
if(!is_numeric($espid) or $espid < 1){ exit("ID incorrecto"); }
$espid = mysqli_real_escape_string($conn, $espid);
$sql = "SELECT * FROM razas ";
$sql .= "INNER JOIN especies ON razas.razespecie = especies.espid ";
$sql .= "WHERE razespecie='".$espid."'";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<option value=''>No se encontraro raza de esta especie.</option>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<option value='".$row['razid']."'>".$row['razid']." - ".$row['raznombre'];
	echo "</option>\n";
}//fin while
?>