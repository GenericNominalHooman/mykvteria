<?php

session_start();

?>

<!DOCTYPE html>
<html>  
<head>
    <title>Employee Login</title>  
     
    <link rel = "stylesheet" type = "text/css" href = "login.css">   
</head> 

<body> 

<form class="box" name="f1" action="logineppros.php" method="post">

    <a href="index.php"><img src = "img/Mykvteria.png" width="200px"></a>
    <h2>EMPLOYEE</h2>


    <input type="text" id="text" name ="username" placeholder="Username" required>

    <input type="password" id="text" name="password" placeholder="Password" required>

    <input type="submit" name="login" value="LOGIN">

    <p>
        Don't have an account?
    <a href="daftar_pekerja.php"> Create One!</a>

    </p>

    <p id="demo"></p>

    <br>

</form>


</body>     
</html> 