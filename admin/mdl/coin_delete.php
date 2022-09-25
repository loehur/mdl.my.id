<?php
include("../../db_mdl.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM coin WHERE id=$id");
header("Location:v_coin_add.php");
?>

