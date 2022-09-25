<?php
if (isset($_GET['id']) || isset($_GET['no_hp']))
{
	include_once("../db_mdl.php");
	$id = $_GET['id'];
    $no_hp = $_GET['no_hp'];
        
	$result = mysqli_query($conn, "SELECT * FROM account WHERE no_hp = '$no_hp' AND id = '$id'");
	$num_rows = mysqli_num_rows($result);
	echo $num_rows;
	
}else{
	echo 'Wrong Parameter';
}
?>
