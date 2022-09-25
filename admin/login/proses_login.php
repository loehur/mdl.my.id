<?php
     	if(isset($_POST['login'])){
			$pass = $_POST['pass'];
			if ($pass == '729465'){
				session_start();
				$_SESSION['pass'] = $pass;
				header("Location: ../index.php");
			}else{
				header("Location: index.php?msg=Incorrect Password");
			}		
		}else{
			header("Location: index.php?msg=Login Not Detected");
		}						
?>