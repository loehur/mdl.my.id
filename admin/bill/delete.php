<?php
if(isset($_POST['hapus'])) 
{
    include_once("../../db_jeje.php");
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM bill_tb WHERE id=$id");
}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
?>

