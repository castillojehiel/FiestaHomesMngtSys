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

    <h2 class="page-title"><span class="fas fa-users"> </span> Visitors</h2>
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
				<th>Name</th>
				<th>Gender</th>
				<th>Birthdate</th>
				<th>Contact No</th>
				<th>Status</th>
				<th>Created By</th>
				<th>Created Date Time</th>
				<th>Updated By</th>
				<th>Updated Date Time</th>
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
					<td>Visitor Name</td>
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
<div class="modal fade" id="mdlNewVisitor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Create New Visitor</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmNewVisitor">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>First Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtFirstName" class="form-control" />
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
								<input type="text" name="txtLastName" class="form-control" />
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
								<input type="date" name="txtBirthdate" class="form-control" />
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
									<input type="radio" name="txtGender" value="Male" />
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
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmNewVisitor" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
  </div>

<div class="modal fade" id="mdlEditVisitor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Update Visitor</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmEditVisitor">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>First Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtFirstName" class="form-control" />
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
								<input type="text" name="txtLastName" class="form-control" />
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
								<input type="date" name="txtBirthdate" class="form-control" />
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
									<input type="radio" name="txtGender" value="Male" />
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
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmEditVisitor" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
  </div>

  <div class="modal fade" id="mdlViewVisitor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">View Visitor</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmViewVisitor">
					<div class="form-group m-3">
						<div class="row">
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
<!-- End of Modals -->

<script defer="true">
    $(document).ready( function(){
		setTimeout( function(){
			$("#frmSearch").trigger('submit');
		}, 500);

		//-----------------------------

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
					let $frm = $("#frmViewVisitor");
					$frm.find("input[name=chkIsActive]").attr('checked', (res.isActive == 1 ? true : false ));
					$frm.find("input[name=txtFirstName]").val(res.FirstName);
					$frm.find("input[name=txtMiddleName]").val(res.MiddleName);
					$frm.find("input[name=txtLastName]").val(res.LastName);
					$frm.find("input[name=txtSuffix]").val(res.Suffix);
					$frm.find("input[name=txtBirthdate]").val(res.BirthDate);
					$frm.find("input[name=txtContactNo]").val(res.ContactNo);
					$frm.find("input[name=txtEmailAddress]").val(res.EmailAddress);
					$frm.find("input[name=txtGender]").filter('[value='+res.Gender+']').prop('checked', true);
					$("#cvsQrCode").html("");
					$("#cvsQrCode").qrcode({
						text : res.QRCode,
						width : 150,
						height : 150
					});
					$("#lblQRCodeValue").html(res.QRCode);
					$("#mdlViewVisitor").modal('show');
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


		$("#frmEditVisitor").submit( function(event){
			event.preventDefault();
			console.log(event);
			if(event.keyCode == 13)
				return;

			let frmData = $(this).serialize();
			let url = "API/Visitors/UpdateVisitorDetails.php";
			$.post(url, frmData, function(res){
				if(res.result){
					msgPopUp("Saved!",  "Visitor record has been successfully saved.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save Visitor record.", "warning");
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
					let $frm = $("#frmEditVisitor");
					$frm.find("input[name=txtID]").val(ID);
					$frm.find("input[name=chkIsActive]").attr('checked', (res.isActive == 1 ? true : false ));
					$frm.find("input[name=txtFirstName]").val(res.FirstName);
					$frm.find("input[name=txtMiddleName]").val(res.MiddleName);
					$frm.find("input[name=txtLastName]").val(res.LastName);
					$frm.find("input[name=txtSuffix]").val(res.Suffix);
					$frm.find("input[name=txtBirthdate]").val(res.BirthDate);
					$frm.find("input[name=txtContactNo]").val(res.ContactNo);
					$frm.find("input[name=txtEmailAddress]").val(res.EmailAddress);
					if(res.Gender != "")
						$frm.find("input[name=txtGender]").filter('[value='+res.Gender+']').prop('checked', true);

					$("#mdlEditVisitor").modal('show');
				}
				else{
					msgPopUp("Record not found", "Requested record could not be found in the database.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#frmNewVisitor").submit( function(event){
			event.preventDefault();
			let frmData = $(this).serialize();
			let url = "API/Visitors/CreateNewVisitor.php";
			$.post(url, frmData, function(res){
				if(res.result){
					msgPopUp("Saved!",  "New Visitor record has been successfully saved.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save new Visitor record.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#btnNew").click( function(){
			$("#frmNewVisitor").trigger('reset');
			$("#mdlNewVisitor").modal('show');
		})

		$("#frmSearch").submit( function(event){
			event.preventDefault();
			let frm = $(this).serialize();
			let url = "API/Visitors/SearchVisitors.php";
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
							</td>
							<td>`+ value.VisitorName +`</td>
							<td>`+ value.Gender +`</td>
							<td>`+ value.BirthDate+`</td>
							<td>`+ value.ContactNo +`</td>
							<td>`+ value.RecordStatus +`</td>
							<td>` + value.CreatedBy + `</td>
							<td>` + value.CreatedDateTime + `</td>
							<td>` + stringNullFormatter(value.UpdatedBy) + `</td>
							<td>` + (value.UpdatedDateTime == undefined ? '' : value.UpdatedDateTime) + `</td>
						</tr>
						`
					);
				});
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

	});
</script>

</html>