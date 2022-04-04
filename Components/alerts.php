<style>
	#divMsg{
		z-index: 1000000;
		position:fixed;
		top : 0;
		left: 50%;
		transform: translateX(-50%);
		padding:20px;
		width:400px;
		margin: 10px 0 0 ;
		display:none;
	}
</style>

<div id="divMsg" class="card shadow-lg">
	<legend style="font-size:18; font-weight:500; color:white"></legend>
	<hr style="margin: 0 0 5px 0"/>
	<label style="color:white"></label>
</div>

<script>
	function msgPopUp(title, content, type){
		let $mdl = $("#divMsg");
		$mdl.find("legend").html(title);
		$mdl.find("label").html(content);
		if(type == "info")
			$mdl.css("background","#5bc0de");
		else if(type == "success")
			$mdl.css("background","#5cb85c");
		else if(type == "warning")
			$mdl.css("background","#f0ad4e");
		else if(type == "primary")
			$mdl.css("background","#0275d8");
		else if(type == "danger")
			$mdl.css("background","#d9534f");
		else{
			$("#divMsg legend, #divMsg label").css("color", "black");
		}
		$mdl.slideDown(400);
		setTimeout(() => {
			$mdl.slideUp(200);
		}, 2500);
	}
</script>