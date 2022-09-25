<?php
		//ASUSAMBI BELUM BAYAR
     	$qmutasi = mysqli_query($conn, "select * from pengajuan_cicilan WHERE StatusCil in ('2', '3', '7')"); 
		$total_cicilan = 0;
		$bulanan = 0;
		$cil_bayar = 0;
		$total_satuan  = 0;
		while($baris = mysqli_fetch_array($qmutasi))
		{
			$idp = "$baris[ID]";
			$tenor = "$baris[Tenor]";
			$total_satuan = ("$baris[P_Bulanan]" + "$baris[M_Bulanan]") * $tenor;
			$total_cicilan = $total_cicilan + $total_satuan;		
		}   

		// TOTAL GAGAL BAYAR
		$total_cicilan_gagal = 0;
		$qmutasi = mysqli_query($conn, "select * from pengajuan_cicilan WHERE StatusCil = '7'"); 
		while($baris = mysqli_fetch_array($qmutasi))
		{
			$idp = "$baris[ID]";
			$tenor = "$baris[Tenor]";
			$total_satuan_gagal = ("$baris[P_Bulanan]" + "$baris[M_Bulanan]") * $tenor;
			$total_cicilan_gagal = $total_cicilan_gagal + $total_satuan_gagal;	

			//YANG DIBAYAR
			$qtmutasi2 = mysqli_query($conn, "select sum(Jumlah) as Jumlah from transaksi_cicilan where IDP = '$idp'"); 
			while($barist2 = mysqli_fetch_array($qtmutasi2))
			{
				$cil_bayar = "$barist2[Jumlah]";
			}
			if ($cil_bayar){
				$total_cicilan_gagal = $total_cicilan_gagal - $cil_bayar;
			}
		}   

		$qtmutasi = mysqli_query($conn, "select sum(Jumlah) as Jumlah from transaksi_cicilan"); 
			while($barist = mysqli_fetch_array($qtmutasi))
			{
				$cil_bayar = "$barist[Jumlah]";
			}
			if ($cil_bayar){
				$total_cicilan = $total_cicilan - $cil_bayar - $total_cicilan_gagal;
			}
		?>