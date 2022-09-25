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

<body>

<?php
    $id = $_GET['id'];
    $nama = $_GET['nama'];
    if ($id == ""){
        header('Location:../index.php');
    }
            include '../../db_jeje.php';
            $qmutasi = mysqli_query($conn, "select * from transaksi_cashbon WHERE IDC = '$id'"); 
			$total = 0;
			while($baris = mysqli_fetch_array($qmutasi))
			{
				$mutasi = 0 + "$baris[Jumlah]";
				$total = $total + $mutasi;
			}
?>

<center>
        <table width=100%>
        <tr>
        <td align=center valign=middle colspan=2><b><div id="sald"><?php echo $nama." | ".number_format($total);?></div></b></td>
        </tr></table>
        
        <table><tr>
            <td valign=top width=35%>
        <form action="tambah_cashbon.php" method="POST">
            <input type="number" step="any" name="jumlah" placeholder="Jumlah" required>
            <input type="text" name="keterangan" placeholder="Keterangan">
            <input type="hidden" value="<?php echo $nama;?>" name="nama">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input class="keluar" type="submit" name="cashbon" value="Cashbon">
        </form>
        </td>
        <td valign=top width=35%>
        <form action="bayar_cashbon.php" method="POST">
        <input type="number" step="any" name="jumlah" value="<?php echo $total;?>" placeholder="Jumlah" required>
        <input type="text" name="keterangan" placeholder="Keterangan">
        <input type="hidden" value="<?php echo $id;?>" name="id">
        <input type="hidden" value="<?php echo $nama;?>" name="nama">
            <input class="masuk" type="submit" name="bayar" value="Bayar">
        </form>
        </td>
        <td valign="top" width="" rowspan="1">
        <form action="proses_hapus_transaksi.php" method="POST">
            <input type="number" name="idt" placeholder="ID" required>
            <input type="number" name="jumlah" placeholder="Jumlah" required>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input type="hidden" value="<?php echo $nama;?>" name="nama">
            <input class="hapus" type="submit" name="hapus_transaksi" value="Hapus TRX">
        </form>
        </td>
        </tr>  
       </table>       
       <table>
       <tr>
       <td><form action="perbarui_nama.php" method="POST">
            <input type="text" name="nama_baru" placeholder="Nama Baru" required>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input class="hapus" type="submit" name="perbarui_nama" value="Perbarui">
        </form></td>
        <td width="35%"><form action="perbarui_tempat_kerja.php" method="POST">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <select name="tempat_kerja_baru" required>
                <option value="">Hubungan</option>
                <option value="MDL Pinang">MDL Pinang</option>
                <option value="MDL Kelapa Sawit">MDL Kelapa Sawit</option>
                <option value="MDL Rawamangun">MDL Rawamangun</option>
                <option value="Bisnis">Bisnis</option>
                <option value="Family">Family</option>
            </select>
            <input class="hapus" type="submit" name="perbarui_tempat_kerja" value="Perbarui">
        </form></td>
        <td><form action="proses_hapus_akun.php" method="POST">
            <input type="text" name="nama_hapus" placeholder="Nama" required>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input type="hidden" value="<?php echo $nama;?>" name="nama">
            <input type="hidden" value="<?php echo $total;?>" name="total">
            <input class="hapus" type="submit" name="hapus_akun" value="Hapus Akun">
        </form></td>
       </tr>
       </table>   
       <table width=100%><tr><td>
                <div id="tabel_transaksi"><?php include 'tabel_transaksi_cashbon.php'; ?></div>
        </td></tr></table> 
        
</center>
</body>
</html>