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
    if(isset($_GET['no_hp'])){
        $no_hp = $_GET['no_hp'];
    }else{
        $no_hp = "";
    }
    $id = $_GET['id'];
    $nama = $_GET['nama'];
  
    if ($id == ""){
        header('Location:../index.php');
    }
            include_once '../../db_jeje.php';
            $qmutasi = mysqli_query($conn, "select * from transaksi_investor WHERE IDC = '$id'"); 
			$total = 0;
			while($baris = mysqli_fetch_array($qmutasi))
			{
				$mutasi = 0 + "$baris[Jumlah]";
				$total = $total + $mutasi;
			}
?>

        <table width=100%>
        <tr>
        <td><a href="index.php"><button class="back">Back</button></a></td><td align=center valign=middle colspan=2><b><div id="sald"><?php echo number_format($total);?></div></b></td>
        <td align = right><a href="reset_akun.php?id=<?php echo $id ?>"><button class="back">Reset</button></a></td>
        </tr></table>
        
        <table><tr>
        
        <td width=30%>
        <form action="tambah_investasi.php" method="POST">
            <input type="number" step="any" name="jumlah" placeholder="Jumlah" required>
            <input type="text" name="keterangan" value="Penambahan" placeholder="Keterangan" required>
            <input type="hidden" value="<?php echo $nama;?>" name="nama">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input class="masuk" type="submit" name="tambah" value="Tambah">
        </form>
        </td>

        <td width="40%">
        <form action="tarik_investasi.php" method="POST">
        <input type="number" step="any" name="jumlah" placeholder="Jumlah" required>
        <input type="text" name="keterangan" value="Penarikan" placeholder="Keterangan" required>
        <input type="hidden" value="<?php echo $id;?>" name="id">
        <input type="hidden" value="<?php echo $nama;?>" name="nama">
            <input class="keluar" type="submit" name="tarik" value="Tarik">
        </form>
        </td>

        <td>
        <form action="proses_hapus_transaksi.php" width=30% method="POST">
            <input type="number" name="idt" placeholder="ID" required>
            <input type="number" name="jumlah" placeholder="Jumlah" required>
            <input class="hapus" type="submit" name="hapus_transaksi" value="Hapus TRX">
        </form>
        </td>
        </tr>
        <tr>
        <td>
        <form action="tambah_hasil_investasi.php" method="POST">
            <input type="number" step="any" name="jumlah" placeholder="Jumlah" required>
            <input type="hidden" value="<?php echo $nama;?>" name="nama">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input class="masuk" type="submit" name="tambah" value="+ Hasil">
        </form>
        </td>
        <td><form action="perbarui_nama.php" method="POST">
            <input type="text" name="nama_baru" placeholder="<?php echo $nama ?>" value="<?php echo $nama ?>" required>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input class="hapus" type="submit" name="perbarui_nama" value="Save">
        </form></td>
        <td><form action="perbarui_no_hp.php" method="POST">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input type="text" step="any" name="no_hp" placeholder="<?php echo $no_hp?>" value="<?php echo $no_hp?>" required>
            <input class="hapus" type="submit" name="perbarui_no_hp" value="Save">
        </form></td>
       </tr>
        <tr>
        <td><br></td></tr>

       </table>     
       <table style="margin:auto"><tr>
        <td>Name</td><td><b><div id="sald">: <?php echo $nama;?>,</div></b></td>
        <td>Last Balance</td><td><b><div id="sald">: <?php echo number_format($total);?></div></b></td>
        </tr>  
        <table width=100%><tr><td>
                <div id="tabel_transaksi"><?php include 'tabel_transaksi_investor.php'; ?></div>
        </td></tr></table>
        </table>
        
</body>
</html>