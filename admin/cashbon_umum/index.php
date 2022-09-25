<?php 
if(!isset($_GET["sh"])){
    $sh = "m";
}else{
    $sh = $_GET["sh"];
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jeje Pay</title>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />
<link rel="stylesheet" href="style.css?v=3.5" media="screen">
<link rel="stylesheet" href="../pendaftaran.css?v=1.3" media="screen">

<script src="../jquery/jquery-3.3.1.min.js"></script>
</head>

<body>
<center>
        <table width=100%>
        <tr>
        <td><a href="../home"><button class="back">Back</button></a></td>
        <td align=right><a href="?sh=a"><button class="back" style="background-color:red">Pasif</button></a> 
        <a href="?sh=m"><button class="back" style="background-color:green">Aktif</button></a></td>
        </tr></table>
        
        <form action="tambah_umum_cashbon.php" method="POST">
        <table width=100%><tr>
        <td>
            <input type="text" name="nama" placeholder="Nama" required>
        </td>
        <td>
        <input type="number" name="no_hp" placeholder="Nomor_Hp" required>
        </td>
        <td>
            <input type="number" name="jatuh_tempo" placeholder="J_Tempo" required>
        </td>
        </tr>
        <tr>
            <td colspan=3><input class="masuk" type="submit" name="tambah" value="Tambah"></td>
            </tr>
        </table>        
        </form>
        <table width=100%><tr><td>
        <?php if ($sh == "m"){?>
            <div id="tabel_staf"><?php include 'tabel_umum_khusus.php'; ?></div>
        <?php }else{?>
            <div id="tabel_staf"><?php include 'tabel_umum.php'; ?></div>
        <?php } ?>
               
        </td></tr></table>
        
</center>
</body>
</html>