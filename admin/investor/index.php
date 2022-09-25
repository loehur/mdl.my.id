<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jeje Pay</title>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />

<link rel="stylesheet" href="../../css/style.css?v=3" media="screen">
<link rel="stylesheet" href="../../css/base_style.css?v=3" media="screen">

<script src="../jquery/jquery-3.3.1.min.js"></script>
</head>

<?php include 'saldo.php';?>

<body>
<center>
        <table width=100%><tr>
        <form action="tambah_investor.php" method="POST">
        <td>
            <input type="text" name="nama" placeholder="Nama" required>
        </td>
        <td>
            <input type="number" name="no_hp" placeholder="No_Hanphone" required>
        </td>
        <td>
        <input class="masuk" type="submit" name="tambah" value="Tambah">
        </td>
        </tr>
        </form>
        </table>    
        <table width=100%><tr><td>
             <div id="tabel_investor"><?php include 'tabel_investor.php'; ?></div>   
        </td></tr></table>
</center>
</body>
</html>