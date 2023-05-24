<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Sign Up</title>
	<link rel="stylesheet" type="text/css" href="daftar1.css">
</head>
<body>

<div>
	<form action="daftar_pekerja.php" method="post" class="box">
		<center>
		<a href="index.php"><img src = "img/Mykvteria.png" width="200px"></a>
    <h2>Daftar Maklumat Pekerja</h2>
    	</center>

    	<br>
    	<center>
		
				
					<div class ="select-style">
					<select id="prof" name ="prof" required>
               			<option id ="prof" selected disabled>Profession</option>
                		<option value ="lect">Lecturer</option>
                		<option value ="cl">Cleaner</option>
                		<option value ="gd">Guard</option>
                		<option value ="ow">Office Worker</option>
            		</select>
            	</div>
            	<br>
            	<br>

            	<div class="input-field">
					<input class="form-control" id="staffid" type="text" name="staffid" required>
					<label for="staffid"><b>Staff ID</b></label>
					
					</div>


           		<br>
           		<br>

           			<div class="input-field">
					<input class="form-control" id="username"  type="text" name="username" required>
					<label for="username"><b>Username</b></label>
				</div>
				<br>
				<br>
					<div class="input-field">
					<input class="form-control" id="password"  type="password" name="password" required>
					<label for="password"><b>Password</b></label>
				</div>
	
					<br>
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Daftar">
				</center>
			</form>

				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){

			var prof		= $('#prof').val();
			var staffid 	= $('#staffid').val();
			var username 	= $('#username').val();
			var password 	= $('#password').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'dpk_process.php',
					data: {prof: prof, staffid: staffid,username: username,password: password},
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