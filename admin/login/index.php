<!DOCTYPE html>
<html>
<head>
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
    <title>Glory Group</title>
    <link rel="stylesheet" href="../../css/style.css?v=3.1" media="screen">
    <link rel="stylesheet" href="../../css/base_style.css?v=3.1" media="screen">
</head>
<body>
    <div class="wrapper">
        <h2>MDL LOGIN</h2>
        <hr>
        <form action="proses_login.php" method="POST">
            <div>
                <label for="input_password">PIN</label>
                <input type="password" name="pass" required="required" autocomplete="off">
            </div>
            <div>
                <button style="width:100px;" class="submit" type="submit" name="login">Login</button>
            </div>
            <div>
                <?php if(isset($_GET['msg'])){
                   echo $_GET['msg'] ;
                }?>
            </div>
        </form>
    </div>
</body>
</html>