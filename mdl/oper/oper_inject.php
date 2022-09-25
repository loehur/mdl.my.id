<?php
if (isset($_GET['sender']) || isset($_GET['target']) || isset($_GET['id_bon']) || isset($_GET['customer']) || isset($_GET['no_hp']))
{
	include_once("../../db_mdl.php");

	$sender = $_GET['sender'];
    $target = $_GET['target'];
	$id_bon = $_GET['id_bon'];
	$customer = $_GET['customer'];
    $berat = $_GET['berat'];
	$no_hp = $_GET['no_hp'];
    $id = $sender.$id_bon;

    if($target>0){
    	$query = mysqli_query($conn, "INSERT INTO oper(id, sender, target, id_bon, customer, berat, no_hp) VALUES('$id','$sender','$target','$id_bon','$customer','$berat','$no_hp')");
	    if ($query){
    		echo "MDL01";
    	    }else{
    		echo mysqli_error($conn);
    	    }
    }else{
        	echo "ERROR TARGET";
    }
}else{
	echo 'Wrong Parameter';
}
?>
