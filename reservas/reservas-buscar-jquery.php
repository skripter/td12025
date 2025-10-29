<br>
<table class='tablita'>
<?php
//ini_set('display_errors', '1');
//error_reporting(E_ALL);

//Forma vieja y manual
//$modid = $_GET['modid'];
//Forma automatizada
extract($_GET,EXTR_OVERWRITE);
if(empty($resestado)){ $resestado= "'N','C'"; }else{ $resestado="'".$resestado."'"; }
require('./db.php');
$buscar = mysqli_real_escape_string($conn, $buscar);
$sql = "SELECT * FROM reservas ";
$sql .= "INNER JOIN hoteles ON reservas.reshotid = hoteles.hotid ";
$sql .= "INNER JOIN personas ON reservas.resperid = personas.perid ";
$sql .= "WHERE resestado in (".$resestado.") ";
if($resfechaini <> "" ){ $sql .= " AND resfechaini >='".$resfechaini."'"; }
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if
$i=1;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	if($i == 1){ $hotel =$row['reshotid']; }
	echo "<tr>\n";
	echo "<td>".$row['resid']."</td>\n";
	echo "<td>".$row['hotnombre']."</td>\n";
	echo "<td>".$row['pernombre']." ".$row['perapellido']."</td>\n";
	echo "<td>".$row['resfechaini']."</td>\n";
	echo "<td>".$row['resfechafin']."</td>\n";
	echo "<td>".$row['resestado']."</td>\n";
	echo "<td><a href='./reserva-ver.php?resid=".$row['resid']."'>Ver reserva</td>\n";
	echo "</tr>\n";
	$i=2;
}//fin while
?>
</table>
<hr>
<table class='tablita'>
<caption>Recomendaciones</caption>
<?php
$sql = "SELECT * FROM hoteles ";
$sql .= "WHERE hotid = '".$hotel."'";
//echo $sql;
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) < 1 ){
	echo "<tr>";
	echo "<td colspan='2'>No se encontraron datos.</td>";
	echo "</tr>";
}//fin if
$i=1;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	//if($i == 1){ $autor =$row['modid']; }
	echo "<tr>\n";
	echo "<td>".$row['hotid']."</td>\n";
	echo "<td>".$row['hotnombre']."</td>\n";
	echo "<td><a href='./-ver-hotel.php?hotid=".$row['hotid']."'>Ver rese&ntilde;a hotel</td>\n";
	echo "</tr>\n";
	$i=2;
}//fin while
?>
</table>