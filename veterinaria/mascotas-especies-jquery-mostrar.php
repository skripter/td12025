<table class='tablita'>
<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);
//Forma vieja y manual
//$espid = $_GET['espid'];
//Forma automatizada
extract($_GET,EXTR_OVERWRITE);
require('./db.php');
$sql = "SELECT * FROM razas ";
$sql .= "INNER JOIN especies ON razas.razespecie = especies.espid ";
$sql .= "WHERE razespecie='".$espid."'";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<tr>\n";
	echo "<td>".$row['razid']."</td>\n";
	echo "<td>".$row['raznombre']."</td>\n";
	echo "<td>".$row['razespecie']." - ".$row['espnombre']."</td>\n";
	echo "<td><a href='./razas-editar.php?razid=".$row['razid']."'>Editar</td>\n";
	echo "</tr>\n";
}//fin while
?>
</table>