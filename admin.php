<?php

session_start();

?>

<!DOCTYPE html>
<html>  
<head>
    <title>Admin Site</title>  
     
    <link rel = "stylesheet" type = "text/css" href = "login.css">   
</head> 

<body> 

<form class="box" name="f1" action="loginadpros.php" method="post">

    <h2>ADMIN ONLY</h2>
    <a href="index.php"><img src = "img/admin.png" width="100px"></a>


    <input type="text" id="text" name ="adminid" placeholder="Admin ID" required>

    <input type="password" id="text" name="pass" placeholder="Password" required>

    <input type="submit" name="login" value="LOGIN">

</form>


</body>     
</html> 