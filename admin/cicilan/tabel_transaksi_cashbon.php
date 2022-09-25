<?php
    include '../../db_jeje.php';
    $idp = $_GET['idp'];
    $qmutasi = mysqli_query($conn, "select * from transaksi_cicilan WHERE IDP = '$idp' ORDER BY ID ASC");
?>
        <table id="transaksi" style="font-size:12px">
        <tr>
        </tr>
    <?php
    $no = 0;
    while($baris = mysqli_fetch_array($qmutasi))
    {
        $no = "$baris[ID]";
        $tanggal = "$baris[Tanggal]";
        $jumlah = "$baris[Jumlah]";
        $keterangan = "$baris[Keterangan]";
        $warna_font ="";
                if ($keterangan == "Pembayaran_Telat") {
                    $warna_font = "style='background-color:red; color:white'";
                }
        echo "<tr $warna_font><td align=center>$no</td><td align=center>$tanggal</td><td>$keterangan</td><td align=right>".number_format($jumlah)."</td></tr>";
    }  
    ?>
    </table>