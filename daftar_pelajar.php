<?php

require_once('config.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pelajar</title>
	<link rel="stylesheet" type="text/css" href="daftar1.css">
</head>
<body>

<div>
	<form action = "daftar_pelajar.php" method="post" class="box">
		<center>
		<a href="index.php"><img src = "img/Mykvteria.png" width="200px"></a>
    <h2>Daftar Maklumat Pelajar</h2>
    	</center>

    	<br>
    	<center>
		
				
					<div class="input-field">
					<input class="form-control" id="studid" type="text" name="studid" required>
					<label for="studid"><b>Student ID</b></label>
					
					</div>

					<br>
					<div class ="select-style">
					<select id="year" name ="year" required>
               			<option id ="year" selected disabled>Year</option>
                		<option value ="1svm">1 SVM</option>
                		<option value ="2svm">2 SVM</option>
                		<option value ="1dvm">1 DVM</option>
                		<option value ="2dvm">2 DVM</option>
            		</select>
            	</div>
            	<br>
            	<br>

            	<div class ="select-style">
					<select id="prog" name = "prog" required>
               			<option id ="prog" selected disabled>Programme</option>
                		<option value ="bak" id="course">BAK</option>
                		<option value ="bpp" id="course">BPP</option>
                		<option value ="hbp" id="course">HBP</option>
                		<option value ="hsk" id="course">HSK</option>
                		<option value ="kpd" id="course">KPD</option>
                		<option value ="ksk" id="course">KSK</option>
                		<option value ="mtk" id="course">MTK</option>
                		<option value ="wtp" id="course">WTP</option>
           			</select>
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


			var studid	= $('#studid').val();
			var year	= $('#year').val();
			var prog 	= $('#prog').val();
			var username = $('#username').val();
			var password 	= $('#password').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'dp_process.php',
					data: {studid: studid, year: year, prog: prog, username: username, password: password},
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