<?php
require_once('config.php');
?>

<?php

  if(isset($_POST['feedback'])){

    $feedback   =  $_POST['feedback'];
    $id      	=  $_POST['id'];



    $sql      	= "UPDATE storders SET feedback = '$feedback' where id = '$id'";

    $stmtinsert = $db->prepare($sql);
    $res      	= $stmtinsert->execute([$id, $feedback]);

    if($res){

      echo 'Succesfull';

    }else{

      echo 'Sumtin Wong';

    }

  }

?>