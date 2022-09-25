<!DOCTYPE html>
<html>
<head>
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
<link rel="stylesheet" href="../../css/style.css?v=4" media="screen">
<link rel="stylesheet" href="../../css/base_style.css?v=3" media="screen">
<link rel="icon" href="icon/icon.png" type="image/gif">
</head>

<body>
<div class="sticky_top" style="background-color:white">
	<div class="konten w-100">
		<form action="add.php" method="POST">
			<div class="m-1">
				<table>
					<tr>
						<td><input name="tgl" type="text" pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD" required /></td>
						<td><input name="jumlah" type="number" placeholder="Jumlah" required /></td>
					</tr>
					<tr>
						<td><input name="nama" type="text" placeholder="Nama" required /></td>
						<td><input type="submit" name="tambah" class="btn-submit w-100 p-1" value="Tambah" /></td>
					</tr>
				</table>
			</div>
		</form>
	</div>

	<div class="mt-1 konten w-100">
		<form action="delete.php" method="POST">
		<div class="m-1">
			<table class="w-100">
				<tr>
					<td><input name="id" type="number" placeholder="ID" required /></td>
					<td><input name="hapus" type="submit" class="btn-logout w-100 p-1" value="Hapus" /></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
</div>
<div class="mt-1 konten w-100">
	<div class="m-1">
		<table width="100%">
		<?php
function IntervalDays($CheckIn,$CheckOut){
$CheckInX = explode("-", $CheckIn);
$CheckOutX =  explode("-", $CheckOut);
$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
$interval =($date2 - $date1)/(3600*24);
// returns numberofdays
return  $interval ;
}
?>

		<?php 

		include_once("../../db_jeje.php");
		$result = mysqli_query($conn, "SELECT * FROM bill_tb ORDER BY bill ASC");
		$tgl_selesai= DATE('Y-m-d');
		$total_bill = 0;
		$total = 0;
		while($res = mysqli_fetch_array($result)) { 	
			
			$bulanan = $res['bulanan'];
			$tgl_mulai = $res['tanggal_awal'];
			$seldate = IntervalDays($tgl_mulai, $tgl_selesai);
			$numBulan = floor($seldate/30);
			$bill = 0;
			$total = $total + $bulanan;
			if($numBulan>0){
			$bill = $numBulan*$bulanan;
			}
			$total_bill = $total_bill + $bill;
				
			echo "<tr>";
			echo "<td align=right valign=top>".$res['id']."</td>";
			echo "<td valign=top>".$res['bill']."<br><font color=gray size=1>".$tgl_mulai."</font></td>";
			echo "<td valign=top align=right>".number_format($bill)."<br><font color=gray size=1>".number_format($bulanan)."</font></td>";
			if($bill>0){
				echo "<td  valign=middle><a href='bayar.php?id=".$res['id']."'><button class='btn-submit'>Bayar</button></a></td>";	
			}
			echo "</tr>";
		}
		?>
		</table>
	</div>
</div>

<div class="sticky_bot konten w-100">
<p align=center><b><?php echo number_format($total_bill);?></b> / <font color=gray size=1><?php echo number_format($total);?></font></p>
</div>

</body>
</html>
