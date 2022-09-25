<?php
include_once("menu.php");
include_once("../../db_mdl.php");
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<form action="coin_add.php" method="post" name="form1">
		<table width="100%" border="0">
			<tr> 
				<td>Laundry</td>
				<td>
				
				<?php
				$qAkun = mysqli_query($conn, "SELECT * FROM account ORDER BY id ASC");
				?>
				<select name="id" required>
					<option value=""></option>
					<?php
					while($akun = mysqli_fetch_array($qAkun)) {
						?>
					<option value="<?php echo $akun['id']?>"><?php echo $akun['id']." - ".$akun['nama']; ?></option>
					<?php } ?>
				</select>

				</td>
			</tr>
			<tr> 
				<td>Coin</td>
				<td><input type="number" name="coin" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" class="btn-submit" name="Submit" value="Tambah"></td>
			</tr>
		</table>
	</form>

	<?php
	$result = mysqli_query($conn, "SELECT * FROM coin ORDER BY id DESC LIMIT 20");
	?>
	<div class="mt-1 konten w-100">
		<table width="100%">
		<?php 
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['id']." - ".$res['id_mdl']."<br>".$res['inserted']."</td>";
			echo "<td>".$res['coin']." Coin<br><a href=\"coin_delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";	
		}
		?>
		</table>
	</body>
	</html>

