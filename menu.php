<?php]

require_once('config.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>admin dashboard</title>
	<link rel = "stylesheet" type = "text/css" href = "addashboard.css">
  <link rel = "stylesheet" type = "text/css" href = "menu.css">
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
        <div class="header">Add Menu</div>  
        <div class="info">
          

<!--- content --->
<center>


        <form action="menu.php" method="post">
          
              <label for="name">Menu Name:</label>
              <br>
              <input type="text" id="name" name="name" required><br><br>

              
              <label for="category">Category:</label>
              <br>
              <select id="category" required="">
                  <option value="Breakfast">Breakfast</option>
                  <option value="Lunch">Lunch</option>
                  <option value="Snack">Snack</option>
                  <option value="Drinks">Drinks</option>
            </select>

              <br><br>
              <label for="price">Price:</label>
              <br>
              <input type="text" id="price" name="price" required><br><br>

              <input type="submit" value="Add Menu" id="register">
         
        </form>

</center>

      </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
  $(function(){
    $('#register').click(function(e){

      var valid = this.form.checkValidity();

      if(valid){


      var name  = $('#name').val();
      var category  = $('#category').val();
      var price  = $('#price').val();
      

        e.preventDefault(); 

        $.ajax({
          type: 'POST',
          url: 'addmenu.php',
          data: {name: name, category: category, price: price},
          success: function(data){
          Swal.fire({
                'title': 'Successful',
                'text': data,
                'type': 'success'
                })
              
          },
          error: function(data){
            Swal.fire({
                'title': 'Errors',
                'text': 'There were errors while saving the data.',
                'type': 'error'
                })
          }
        });

        
      }else{
        
      }

      



    });   

    
  });
  
</script>

</body>
</html>