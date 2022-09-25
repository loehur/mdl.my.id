<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jeje Pay</title>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />
<link rel="stylesheet" href="style.css?v=3.5" media="screen">

<script src="../jquery/jquery-3.3.1.min.js"></script>
</head>

<body>
<center>
        <table width=100%>
        <tr>
        <td><a href="../home"><button class="back">Back</button></a></td>
        <td align=center valign=middle colspan=2><b><div id="sald"><?php include 'saldo.php'; echo $total_all.$bulanan_all;?></div></b></td>
        </tr></table>
        <table width=100%><tr><td>
                <div id="tabel_staf"><?php include 'tabel_umum.php'; ?></div>
        </td></tr></table>
        
</center>
</body>
</html>