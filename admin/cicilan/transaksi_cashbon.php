<html>
<head>
<meta charset="utf-8">
<title>Jeje Pay</title>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />
<link rel="stylesheet" href="style.css?v=3.1" media="screen">
<link rel="stylesheet" href="../pendaftaran.css?v=2.3" media="screen">

<script src="../../jquery/jquery-3.3.1.min.js"></script>
</head>

<body>

<script type="text/javascript">
    $(document).ready(function(){
        
        loadData();

        $('form[name="formBayar"]').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type:$(this).attr('method'),
                url:$(this).attr('action'),
                data:$(this).serialize(),
                success:function(){
                    loadData();
                    resetForm();
                }
            });
        })
    })

    function loadData(){
        var idp = $('#idp').val();
        $.get('tabel_transaksi_cashbon.php?idp=' + idp, function(data){
            $('#tabel_transaksi').html(data)
        })
    }
    function resetForm(){
        $('[type=text]').val('');
        $('[type=number]').val('');
        $('select').val('');
    }
</script>

<?php
    $id = $_GET['id'];
    $nama = $_GET['nama'];

    if ($id == ""){
        header('Location: index.php');
    }
            include '../../db_jeje.php';
            $qmutasi = mysqli_query($conn, "select * from pengajuan_cicilan WHERE IDC = '$id' AND StatusCil = '2'"); 
			$total = 0;
			while($baris = mysqli_fetch_array($qmutasi))
			{
                $tenor = "$baris[Tenor]";
				$mutasi = 0 + "$baris[M_Bulanan]" + "$baris[P_Bulanan]";
                $total = $mutasi * $tenor;
                $idp = "$baris[ID]";
                
				$qtmutasi = mysqli_query($conn, "select sum(Jumlah) as Jumlah from transaksi_cicilan WHERE IDP = '$idp'"); 
				while($barist = mysqli_fetch_array($qtmutasi))
				{
					$cil_bayar = "$barist[Jumlah]";
				}
				if ($cil_bayar){
					$total = $total - $cil_bayar;
                }
                
                if ($total < $mutasi){
					$mutasi = $total;
				}

            }
            
            if ($total <= 0) {
                $sisa_tenor = 0;
            }else{
                $sisa_tenor = $total/$mutasi;
            }
?>

<input type=hidden id="idp" value="<?php echo $idp;?>" />

        <table width=100%>
        <tr>
        <td><a href="index.php"><button class="back">Back</button></a></td>
        <td align=center valign=middle>
        <b><div><?php echo $nama." (".number_format($sisa_tenor,0).")<br>IDP [".$idp."] ".number_format($mutasi)."/".number_format($total);?></div></b></td>
        </tr></table>
        
        <table><tr>
            <td valign=top width=35%>
        <form action="arsip.php" method="POST">
            <input type="number" step="any" name="idp" placeholder="IDP" required>
            <select name="status_arsip" style="height:31px;" required>
                <option value="">Status</option>
                <option value="3">Lunas</option>
                <option value="7">Gagal Bayar</option>
            </select>
            <input class="keluar" type="submit" name="arsip" value="Arsip">
        </form>  
        </td>
        <td valign=top width=35%>
        <form name="formBayar" action="bayar_cashbon.php" method="POST">
        <input type="number" step="any" name="jumlah" placeholder="Jumlah" value ="<?php echo $mutasi; ?>" required>
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
       </table> 
       <table width=100%><tr><td>
                <div id="tabel_transaksi">
                </div>
        </td></tr></table>
        
</body>
</html>