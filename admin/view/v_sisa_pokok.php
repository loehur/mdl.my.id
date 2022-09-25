<?php 
        include '../../koneksi.php';
        include '../../cashbon_umum/data_saldo.php';  
        include '../../cicilan/data_saldo.php'; 
        include '../data/data_laba_cicilan.php'; 


        $sisa_pokok = ($total_cashbon_umum+$total_cicilan)-$total_profit_cicilan;
        echo number_format($sisa_pokok*-1);
?>