<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jeje Pay</title>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />
<script src="../jquery/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="../../css/style.css?v=3" media="screen">
<link rel="stylesheet" href="../../css/base_style.css?v=3" media="screen">
</head>

<body>
<center>
        <table class="w-100"><tr>
        <td>
        <form action="tambah_staf_cashbon.php" method="POST">
            <input type="text" name="nama" placeholder="Nama" required>
            <select name="tempat_kerja" required>
            <option value="">Hubungan</option>
                <option value="MDL Pinang">MDL Pinang</option>
                <option value="MDL Kelapa Sawit">MDL Kelapa Sawit</option>
                <option value="MDL Rawamangun">MDL Rawamangun</option>
                <option value="MDL Tiung">MDL Tiung</option>
                <option value="Bisnis">Bisnis</option>
                <option value="Family">Family</option>
            </select>
            <input class="masuk" type="submit" name="tambah" value="Tambah">
        </form>
        </td>
        </tr>
        </table>        
        <table width=100%><tr><td>
                <div id="tabel_staf"><?php include 'tabel_staf.php'; ?></div>
        </td></tr></table>
        
</center>
</body>
</html>