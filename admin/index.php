<?php
include 'menu.php';
?>


<link rel="icon" href="logo.ico">
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport' />
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    function bukaData(id, load) {
        $(id).load(load);
    }
</script>


<body>
    <div class="mt-1 konten w-100">
        <table style="border-radius:1mm;background-color:#FEF9E7" align=center width=100%>
            <tr>
                <td class="w-33" align=center><button onclick="bukaData('#invest','view/v_investor.php');">Investor</button><br>
                    <a href="investor">
                        <font color=red>
                            <div id="invest">...</div>
                        </font>
                    </a>
                </td>
                <td class="w-33" align=center><button onclick="bukaData('#cicilan','view/v_cicilan.php');">Cil. Kerabat</button><br>
                    <a href="cicilan">
                        <font color=green>
                            <div id="cicilan">...</div>
                        </font>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</body>