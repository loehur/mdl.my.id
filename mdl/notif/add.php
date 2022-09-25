<?php
    include '../../db_mdl.php';
    if(isset($_GET['phone']) && isset($_GET['text']) && isset($_GET['mode'])) {
        try {       
            //PARAMETER GET HTTP
            $phone = $_GET['phone'];
            $text = $_GET['text'];
            $mode = $_GET['mode'];
            $hp = $_GET['hp'];
        
            $result = mysqli_query($conn, "INSERT INTO notif(phone,text,mode,no_hp) VALUES('$phone','$text','$mode','$hp')");
            echo "[MDL01] - MESSAGE RECEIVED";
        } catch (\Throwable $th) {
            echo $th;
            exit();
        }
    }else{
        echo "PARAMETER ERROR";
    }
?>