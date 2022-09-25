<?php
include_once("menu.php");
include_once("../../db_mdl.php");
?>

<html>
<body>
	<form action="akun_add.php" method="post" name="form1">
		<table width="100%" border="0">
		<tr> 
			<td>Laundry</td>
			<td><input type="text" name="nama" required></td>
		</tr>
		<tr> 
			<td></td>
			<td><input type="submit" class="btn-submit" name="Submit" value="Tambah"></td>
		</tr>
		</table>
	</form>

	<?php
	$result = mysqli_query($conn, "SELECT * FROM account ORDER BY coin_used DESC");
	?>
	<div class="mt-1 konten w-100">
		<table width="100%">
		<?php 
		while($res = mysqli_fetch_array($result)) { 		
			$id_mdl = $res['id'];
			$coin = 0;
			$terpakai = $res['coin_used'];

			$cek_topup = mysqli_query($conn, "SELECT SUM(coin) as sum FROM coin WHERE id_mdl = $id_mdl");
			while($res1 = mysqli_fetch_array($cek_topup)) 
			{ 	
				$coin = $res1['sum'];
			}
			$sisa = $coin - $terpakai;
			$tampil_sisa = "";
			if($sisa < 100){
				$tampil_sisa = "<font color=red><b>[ ".$sisa." ]</b></font> ";
			}else{
				$tampil_sisa = "<b>[ ".$sisa." ]</b> ";
			}
			echo "<tr>";
			echo "<td>".$coin."<br>".$terpakai."</td>";
			echo "<td>".$res['id']." - ".$res['nama']."<br>".$tampil_sisa.$res['tgl_register']."</td>";	
		}
		?>
		</table>
	</body>
	</html>

