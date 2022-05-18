<!DOCTYPE html>
<?php 
    include 'sidenav.php';
?>

<style>
	@media print {
		@page {
			margin: 0; 
		}
	}
</style>

<div class="mainContent" >

    <h2 class="page-title"><span class="fas fa-users"> </span> Residents</h2>
    <hr/>

    <div class="row">
        <form id="frmSearch" class="col">
			<div class="form-group row">
				<div class="col-lg-1">
					<label>Search:</label>
				</div>
				<div class="col-lg-6">
					<input type="text" name="txtSearch" class="form-control" placeholder="Name" />
				</div>
				<div class="col-lg-2">
					<button type="submit" class="btn btn-primary">
						<span class="fas fa-search" ></span>
						Search
					</button>
				</div>
				
				<div class="col-lg-2 offset-lg-1">
					<button id="btnNew" type="button" class="btn btn-success" style="float:right">
						<span class="fas fa-plus" ></span>
						New
					</button>
				</div>
			</div>
		</form>
    </div>
    <div class="row">
        <table id="tblList" class="table table-condensed table-striped table-bordered">
			<thead class="thead-dark">
				<th width="150px">Action</th>
				<th>HouseHold</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Birthdate</th>
				<th>Contact No</th>
				<th>Address</th>
				<th>Status</th>
				<th>Created By</th>
				<th>Created Date Time</th>
				<th>Created By Position</th>
				<th>Updated By</th>
				<th>Updated Date Time</th>
				<th>Updated By Position</th>
			</thead>
			<tbody>
				<!-- <tr>
					<td>
						<button class="btn btn-primary">
							<span class="fas fa-eye" ></span>
							 View
						</button>
						<button class="btn btn-warning">
							<span class="fas fa-edit" ></span>
							 Edit
						</button>
					</td>
					<td>HouseHold</td>
					<td>Resident Name</td>
					<td>Male</td>
					<td>11-23-1998</td>
					<td>09123123</td>
					<td>Dev</td>
					<td>11-23-1998</td>
					<td></td>
					<td></td>
				</tr> -->
			</tbody>
		</table>
    </div>
	<div class="row">
        <div class="m-3">
            <label>Result Count : </label>
            <label id="lblResultCount"> 0</label>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="mdlNewResident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Create New Resident</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmNewResident">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Photo:</label>
							</div>
							<div class="col-lg-10">
								<div class="row">
									<div class="col-lg-6">
										<input id="newResidentPhoto" type="file" name="txtResidentPhoto" class="form-control"  />
									</div>
									<div class="col-lg-6">
									<img id="newResidentImg" class="img-thumbnail" style="width:150px; height:150xpx"/>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>First Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtFirstName" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Middle Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtMiddleName" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Last Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtLastName" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Suffix:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtSuffix" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Birthdate:</label>
							</div>
							<div class="col-lg-10">
								<input type="date" name="txtBirthdate" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Gender:</label>
							</div>
							<div class="col-lg-10">
								<div style ="display:inline-block">
									<input type="radio" name="txtGender" value="Male" checked />
									<label>Male</label>
									<input type="radio" name="txtGender" value="Female" />
									<label>Female</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Contact No:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtContactNo" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Email Address:</label>
							</div>
							<div class="col-lg-10">
								<input type="email" name="txtEmailAddress" class="form-control" />
							</div>
						</div>
					</div>
					<input type="hidden" name="txtPhoto" />
					<input type="hidden" name="txtPhotoExt" />
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmNewResident" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
  </div>
</div>

<div class="modal fade" id="mdlEditResident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Update Resident</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmEditResident">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Photo:</label>
							</div>
							<div class="col-lg-10">
								<div class="row">
									<div class="col-lg-6">
										<input id="editResidentPhoto" type="file" name="txtResidentPhoto" class="form-control"  />
									</div>
									<div class="col-lg-6">
									<img id="editResidentImg" class="img-thumbnail" style="width:150px; height:150xpx"/>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>First Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtFirstName" class="form-control" required />
								<input type="hidden" name="txtID" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Middle Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtMiddleName" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Last Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtLastName" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Suffix:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtSuffix" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Birthdate:</label>
							</div>
							<div class="col-lg-10">
								<input type="date" name="txtBirthdate" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Gender:</label>
							</div>
							<div class="col-lg-10">
								<div style ="display:inline-block">
									<input type="radio" name="txtGender" value="Male" checked />
									<label>Male</label>
									<input type="radio" name="txtGender" value="Female" />
									<label>Female</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Contact No:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtContactNo" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Email Address:</label>
							</div>
							<div class="col-lg-10">
								<input type="email" name="txtEmailAddress" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-10 offset-2">
								<input type="checkbox" name="chkIsActive" />
								<label>is Active</label>
							</div>
						</div>
					</div>
					<input type="hidden" name="txtPhoto" />
					<input type="hidden" name="txtPhotoExt" />
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmEditResident" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
  </div>
</div>

  <div class="modal fade" id="mdlViewResident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">View Resident</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmViewResident">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-3">
								<img id="viewResidentImg" class="img-thumbnail" style="width:150px; height:150xpx"/>
							</div>
							<div class="col-lg-3">
								<div id="QRCodeParent">
									<div id="cvsQrCode">
	
									</div>
									<h6 id="lblQRCodeValue"></h6>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="row">
									<button id="btnPrintQRCode" type="button" class="btn btn-primary">
										<span class="fas fa-print"></span>
										Print QR Code
									</button>
									<button id="btnDownloadQRCode" type="button" class="btn btn-warning">
										<span class="fas fa-download"></span>
										Download QR Code
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>First Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtFirstName" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Middle Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtMiddleName" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Last Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtLastName" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Suffix:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtSuffix" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Birthdate:</label>
							</div>
							<div class="col-lg-10">
								<input type="date" name="txtBirthdate" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Gender:</label>
							</div>
							<div class="col-lg-10">
								<div style ="display:inline-block">
									<input type="radio" name="txtGender" value="Male" readonly />
									<label>Male</label>
									<input type="radio" name="txtGender" value="Female" readonly />
									<label>Female</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Contact No:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtContactNo" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Email Address:</label>
							</div>
							<div class="col-lg-10">
								<input type="email" name="txtEmailAddress" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-10 offset-2">
								<input type="checkbox" name="chkIsActive" readonly />
								<label>is Active</label>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
  </div>

  <div class="modal fade" id="mdlViewResidentGateLogs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">View Resident Gatelogs</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<h5 id="lblResidentName">Resident : <strong><u><span></span></u></strong></h5>
				</div>
				<div class="row">
					<form id="frmSearchResidentGateLogs">
						<input type="hidden" name="ID"/>
						<div class="row">
							<div class="col-lg-2">
								<div class="form-group">
									<label>Date Range:</label>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="date" name="txtDateFrom" class="form-control" value="<?php echo date('Y-m-d',strtotime(date("Y/m/d", strtotime('-7 days')))) ?>" />
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="date" name="txtDateTo" class="form-control" value="<?php echo date('Y-m-d',strtotime(date("Y/m/d"))) ?>" />
								</div>
							</div>
							<div class="col-lg-2">
								<div class="form-group">
									<button type="submit" class="btn btn-primary">
										<span class="fas fa-search"></span>
										Search
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="row">
					<table id="tblResidentGateLogs" class="table table-condensed table-striped table-bordered">
						<thead class="thead-dark">
							<th>Date</th>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-light" id="btnPrintVisitorLogs">
					<span class="fas fa-print"></span>
					Print 
				</button>
			</div>
		</div>
	</div>
  </div>
<!-- End of Modals -->

<script defer="true">
    $(document).ready( function(){
		setTimeout( function(){
			$("#frmSearch").trigger('submit');
		}, 500);

		//-----------------------------

		$("#frmEditResident input[name=txtResidentPhoto]").change(function(event){
			var files = document.getElementById('editResidentPhoto').files;
			if (files.length > 0) {
				console.log(files[0]);
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function () {
					let base64 = reader.result;
					document.getElementById("editResidentImg").setAttribute("src", base64);
					$("#frmEditResident input[name=txtPhoto]").val(base64);
					$("#frmEditResident input[name=txtPhotoExt]").val(files[0].type.replace("image/","."));
					
				};
				reader.onerror = function (error) {
					console.log('Error: ', error);
				};
			}
		});

		$("#frmNewResident input[name=txtResidentPhoto]").change(function(event){
			var files = document.getElementById('newResidentPhoto').files;
			if (files.length > 0) {
				console.log(files[0]);
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onload = function () {
					let base64 = reader.result;
					document.getElementById("newResidentImg").setAttribute("src", base64);
					$("#frmNewResident input[name=txtPhoto]").val(base64);
					$("#frmNewResident input[name=txtPhotoExt]").val(files[0].type.replace("image/","."));
					
				};
				reader.onerror = function (error) {
					console.log('Error: ', error);
				};
			}
		});

		$("#btnPrintVisitorLogs").click( function(){
			$("#mdlViewResidentGateLogs .modal-body").printThis({
				importCSS : false,
				importStyle : true,
				canvas : true
			});
		});

		$("#frmSearchResidentGateLogs").submit(function(event){
			event.preventDefault();
			let url = "API/Residents/GetDataCenterGateLogs.php";
			let data = $(this).serialize();
			$.post(url, data, function(res){
				let $tbl = $("#mdlViewResidentGateLogs #tblResidentGateLogs tbody");
				$.each(res, function(indx, value){
					$tbl.append(`
									<tr>
										<td>`+ value.CreatedDateTime +`</td>
									</tr>
								`);
				})
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#tblList").on('click', '.btnViewGateLogs', function(){
			let ID = $(this).parent().parent().prop("id");
			let $tbl = $("#mdlViewResidentGateLogs #tblResidentGateLogs tbody");
			$tbl.html("");
			$("#mdlViewResidentGateLogs input[name=ID]").val(ID);
			$("#mdlViewResidentGateLogs").modal("show");
		});

		$("#btnDownloadQRCode").click( function(){
			ReImg.fromCanvas(document.getElementById('cvsQR')).downloadPng();
		});

		$("#btnPrintQRCode").click( function(){
			$("#QRCodeParent").printThis({
				importCSS : false,
				importStyle : true,
				canvas : true
			});
		});

		$("#tblList").on('click', '.btnView', function(){
			let ID = $(this).parent().parent().prop("id");
			let url = "API/Residents/GetDataCenterByID.php?DataCenterID=" + ID;
			$.get(url, function(res){
				if(res != null || res != undefined){
					let $frm = $("#frmViewResident");
					$frm.find("input[name=chkIsActive]").attr('checked', (res.isActive == 1? true : false));
					$frm.find("input[name=txtFirstName]").val(res.FirstName);
					$frm.find("input[name=txtMiddleName]").val(res.MiddleName);
					$frm.find("input[name=txtLastName]").val(res.LastName);
					$frm.find("input[name=txtSuffix]").val(res.Suffix);
					$frm.find("input[name=txtBirthdate]").val(res.BirthDate);
					$frm.find("input[name=txtContactNo]").val(res.ContactNo);
					$frm.find("input[name=txtEmailAddress]").val(res.EmailAddress);
					$frm.find("input[name=txtGender]").filter('[value='+res.Gender+']').prop('checked', true);

					document.getElementById("viewResidentImg").setAttribute("src", res.DataCenterPhoto);

					$("#cvsQrCode").html("");
					$("#cvsQrCode").qrcode({
						text : res.QRCode,
						width : 150,
						height : 150
					});
					$("#lblQRCodeValue").html(res.QRCode);
					$("#mdlViewResident").modal('show');
					$("#cvsQrCode").find("canvas").attr("id", "cvsQR");
				}
				else{
					msgPopUp("Record not found", "Requested record could not be found in the database.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});


		$("#frmEditResident").submit( function(event){
			event.preventDefault();
			let frmData = $(this).serialize();
			let url = "API/Residents/UpdateResidentDetails.php";
			$.post(url, frmData, function(res){
				if(res.result){
					msgPopUp("Saved!",  "Resident record has been successfully saved.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save resident record.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		})

		$("#tblList").on('click', '.btnEdit', function(){
			let ID = $(this).parent().parent().prop("id");
			let url = "API/Residents/GetDataCenterByID.php?DataCenterID=" + ID;
			$.get(url, function(res){
				if(res != null || res != undefined){
					let $frm = $("#frmEditResident");
					$frm.find("input[name=txtID]").val(ID);
					$frm.find("input[name=chkIsActive]").attr('checked', (res.isActive == 1? true : false));
					$frm.find("input[name=txtFirstName]").val(res.FirstName);
					$frm.find("input[name=txtMiddleName]").val(res.MiddleName);
					$frm.find("input[name=txtLastName]").val(res.LastName);
					$frm.find("input[name=txtSuffix]").val(res.Suffix);
					$frm.find("input[name=txtBirthdate]").val(res.BirthDate);
					$frm.find("input[name=txtContactNo]").val(res.ContactNo);
					$frm.find("input[name=txtEmailAddress]").val(res.EmailAddress);
					$frm.find("input[name=txtPhoto]").val(res.DataCenterPhoto);
					$frm.find("input[name=txtPhotoExt]").val(res.PhotoExt);
					$frm.find("input[name=txtGender]").filter('[value='+res.Gender+']').prop('checked', true);

					document.getElementById("editResidentImg").setAttribute("src", res.DataCenterPhoto);

					$("#mdlEditResident").modal('show');
				}
				else{
					msgPopUp("Record not found", "Requested record could not be found in the database.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#frmNewResident").submit( function(event){
			event.preventDefault();
			let frmData = $(this).serialize();
			let url = "API/Residents/CreateNewResident.php";
			$.post(url, frmData, function(res){
				if(res.result){
					msgPopUp("Saved!",  "New resident record has been successfully saved.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save new resident record.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#btnNew").click( function(){
			$("#frmNewResident").trigger('reset');
			document.getElementById('newResidentImg').removeAttribute('src');
			$("#mdlNewResident").modal('show');
		})

		$("#frmSearch").submit( function(event){
			event.preventDefault();
			let frm = $(this).serialize();
			let url = "API/Residents/SearchResidents.php";
			$.post(url, frm, function(res){
				let $tbl = $("#tblList tbody");
				$tbl.html("");
				$("#lblResultCount").html(res.length);
				
				$.each(res, function(index, value){
					$tbl.append(
						`
						<tr id="`+ value.DataCenterID +`">
							<td>
								<button class="btn btn-primary btnView">
									<span class="fas fa-eye" ></span>
									View
								</button>
								<button class="btn btn-warning btnEdit">
									<span class="fas fa-edit" ></span>
									Edit
								</button>
								<button class="btn btn-secondary btnViewGateLogs">
									<span class="fas fa-list" ></span>
									View Gate Logs
								</button>
							</td>
							<td>`+ (value.HouseHold == undefined ? '' : value.HouseHold) +`</td>
							<td>`+ value.ResidentName +`</td>
							<td>`+ value.Gender +`</td>
							<td>`+ value.BirthDate+`</td>
							<td>`+ value.ContactNo +`</td>
							<td>`+ (value.Street ?? '') + ' ' + (value.BlockNo ?? '') + ' ' + (value.HouseNo ?? '') +`</td>
							<td>`+ value.RecordStatus +`</td>
							<td>` + value.CreatedBy + `</td>
							<td>` + value.CreatedDateTime + `</td>
							<td>` + value.CreatedByPosition + `</td>
							<td>` + (value.UpdatedBy == undefined ? '' : value.UpdatedBy) + `</td>
							<td>` + (value.UpdatedDateTime == undefined ? '' : value.UpdatedDateTime) + `</td>
							<td>` + (value.UpdatedByPosition == undefined ? '' : value.UpdatedByPosition) + `</td>
						</tr>
						`
					);
				});
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});


		function getBase64(file) {
			var reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onload = function () {
				console.log(reader.result);
				return reader.result;
			};
			reader.onerror = function (error) {
				console.log('Error: ', error);
			};
		}

	});
</script>

</html>