<?php
if (isset($_GET['id']))
{
	include_once("../../db_mdl.php");
    $id = $_GET['id'];
        
	$emparray = array();
	$result = mysqli_query($conn, "SELECT id_pegawai FROM oper WHERE id = '$id'");
	$row = mysqli_fetch_row($result);
	echo $row[0];
}else{
	echo 'Wrong Parameter';
}
?>
