<?php 
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin dashboard</title>
	<link rel = "stylesheet" type = "text/css" href = "addashboard.css">
  <link rel = "stylesheet" type = "text/css" href = "menulist.css">
</head>
<body>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

<div class="wrapper">
    <div class="sidebar">
      <center>
        <a href="addashboard.php"><img src = "img/Mykvteria.png" width="150px"></a>
        </center>
        <br>
        <ul>
            <li><a href="addashboard.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="custorders.php"><i class="fas fa-shopping-cart"></i>Orders</a></li>
            <li><a href="menu.php"><i class="fas fa-book"></i>Add Menu</a></li>
            <li><a href="menulist.php"><i class="fas fa-list"></i>Menu List</a></li>
            <li><a href="feedback.php"><i class="fas fa-people-arrows"></i>Feedbacks</a></li>
            <li><a href="adlogout.php"><i class="fas fa-power-off"></i>Log Out</a></li>
        </ul>
    </div>
    <div class="main_content">
        <div class="header">Menu Lists
          
        </div>  
        <div class="info">
          <center>
          <div><h2>TODAY MENU LISTS</h2></div>
        </center>


<!--- tables started--->
          <center>
          <table >
                <tr>
        
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price (RM)</th>
                    <th>Actions</th>
        
                </tr>

                <?php   
                  $i = 1;
                  $sql = "SELECT * FROM menu";
                  $result = $con->query($sql);
                  if($result -> num_rows>0){

                  while($row = $result-> fetch_assoc()){

                  $id = $row['id'];

                  ?>  
                  <tr>

                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name']  ?></td>
                    <td><?php echo $row['category']  ?></td>
                    <td><?php echo $row['price']  ?></td>

                    <td color ='#fff'>
                      <ul>
                      <a href="menuedit.php?id=<?php echo $id; ?>"><i class="fas fa-edit"></i></a>
                      <a href="menudelete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                      </ul>
                    </td>


                  </tr>

                  <?php

                  }
                }

                ?>
            
              </table>
          </center>
      </div>
    </div>
</div>
</body>
</html>