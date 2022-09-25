<?php
include_once("../../db_mdl.php");

if(isset($_POST['Submit'])) 
{	
	$nama = $_POST['nama'];
	$result = mysqli_query($mysqli, "INSERT INTO account(nama) VALUES('$nama')");
	header('Location: index.php');
}
?>