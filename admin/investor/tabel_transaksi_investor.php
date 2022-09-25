<?php
    include_once '../../db_jeje.php';
    $qmutasi = mysqli_query($conn, "select * from transaksi_investor WHERE IDC = '$id' ORDER BY ID DESC");
?>
        <table class="w-100">
        
    <?php
    $total_mutasi = $total;

    while($baris = mysqli_fetch_array($qmutasi))
    {
        $idt = "$baris[ID]";
        $tanggal = "$baris[Tanggal]";
        $jumlah = "$baris[Jumlah]";
        $ket = "$baris[Keterangan]";
        echo "<tr><td align=center>$idt</td><td align=center>".substr($tanggal,0,5)."</td>
        <td>$ket</td><td align=right>".number_format($jumlah)."</td>
        <td align=right>".number_format($total_mutasi)."</td>
        </tr>";
        $total_mutasi -= $jumlah;
    }  
    ?>
    </table>