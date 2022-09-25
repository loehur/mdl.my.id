<?php
if (isset($_GET['id']) || isset($_GET['status']))
{
	include_once("../../db_mdl.php");

	$id = $_GET['id'];
    $status = $_GET['status'];

	$query = mysqli_query($conn, "UPDATE notif SET status = '$status' WHERE id = '$id'");
	if ($query){
		echo "MDL01";
	}else{
		echo mysqli_error($conn);
	}
}else{
	echo 'Wrong Parameter';
}
?>
