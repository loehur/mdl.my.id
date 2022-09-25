<?php
    include '../koneksi.php';
    $qmutasi = mysqli_query($conn, "select * from transaksi_cashbon_umum WHERE IDC = '$id' ORDER BY ID DESC");
?>
        <table id="transaksi">
        <tr>
        </tr>
    <?php
    while($baris = mysqli_fetch_array($qmutasi))
    {
        $idt = "$baris[ID]";
        $tanggal = "$baris[Tanggal]";
        $jumlah = "$baris[Jumlah]";
        $keterangan = "$baris[Keterangan]";
        $warna_font ="";
                if ($keterangan == "Pembayaran_Telat") {
                    $warna_font = "style='background-color:red; color:white'";
                }
        echo "<tr $warna_font><td align=center>$idt</td><td align=center nowrap>$tanggal</td><td>$keterangan</td><td align=right>".number_format($jumlah)."</td></tr>";
    }  
    ?>
    </table>

    <?php
    mysqli_close( $conn); 
    ?>