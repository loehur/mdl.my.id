<?php 
    session_start();
    if (!isset($_SESSION['id_master'])){
    header('Location:../index.php');
    }
    
    else{
    $id = $_SESSION['id_master'];}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="logo.ico">
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>

    <title>GLORY GROUP</title>
    <link rel="stylesheet" href="pendaftaran.css?v=1.1" media="screen">
    <link rel="stylesheet" href="style.css?v=1.1" media="screen">
    
    <script src="../../jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">   
        function bukaData(id, load)
        {
            $(id).load(load);
        }
    </script>
    <style>
        button{
            width:100%;
            height:30px;
            color:white;
            background-color: #3B476D;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius:3px;
        }
        input[type=submit]{
            width:100%;
            height:30px;
            background-color: maroon;
            color:white;
            border-radius:3px;
        }
        select{
            background-color: white;
            color: black;
            border: 2px solid maroon; /* Green */
            border-radius:3px;
        }
    </style>
    </head>

<body>
<br>
    <table align=center width=97%>
        <tr>
          <th width=50%><button style="background-color:purple" onclick="bukaData('#aktifa','view/v_total_aktifa.php');">Total Aktifa</button></th>
          <th><button style="background-color:maroon" onclick="bukaData('#info','view/v_info.php');">Info</button></th>
          <th><button style="background-color:blue">Next Goal</button></th>
        </tr>
        <tr>
            <td align=center><font size=3><b><div id="aktifa">...</div></b></font></td>
            <td align=center><a href="data_pemberitahuan.php"><font color=red><div id="info">...</div></font></a></td>
            <td align=center><div><?php echo number_format($target) ?></div></td>
        </tr>
    </table>
        
<div class="wrapper">
    <table style="border-radius:1mm;" align=center width=100%>
        <tr>
        <td align=center><button onclick="bukaData('#kas','view/v_kas.php');">Kas & Bank</button><br>
        <a href="../kas"><font color=green><b><div id="kas">...</div></font></a></td>
        <td align=center><button style="background-color:#761E20" onclick="bukaData('#invest','view/v_investor.php');">Investor</button><br>
        <a href="../investor"><font color=red><div id="invest">...</div></font></a></td>
        <td align=center><button disabled>Mobile Pulsa</button><br>
        <a href="view/v_robot_pulsa.php"><font color=green><div id="mpulsa">...</div></font></a></td>
        </tr>
        <tr>
        <td align=center><button onclick="bukaData('#hadi','view/v_hadi.php');">Hadi Pay</button><br>
        <a href="../hadi_pay/index.php"><font color=green><div id="hadi">...</div></font></a></td>
        <td align=center><button onclick="bukaData('#cash_staf','view/v_cash_staf.php');">Cashbon Staf</button><br>
        <a href="../cashbon_staf"><font color=green><div id="cash_staf">...</div></font></a></td>
        <td align=center><button onclick="bukaData('#cash_umum','view/v_cash_umum.php');">Cashbon Umum</button><br>
        <a href="../cashbon_umum?sh=m"><font color=green><div id="cash_umum">...</div></font></a></td>
        </tr>
        <tr>
        <td align=center><button onclick="bukaData('#mdl','view/v_mdl.php');">MD Laundry</button><br>
        <a href="../md_laundry"><font color=green><div id="mdl">...</div></font></a>
        <td align=center><button onclick="bukaData('#p2p','view/v_p2p.php');">P2P Lending</button><br>
        <a href="../Forex"><font color=green><div id="p2p">...</div></font></a></td>
        <td align=center><button onclick="bukaData('#cicilan','view/v_cicilan.php');">Cicilan Kerabat</button><br>
        <a href="../cicilan"><font color=green><div id="cicilan">...</div></font></a></td>
        </tr>
        <tr>
        <td align=center><button onclick="bukaData('#warnet','view/v_warnet.php');">Warnet</button><br>
        <a href="../jeje_pay/index.php"><font color=green><div id="warnet">...</div></font></a></td>
        </tr>
    </table>
    </div>
        <form action="../recap/tampil_recap.php" method="POST">
        <table align=center width=98% style="margin:auto"><tr>
            <td>
             <select style="width:100%; height:30px; text-align-last:center" name="bulan" required>
                <option value="<?php echo date("m");?>"><?php echo date("F");?></option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </td>
        <td>
        <select style="width:100%; height:30px; text-align-last:center" name="tahun" required>
                <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
        </td>
        <td><input type="submit" name="recap" value="Recap Bulanan"></td></tr>
        </form>
        
        <tr>
        <td></td>
        <td>
        <form action="../recap/tampil_recap_tahunan.php" method="POST">
            <select style="width:100%; height:30px; text-align-last:center" name="tahun" required>
                <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>
        </td>
        <td>
        <input type="submit" name="recap_tahunan" value="Recap Tahunan">
        </form>
        </td>
        </tr>
        </table>
      
        <div class="wrapper">
        <table width="100%"><tr>
        <td>
        <form action="../mdl_admin"><button style="background-color:black">MDL Log</button></form>
        </td>
        <td>
        <form action="view/v_glory_history.php"><button style="background-color:black">Glory Log</button></form>
        </td>
        <td>
        <form action="view/v_portofolio.php"><button style="background-color:black">Portofolio</button></form>
        </td>
        <td>
        <form action="view/v_robot_wa.php"><button style="background-color:black">Robot Notif</button></form>
        </td>
        </tr>
        </table>
        </div>   
</body>
</html>