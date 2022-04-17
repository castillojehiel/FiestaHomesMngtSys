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

    <h2 class="page-title"><span class="fas fa-users-cog"> </span> Users</h2>
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
                <th>UserName</th>
				<th>Name</th>
				<th>Position</th>
				<th>Gender</th>
				<th>Birthdate</th>
				<th>Contact No</th>
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

<div class="modal fade" id="mdlSearchResident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Search Resident</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
            <div class="row">
                <form id="frmSearchResident" class="col">
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label>Search:</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" name="txtSearch" class="form-control" placeholder="Name" />
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary">
                                <span class="fas fa-search" ></span>
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <table id="tblResidentSearch" class="table table-condensed table-striped table-bordered">
                    <thead class="thead-dark">
                        <th width="150px">Action</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Contact No</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="m-3">
                    <label>Result Count : </label>
                    <label id="lblSearchResResultCount"> 0</label>
                </div>
            </div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="button" id="btnContinueNonResident" class="btn btn-primary">Continue with Non Resident</button>
			</div>
		</div>
	</div>
  </div>
</div>

<div class="modal fade" id="mdlNewUserAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Create New User Account</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmNewUserAccount">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>First Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtFirstName" class="form-control" />
								<input type="hidden" name="txtDCID" class="form-control" />
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
							<div class="col-lg-2">
								<label>UserName:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtUsername" class="form-control" />
							</div>
						</div>
					</div>
                    <div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Password:</label>
							</div>
							<div class="col-lg-10">
								<input type="password" name="txtUserPassword" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Position:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtPosition" class="form-control" />
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmNewUserAccount" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
  </div>
</div>

<div class="modal fade" id="mdlEditUserAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Update User Account</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmEditUserAccount">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>First Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtFirstName" class="form-control" />
								<input type="hidden" name="txtID" class="form-control" />
								<input type="hidden" name="txtDCID" class="form-control" />
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
                    <div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>UserName:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtUsername" class="form-control" />
							</div>
						</div>
					</div>
                    <div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Password:</label>
							</div>
							<div class="col-lg-10">
								<input type="password" name="txtUserPassword" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Position:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtPosition" class="form-control" />
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmEditUserAccount" class="btn btn-primary">Save changes</button>
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
								<div id="QRCodeParent">
									<div id="cvsQrCode">
	
									</div>
									<h6 id="lblQRCodeValue"></h6>
								</div>
							</div>
							<div class="col-lg-9">
								<button id="btnPrintQRCode" type="button" class="btn btn-primary">
									<span class="fas fa-print"></span>
									Print QR Code
								</button>
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
        let ResidentList = [];
        let DataCenterObj = {};

        //-----------------

		setTimeout( function(){
			$("#frmSearch").trigger('submit');
		}, 500);

		//-----------------------------

        $("#tblResidentSearch").on('click', '.btnSelectResident', function(){
            let ID = $(this).parent().parent().prop("id");
			console.log(ID);
			console.log(ResidentList);
            DataCenterObj = ResidentList.filter(x => x.DataCenterID == ID)[0];
            console.log(DataCenterObj);

            $(".modal").modal('hide');
            let $frm = $("#frmNewUserAccount");
            $frm.trigger("reset");
			console.log(DataCenterObj);
            $frm.find("input[name=txtDCID]").val(ID);
			$frm.find("input[name=chkIsActive]").prop('checked', DataCenterObj.isActive);
			$frm.find("input[name=txtFirstName]").val(DataCenterObj.FirstName);
			$frm.find("input[name=txtMiddleName]").val(DataCenterObj.MiddleName);
			$frm.find("input[name=txtLastName]").val(DataCenterObj.LastName);
			$frm.find("input[name=txtSuffix]").val(DataCenterObj.Suffix);
			$frm.find("input[name=txtBirthdate]").val(DataCenterObj.BirthDate);
			$frm.find("input[name=txtContactNo]").val(DataCenterObj.ContactNo);
			$frm.find("input[name=txtEmailAddress]").val(DataCenterObj.EmailAddress);
            $frm.find("input[name=txtGender]input[value="+DataCenterObj.Gender+"]").prop('checked', true);
            $("#mdlNewUserAccount").modal("show");
        });

        $("#btnContinueNonResident").click( function(){
            $(".modal").modal('hide');
            $("#frmNewUserAccount").trigger("reset");
            $("#mdlNewUserAccount").modal("show");
        }) ;

        $("#frmSearchResident").submit( function(event){
            event.preventDefault(); 
            let url = "API/Users/SearchResidentsWithNoAccounts.php";
            let data = $(this).serializeArray();
            data.push({name : 'isShowAll', value: false});
            $.post(url, data, function(res){
                let $tbl = $("#tblResidentSearch tbody");
                $tbl.html('');
                ResidentList = res;
                $.each(res, function(indx, value){
                    $tbl.append(`
                                <tr id="`+ value.DataCenterID +`">
                                    <td>
                                        <button class="btn btn-primary btnSelectResident">
                                            <span class="fas fa-check"></span>
                                            Select
                                        </button>
                                        <td>`+ value.ResidentName +`</td>
                                        <td>`+ value.Gender +`</td>
                                        <td>`+ value.BirthDate+`</td>
                                        <td>`+ value.ContactNo +`</td>
                                    </td>  
                                </tr>
                            `);
                });
                $("#lblSearchResResultCount").html(res.length);
            }, 'json')
            .fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
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
					$frm.find("input[name=chkIsActive]").prop('checked', res.isActive);
					$frm.find("input[name=txtFirstName]").val(res.FirstName);
					$frm.find("input[name=txtMiddleName]").val(res.MiddleName);
					$frm.find("input[name=txtLastName]").val(res.LastName);
					$frm.find("input[name=txtSuffix]").val(res.Suffix);
					$frm.find("input[name=txtBirthdate]").val(res.BirthDate);
					$frm.find("input[name=txtContactNo]").val(res.ContactNo);
					$frm.find("input[name=txtEmailAddress]").val(res.EmailAddress);
					$frm.find("input[name=txtGender]input[value="+res.Gender+"]").prop('checked', true);
					$("#cvsQrCode").qrcode({
						text : res.QRCode,
						width : 150,
						height : 150
					});
					$("#lblQRCodeValue").html(res.QRCode);
					$("#mdlViewResident").modal('show');
				}
				else{
					msgPopUp("Record not found", "Requested record could not be found in the database.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});


		$("#frmEditUserAccount").submit( function(event){
			event.preventDefault();
			let frmData = $(this).serialize();
			let url = "API/Users/UpdateUserDetails.php";
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
			let url = "API/Users/GetUserByID.php?ID=" + ID;
			$.get(url, function(res){
				if(res != null || res != undefined){
					let $frm = $("#frmEditUserAccount");
					$frm.find("input[name=txtID]").val(ID);
					$frm.find("input[name=txtDCID]").val(res.DataCenterID);
					$frm.find("input[name=chkIsActive]").prop('checked', res.isActive);
					$frm.find("input[name=txtFirstName]").val(res.FirstName);
					$frm.find("input[name=txtMiddleName]").val(res.MiddleName);
					$frm.find("input[name=txtLastName]").val(res.LastName);
					$frm.find("input[name=txtSuffix]").val(res.Suffix);
					$frm.find("input[name=txtBirthdate]").val(res.BirthDate);
					$frm.find("input[name=txtContactNo]").val(res.ContactNo);
					$frm.find("input[name=txtEmailAddress]").val(res.EmailAddress);
					$frm.find("input[name=txtUsername]").val(res.Username);
					$frm.find("input[name=txtUserPassword]").val(res.Userpass);
					$frm.find("input[name=txtPosition]").val(res.UserPosition);
					$frm.find("input[name=txtGender]").filter('[value='+res.Gender+']').prop('checked', true);

					$("#mdlEditUserAccount").modal('show');
				}
				else{
					msgPopUp("Record not found", "Requested record could not be found in the database.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#frmNewUserAccount").submit( function(event){
			event.preventDefault();
			let frmData = $(this).serialize();
			let url = "API/Users/CreateNewUser.php";
			$.post(url, frmData, function(res){
				if(res.result){
					msgPopUp("Saved!",  "New user account record has been successfully saved.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save new user account record.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#btnNew").click( function(){
			$("#frmNewUserAccount").trigger('reset');
			$("#frmSearchResident").trigger('reset');
			$("#mdlSearchResident").modal('show');
		})

		$("#frmSearch").submit( function(event){
			event.preventDefault();
			let frm = $(this).serialize();
			let url = "API/Users/SearchUserAccounts.php";
			$.post(url, frm, function(res){
				let $tbl = $("#tblList tbody");
				$tbl.html("");
				$("#lblResultCount").html(res.length);
				
				$.each(res, function(index, value){
					$tbl.append(
						`
						<tr id="`+ value.UserID +`">
							<td>
								
								<button class="btn btn-warning btnEdit">
									<span class="fas fa-edit" ></span>
									Edit
								</button>
							</td>
							<td>`+ value.Username +`</td>
							<td>`+ value.UserCompleteName +`</td>
							<td>`+ value.UserPosition +`</td>
							<td>`+ value.Gender +`</td>
							<td>`+ value.BirthDate+`</td>
							<td>`+ value.ContactNo +`</td>
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

					// <button class="btn btn-primary btnView">
					// 				<span class="fas fa-eye" ></span>
					// 				View
					// 			</button>
				});
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

	});
</script>

</html>