<?php
	include 'dependency.php';
	if (!isset($_SESSION)) {
		session_start();
		if(!isset($_SESSION["UserID"])){
			header("Location:index.php");
		}
	}
	else{
		header("Location:index.php");
	}
	
?>


<div id="sideNavBody" >
	<img src="Resources/Images/FiestaHomesLogo.png" style="width:80%; display:block; margin:10px auto 10px auto"  />
	<h6 style="color:white; text-align:center">Fiesta Homes Management System</h6>
	<hr style="margin: 20; border-color:white"/>

	<div>
		<ul class="navigationV" style="background:transparent; ">
			<li>
				<a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a>
			</li>
			
			<li>
				<a href="residents.php"> <i class="fas fa-users"></i> Residents</a>
			</li>
			<li>
				<a href="visitors.php"> <i class="fas fa-users"></i> Visitors</a>
			</li>
			<li>
				<a href="households.php"> <i class="fas fa-house-user"></i> Households</a>
			</li>
			<li>
				<a href="reports.php"> <i class="fas fa-flag"></i> Reports</a>
			</li>
			<li>
				<a href="announcements.php"> <i class="fas fa-comments"></i> Announcements</a>
			</li>
			<li>
				<a href="gatelogs.php"> <i class="fas fa-list"></i> Gate Logs</a>
			</li>
			<li>
				<a href="users.php"> <i class="fas fa-users-cog"></i> User Accounts</a>
			</li>
			<li>
				<a href="maintenance.php"> <i class="fas fa-tools"></i> Maintenance</a>
			</li>
		</ul>
	</div>

	<div style="position:relative; bottom:0; height:150; width:250">
		<div style="display:block; width:100%; text-align:center; padding: 27 0; font-weight:bold; color:white">
			<!-- <label><?php echo($_SESSION["UserName"]) ?></label>
			<br/>
			<label><?php echo($_SESSION["UserCompleteName"]) ?></label> -->
		</div>
		<div style="display:block; width:100%; text-align:center;  font-weight:400;">
			<button id="btnLogout" class="btn btn-link" style="margin:auto; font-size:30">Logout</a>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$("#btnLogout").click( function(){
			let url = "API/Users/Logout.php";
			$.get(url, function(res){
				window.location.href = "index.php";
			}, 'json');
		});
	});
</script>