<?php
		include '../../koneksi_mdl.php';
		$id = $_POST['id'];
		$sql = sqlsrv_query($conn, "UPDATE robot_notif SET status = 'PROCESS' WHERE id = '$id'");
		sqlsrv_query($conn, $sql);
		header('Location: v_robot_wa.php');
		?>
	</div>
	</body>
	</htmL>