<?php
    $qmutasi = mysqli_query($conn, "select * from transaksi_cashbon WHERE IDC = '$id' ORDER BY ID DESC");
?>
        <table class="w-100">
       
    <?php
    while($baris = mysqli_fetch_array($qmutasi))
    {
        $idt = "$baris[ID]";
        $tanggal = "$baris[Tanggal]";
        $jumlah = "$baris[Jumlah]";
        $keterangan = "$baris[Keterangan]";
        echo "<tr><td align=center>$idt</td><td align=center>$tanggal</td><td>$keterangan</td><td align=right>".number_format($jumlah)."</td></tr>";
    }  
    ?>
    </table>

    <?php
    mysqli_close( $conn); 
    ?>