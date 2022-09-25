<?php 
session_start();
if (!isset($_SESSION['id_master'])){
header('Location:../index.php');
}else{
$id = $_SESSION['id_master'];}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jeje Pay</title>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />
<link rel="stylesheet" href="style.css?v=3.1" media="screen">
<link rel="stylesheet" href="../pendaftaran.css?v=2.3" media="screen">

<script src="../jquery/jquery-3.3.1.min.js"></script>
</head>

<body>

<?php
    $id = $_GET['id'];
    $nama = $_GET['nama'];
    if ($id == ""){
        header('Location:../index.php');
    }
            include '../koneksi.php';
            $qmutasi = mysqli_query($conn, "select SUM(Jumlah) as Jumlah from transaksi_cashbon_umum WHERE IDC = '$id'"); 
			while($baris = mysqli_fetch_array($qmutasi))
			{
				$total  = "$baris[Jumlah]";
            }
            if (!$total){
                $total = 0;
            }
            $ppob = ""; $nama_cb = ""; $no_hp_cb = "";
            $query = mysqli_query($conn, "select * from cashbon_umum WHERE ID = '$id'"); 
			while($row = mysqli_fetch_array($query))
			{
                $ppob  = "$row[ppob]";
                $nama_cb  = "$row[Nama]";
                $no_hp_cb  = "$row[No_Hp]";
                $sisa_limit  = "$row[limit]";
                $jt  = "$row[Jatuh_Tempo]";
                $id_in  = "$row[ID_IN]";
            }
           
?>

<center>
        <table width=100%>
        <tr>
        <td valign=top><a href="index.php"><button class="back">Back</button></a></td>
        <td align=right>
        <form action="reset_akun.php" method="POST">
        <input type="hidden" name="hp_cb" value="<?php echo $no_hp_cb;?>"/>
        <input style="width:70px" type="text" name="id" placeholder="ID" required/>
        <button type="submit" class="back">Reset</button>
        </form>
        </td>
        </tr>
        <tr>
        <td style="background-color:orange;height:30px" colspan="2" align=center valign=middle><b><div id="sald"><?php echo "[".$id."] ".$nama." ".number_format($total);?></div></b></td>
        </tr>
        </table>
        
        <table><tr>
            <td valign=top width=35%>
        <form action="tambah_cashbon.php" method="POST">
            <input type="number" step="any" name="jumlah" placeholder="Jumlah" required>
            <input type="text" name="keterangan" value="Biaya_ADM" placeholder="Keterangan" required>
            <input type="hidden" value="<?php echo $nama;?>" name="nama">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input class="keluar" type="submit" name="cashbon" value="Tambah">
        </form>  
        </td>
        <td valign=top width=35%>
        <form action="bayar_cashbon.php" method="POST">
        <input type="number" step="any" name="jumlah" value="<?php echo $total;?>" placeholder="Jumlah" required>
        <select name="keterangan" style="height:31px;" required>
                <option value="">Status</option>
                <option value="Pembayaran_Tepat">Tepat Waktu</option>
                <option value="Pembayaran_Telat">Telat</option>
                <option value="Pembayaran_Parsial">Parsial</option>
            </select>
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
            <input type="text" name="nama_baru" value="<?php echo $nama_cb;?>" placeholder="<?php echo $nama_cb;?>" required>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input class="hapus" type="submit" name="perbarui_nama" value="Save_Name">
        </form></td>
        <td><form action="perbarui_no_hp.php" method="POST">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input type="number" step="any" name="no_hp" value="<?php echo $no_hp_cb;?>" placeholder="<?php echo $no_hp_cb;?>" required>
            <input class="hapus" type="submit" name="perbarui_no_hp" value="Save_Hp">
        </form></td>
        <td><form action="perbarui_jatuh_tempo.php" method="POST">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input type="number" step="any" name="jatuh_tempo" placeholder="<?php echo $jt;?>" required>
            <input class="hapus" type="submit" name="perbarui_jatuh_tempo" value="Save_JT">
        </form></td>
        </tr>
        <tr>
        <td><form action="proses_ubah_limit.php" method="POST">
            <input type="text" name="limit" placeholder="<?php echo number_format($sisa_limit);?>" required>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input class="hapus" type="submit" name="ubah_limit" value="Ubah Limit">
        </form></td>
        <td><form action="proses_id_in.php" method="POST">
            <input type="text" name="id_in" placeholder="<?php echo $id_in;?>" required>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input type="hidden" value="<?php echo $nama;?>" name="nama">
            <input type="hidden" value="<?php echo $total;?>" name="total">
            <input class="hapus" type="submit" name="p_id_in" value="Save_ID_IN">
        </form></td>
        <td valign=top>
        <form action="perbarui_ppob.php" method="POST">
            <select name="ppob" style="height:31px;" required>
                <option value="<?php echo $ppob;?>"><?php echo $ppob;?></option>
                <option value="ON">ON</option>
                <option value="OFF">OFF</option>
            </select>
           <input type="hidden" value="<?php echo $id;?>" name="id">
            <input class="hapus" type="submit" name="submit_ppob" value="Set PPOB">
        </form>  
        </td>
       </tr>
       </table> 
       <table width=100%><tr><td>
                <div id="tabel_transaksi"><?php include 'tabel_transaksi_cashbon.php'; ?></div>
        </td></tr></table>
        
</center>
</body>
</html>