<?php

if (isset($_GET['db']))
    {
        include_once("../../db_mdl.php");

        $total_coin = 0;
        $db = $_GET['db'];
        $result = mysqli_query($mysqli, "SELECT SUM(coin) as sum FROM coin WHERE nama_db = '$db'");
        while($res = mysqli_fetch_array($result))
        { 	
            $coin = $res['sum'];
            if(isset($coin))
            {
                $total_coin = $coin;    
            }
        }

        $date = DATE('d-m-Y');
        $myfile = fopen("db_coin/".$db.".txt", "w") or die("Unable to open file!");
        $txt = $date." ".$total_coin;
        fwrite($myfile, $txt);
        fclose($myfile);
        header('Location: v_coin_add.php');
    }
?>
