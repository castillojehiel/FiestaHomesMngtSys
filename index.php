<?php
    require 'dependency.php';
?>

<style>
#mainCard{
	width:500px;
	height: auto;
	top:2vh;
	margin: auto;
	background : rgba(255,255,255,0.7);
	display:block;
	padding:20px;
	text-align:center;
}
</style>

<body style="background:url('Resources/Images/bg1.jpg'); background-size:cover">
	<div class="card" id="mainCard" >
		<img src="Resources/Images/FiestaHomesLogo.png" style="width:50%; margin:0 auto; display:block"/>
		<h2>Web and Mobile based <br>Fiesta Homes Management System</h2>
		<hr>
		<form id="frmLogin" style="width:80%; margin:auto" >
			<div class="mb-3">
				<label for="" style="float:left">Username:</label>
				<input type="text" class="form-control" name="txtUsername" required value="" >
			</div>
			<div class="mb-3">
				<label for="" style="float:left">Password:</label>
				<input type="password" class="form-control" name="txtPassword" required value="" >
			</div>
            <div class="mb-3">
                <button class="btn btn-secondary">
                    <span class="fas fa-login"></span>
                    Login
                </button>
			</div>
			
		</form>
		
		
	</div>
</body>

<script defer="true">
	$(document).ready( function(){
		$("#frmLogin").submit( function(event){
			event.preventDefault();
			let url = "API/Users/UserLogin.php";
			let data = $(this).serialize();
			$.post(url, data, function(res){
				if(res != undefined){
					if(res.UserID > 0){
						window.location.href = "dashboard.php";
					}
					else 
						msgPopUp("Login Failed.", "Failed to login account. Please recheck credentials and try again", "warning");
				}
				else 
					msgPopUp("Login Failed.", "Failed to login account. Please recheck credentials and try again", "warning");
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});	
	})
</script>
