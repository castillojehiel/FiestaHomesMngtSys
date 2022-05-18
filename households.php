<!DOCTYPE html>
<?php 
    include 'sidenav.php';
?>

<div class="mainContent" >

    <h2 class="page-title"><span class="fas fa-house-user"> </span> Households</h2>
    <hr/>

    <div class="row">
        <form id="frmSearch" class="col">
			<div class="form-group row">
				<div class="col-lg-1">
					<label>Search:</label>
				</div>
				<div class="col-lg-6">
					<input type="text" name="txtSearch" class="form-control"  placeholder="Name" />
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
        <table id="tblHouseHold" class="table table-condensed table-striped table-bordered">
			<thead class="thead-dark">
				<th width="150px">Action</th>
				<th>Description</th>
				<th>HouseNo</th>
				<th>No. of Members</th>
				<th>Street</th>
				<th>Block No</th>
				<th>Created By</th>
				<th>Created Date Time</th>
				<th>Created By Position</th>
				<th>Updated By</th>
				<th>Updated Date Time</th>
				<th>Updated By Position</th>
			</thead>
			<tbody>
				
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

<!-- MODALS -->
<div class="modal fade" id="mdlNewHouseHold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Create HouseHold</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmNewHouseHold">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>House No:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtHouseNo" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Street:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtStreet" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Block No:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtBlockNo" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>House Hold Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtHouseHoldName" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-10 offset-2">
								<input type="checkbox" name="txtIsActive" checked="checked" />
								<label> is Active</label>
							</div>
						</div>
					</div>
				</form>
					<hr/>
					
					<div class="row m-3">
						<div class="col-lg-5">
							<div class="row" style="margin:0; padding:0">
								<div class="row" style="margin:0; padding:0">
									<h5>Search Resident</h5>
								</div>
								<div class="row"  style="margin:0; padding:0">
									<form id="frmSearchResident">
										<div class="row"  style="margin:0; padding:0">
											<div class="col-lg-9"  style="margin:0; padding:0">
												<div class="form-group">
													<div class="row">
														<div class="col-lg-2">
															<label>Search:</label>
														</div>
														<div class="col-lg-10">
															<input type="text" name="txtSearch" class="form-control" />
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3"  style="margin:0; padding:0">
													<button type="submit" id="btnSearchResidentSubmit" form="frmSearchResident" class="btn btn-primary">
														<span class="fas fa-search"></span>
														<label>Search</label>
													</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="row">
								<table id="tblResidentSearch" class="table table-condensed table-striped table-bordered">
									<thead class="thead-dark">
										<th width="90px">Action</th>
										<th>Name</th>
										<th>Birthdate</th>
										<th>Gender</th>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="row">
								<h5>Household Resident</h5>
							</div>
							<div class="row">
								<table id="tblHouseHoldResidents" class="table table-condensed table-striped table-bordered">
									<thead class="thead-dark">
										<th width="130px">Action</th>
										<th>Name</th>
										<th width="100">is Homeowner</th>
										<th>Age</th>
										<th>Gender</th>
										<th>Relationship To Homeowner</th>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmNewHouseHold" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
  </div>

  <div class="modal fade" id="mdlEditHouseHold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit HouseHold</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmEditHouseHold">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>House No:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtHouseNo" class="form-control" />
								<input type="hidden" name="txtID" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Street:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtStreet" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Block No:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtBlockNo" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>House Hold Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtHouseHoldName" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-10 offset-2">
								<input type="checkbox" name="txtIsActive" checked="checked" />
								<label> is Active</label>
							</div>
						</div>
					</div>
				</form>
					<hr/>
					
					<div class="row m-3">
						<div class="col-lg-5">
							<div class="row" style="margin:0; padding:0">
								<div class="row" style="margin:0; padding:0">
									<h5>Search Resident</h5>
								</div>
								<div class="row"  style="margin:0; padding:0">
									<form id="frmSearchResident">
										<div class="row"  style="margin:0; padding:0">
											<div class="col-lg-9"  style="margin:0; padding:0">
												<div class="form-group">
													<div class="row">
														<div class="col-lg-2">
															<label>Search:</label>
														</div>
														<div class="col-lg-10">
															<input type="text" name="txtSearch" class="form-control" />
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3"  style="margin:0; padding:0">
													<button type="submit" id="btnSearchResidentSubmit" form="frmSearchResident" class="btn btn-primary">
														<span class="fas fa-search"></span>
														<label>Search</label>
													</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="row">
								<table id="tblResidentSearch" class="table table-condensed table-striped table-bordered">
									<thead class="thead-dark">
										<th width="90px">Action</th>
										<th>Name</th>
										<th>Birthdate</th>
										<th>Gender</th>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="row">
								<h5>Household Resident</h5>
							</div>
							<div class="row">
								<table id="tblHouseHoldResidents" class="table table-condensed table-striped table-bordered">
									<thead class="thead-dark">
										<th width="200">Action</th>
										<th>Name</th>
										<th width="170">is Homeowner</th>
										<th>Age</th>
										<th>Gender</th>
										<th>Relationship To Homeowner</th>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmEditHouseHold" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
  </div>

  <div class="modal fade" id="mdlViewHouseHold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">View HouseHold</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmViewHouseHold">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>House No:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtHouseNo" class="form-control" readonly />
								<input type="hidden" name="txtID" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Street:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtStreet" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Block No:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtBlockNo" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>House Hold Name:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtHouseHoldName" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-10 offset-2">
								<input type="checkbox" name="txtIsActive" checked="checked" readonly />
								<label> is Active</label>
							</div>
						</div>
					</div>
				</form>
					<hr/>
					
					<div class="row m-3">
						<div class="col-lg-12">
							<div class="row">
								<h5>Household Resident</h5>
							</div>
							<div class="row">
								<table id="tblHouseHoldResidents" class="table table-condensed table-striped table-bordered">
									<thead class="thead-dark">
										<th>Name</th>
										<th width="170">is Home Owner</th>
										<th >Age</th>
										<th >Gender</th>
										<th >Relationship To Homeowner</th>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<hr/>
					<div class="row m-3">
						<div class="col-lg-12">
							<div class="row">
								<h5>Household Vehicles</h5>
							</div>
							<div class="row">
								<table id="tblHouseHoldVehicles" class="table table-condensed table-striped table-bordered">
									<thead class="thead-dark">
										<th>Make</th>
										<th>Color</th>
										<th>Plate Number</th>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
  </div>

  <div class="modal fade" id="mdlViewHouseHoldLogs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">View HouseHold Logs</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<h5 id="lblHouseHoldName">HouseHold : <strong><u><span></span></u></strong></h5>
				</div>
				<hr>
				<div class="row">
					<form id="frmSearchHouseHoldLogs">
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
					<table id="tblHouseHoldLogs" class="table table-condensed table-striped table-bordered">
						<thead class="thead-dark">
							<th>Member</th>
							<th>Date</th>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-light" id="btnPrintMemberLogs">
					<span class="fas fa-print"></span>
					Print 
				</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mdlViewHouseHoldVisitorLogs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">View HouseHold Visitor Logs</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<h5 id="lblHouseHoldName">HouseHold : <strong><u><span></span></u></strong></h5>
				</div>
				<hr>
				<div class="row">
					<form id="frmSearchHouseHoldVisitorLogs">
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
				<table id="tblHouseHoldVisitorLogs" class="table table-condensed table-striped table-bordered">
					<thead class="thead-dark">
						<th>Visitor</th>
						<th>Date</th>
						<th>Purpose of Visit</th>
						<th>Approved By</th>
						<th>Approved DateTime</th>
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

  <!-- END of MODALS -->

<script defer="true">
	$(document).ready( function(){
		//Global Variables
		let ResidentSearch = [];
		let HouseHoldResidents = [];

		//----------------------------------------
		setTimeout( function(){
			$("#frmSearch").trigger('submit');
		}, 500);
		//----------------------------------------

		$("#btnPrintVisitorLogs").click( function(){
			$("#mdlViewHouseHoldVisitorLogs .modal-body").printThis({
				importCSS : false,
				importStyle : true,
				canvas : true
			});
		});

		$("#frmSearchHouseHoldVisitorLogs").submit( function(event){
			event.preventDefault();
			let data = $(this).serialize();
			let url = "API/HouseHolds/GetHouseHoldVisitorLogs.php"; 
			$.post(url, data, function(res){
				let $tbl = $("#mdlViewHouseHoldVisitorLogs #tblHouseHoldVisitorLogs tbody");
				$tbl.html("");
				$.each(res, function(indx, value){
					$tbl.append(`
							<tr>
								<td>`+ value.VisitorName +`</td>
								<td>`+ value.RequestDateTime +`</td>
								<td>`+ value.ReasonForVisit +`</td>
								<td>`+ value.ApprovedBy +`</td>
								<td>`+ value.ApprovedDateTime +`</td>
							</tr>
						`);
				});
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		})

		$("#tblHouseHold").on('click', '.btnViewVisitorLogs', function(){
			let id = $(this).parent().parent().prop('id');
			let HouseHoldName = $(this).parent().next().html();
			
			$("#mdlViewHouseHoldVisitorLogs input[name=ID]").val(id);
			$("#mdlViewHouseHoldVisitorLogs #lblHouseHoldName span").html(HouseHoldName);
			$("#mdlViewHouseHoldVisitorLogs #tblHouseHoldVisitorLogs tbody").html("");

			$("#mdlViewHouseHoldVisitorLogs").modal("show");
		});


		$("#btnPrintMemberLogs").click( function(){
			$("#mdlViewHouseHoldLogs .modal-body").printThis({
				importCSS : false,
				importStyle : true,
				canvas : true
			});
		});

		$("#frmSearchHouseHoldLogs").submit( function(event){
			event.preventDefault();
			let data = $(this).serialize();
			let url = "API/HouseHolds/GetHouseHoldLogs.php"; 
			$.post(url, data, function(res){
				let $tbl = $("#mdlViewHouseHoldLogs #tblHouseHoldLogs tbody");
				$tbl.html("");
				$.each(res, function(indx, value){
					$tbl.append(`
							<tr>
								<td>`+ value.MemberName +`</td>
								<td>`+ value.DateOfLogs +`</td>
							</tr>
						`);
				});
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		})

		$("#tblHouseHold").on('click', '.btnViewMemberLogs', function(){
			let id = $(this).parent().parent().prop('id');
			let HouseHoldName = $(this).parent().next().html();
			
			$("#mdlViewHouseHoldLogs input[name=ID]").val(id);
			$("#mdlViewHouseHoldLogs #lblHouseHoldName span").html(HouseHoldName);
			$("#mdlViewHouseHoldLogs #tblHouseHoldLogs tbody").html("");

			$("#mdlViewHouseHoldLogs").modal("show");
		});

		$("#tblHouseHold").on('click', '.btnView', function(){
			let id = $(this).parent().parent().prop('id');
			let url = "API/HouseHolds/GetHouseHoldDetailsByID.php?ID="+id;
			$.get(url, function(res){
				if(res != undefined){
					let $frm = $("#frmViewHouseHold");
					$frm.find('input[name=txtHouseNo]').val(res.HouseNo);
					$frm.find('input[name=txtStreet]').val(res.Street);
					$frm.find('input[name=txtHouseHoldName]').val(res.HouseHoldName);
					$frm.find('input[name=txtBlockNo]').val(res.BlockNo);
					$frm.find('input[name=txtID]').val(id);
					$frm.find('input[name=chkIsActive]').prop('checked', res.isActive);
					$("#tblResidentSearch tbody").html('');
					GetHouseHoldMembers(id, "mdlViewHouseHold");
					GetHouseHoldVehicles(id);
					$("#mdlViewHouseHold").modal('show');
				}
				else{
					msgPopUp("Could not be found", "Requested data could not be found in the database", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#frmEditHouseHold").submit( function(event){
			event.preventDefault();
			let data = $(this).serializeArray();
			let list = HouseHoldResidents.map(x =>{
						return {DataCenterID: x.DataCenterID, isContactPerson : x.isContactPerson, Relationship : x.Relationship}
					} );
			console.log(list);
			data.push({name: "HouseHoldMembers" , value : JSON.stringify(list)})
			console.log(data);
			let url = "API/HouseHolds/EditHouseHold.php";
			$.post(url, data, function(res){
				if(res.result){
					msgPopUp("Saved!",  "HouseHold record has been successfully saved.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save household record.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#tblHouseHold").on('click', '.btnEdit', function(){
			let id = $(this).parent().parent().prop('id');
			let url = "API/HouseHolds/GetHouseHoldDetailsByID.php?ID="+id;
			$.get(url, function(res){
				if(res != undefined){
					let $frm = $("#frmEditHouseHold");
					$frm.find('input[name=txtHouseNo]').val(res.HouseNo);
					$frm.find('input[name=txtStreet]').val(res.Street);
					$frm.find('input[name=txtHouseHoldName]').val(res.HouseHoldName);
					$frm.find('input[name=txtBlockNo]').val(res.BlockNo);
					$frm.find('input[name=txtID]').val(id);
					$frm.find('input[name=chkIsActive]').prop('checked', res.isActive);
					$("#tblResidentSearch tbody").html('');
					GetHouseHoldMembers(id, "mdlEditHouseHold");
					$("#mdlEditHouseHold").modal('show');
				}
				else{
					msgPopUp("Could not be found", "Requested data could not be found in the database", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$(document).on("change", ".chkHouseHoldContactPersonStatus", function(){
			let ID = $(this).parent().parent().attr("id");
			if($(this).prop("checked")){
				HouseHoldResidents = HouseHoldResidents.map( x => {
					let val = Object.assign({}, x);
					if(val.DataCenterID == ID){
						val.isContactPerson = 1
					}
					return val;
				});
			}
			else{
				HouseHoldResidents = HouseHoldResidents.map( x => {
					let val = Object.assign({}, x);
					if(val.DataCenterID == ID){
						val.isContactPerson = 0
					}
					return val;
				});
			}
			console.log(HouseHoldResidents);
		});

		function GetHouseHoldMembers(id, modalid){
			let url = "API/HouseHolds/GetHouseHoldMembers.php?HouseHoldID="+id;
			$.get(url, function(res){
				HouseHoldResidents = res;
				let $tbl = $("#"+modalid+" #tblHouseHoldResidents tbody");
				$tbl.html('');
				console.log(res);
				$.each( res, function(indx, value){
					console.log(value.ResidentName + " " + value.isContactPerson + " " + parseInt(value.isContactPerson));
					if(modalid == "mdlEditHouseHold"){
						$tbl.append(`
							<tr id="`+ value.DataCenterID +`">
								` + (
									modalid != 'mdlViewHouseHold' ?
									`<td>
										<button class="btn btn-danger btnRemoveResident">
											<span class="fas fa-trash" ></span>
											Remove
										</button>
									</td>` : ''
								) + `
								<td> `+ value.ResidentName +`</td>
								<td> <input type="checkbox"  class="chkHouseHoldContactPersonStatus" 
										`
										+ (parseInt(value.isContactPerson) == 1 ? "checked='checked'" : "") +
										`
										" /> 
								</td>
								<td> `+ value.Age +`</td>
								<td> `+ value.Gender +`</td>
								<td> 
									<input type="text" class="form-control txtRelToHomeOwner" value="`+ value.RelationshipToHomeowner +`" />
								</td>
							</tr>
						`);
					}
					else{
						$tbl.append(`
							<tr id="`+ value.DataCenterID +`">
								` + (
									modalid != 'mdlViewHouseHold' ?
									`<td>
										<button class="btn btn-danger btnRemoveResident">
											<span class="fas fa-trash" ></span>
											Remove
										</button>
									</td>` : ''
								) + `
								<td> `+ value.ResidentName +`</td>
								<td> <input type="checkbox"  class="chkHouseHoldContactPersonStatus" 
										`
										+ (parseInt(value.isContactPerson) == 1 ? "checked='checked'" : "") +
										`
										" /> 
								</td>
								<td> `+ value.Age +`</td>
								<td> `+ value.Gender +`</td>
								<td> `+ value.RelationshipToHomeowner +` </td>
							</tr>
						`);
					}
				});
			}, 'json')
		}

		function GetHouseHoldVehicles(id){
			let url = "API/HouseHolds/GetHouseholdVehicles.php?HouseHoldID="+id;
			$.get(url, function(res){
				let $tbl = $("#tblHouseHoldVehicles tbody");
				$tbl.html("");
				$.each(res, function(index, value){
					$tbl.append(`
								<tr>
									<td>`+ value.Model +`</td>
									<td>`+ value.Color +`</td>
									<td>`+ value.PlateNumber +`</td>
								</tr>`
							);
				});
			}, 'json')
		}

		$("#btnNew").click( function(){
			$("#mdlNewHouseHold").modal("show");
		});

		$("#frmNewHouseHold").submit( function(event){
			event.preventDefault();
			let data = $(this).serializeArray();
			let list = HouseHoldResidents.map(x =>{
						return {DataCenterID: x.DataCenterID, isContactPerson : x.isContactPerson, Relationship : x.Relationship}
					} );
			console.log(list);
			data.push({name: "HouseHoldMembers" , value : JSON.stringify(list)})
			console.log(data);
			$("#tblResidentSearch tbody").html('');
			let url = "API/HouseHolds/CreateNewHousehold.php";
			$.post(url, data, function(res){
				if(res.result){
					msgPopUp("Saved!",  "HouseHold record has been successfully saved.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save household record.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#mdlEditHouseHold #tblHouseHoldResidents").on('click', '.btnSetAsContact', function(){
			let confirmSet = confirm("Are you sure you want to set resident as Household Contact?");
			if(confirmSet){
				let ID = $(this).parent().parent().prop("id");
				HouseHoldResidents = HouseHoldResidents.map(x => {
					if(x.DataCenterID == ID){
						x.isContactPerson = true;
					}	
					return x;
				});
				
				
				//Update UI
				$("#mdlEditHouseHold #tblHouseHoldResidents tr#"+ID+" td:nth-child(3)").html("Yes");
			}
		});

		$("#mdlEditHouseHold #tblHouseHoldResidents").on('click', '.btnRemoveResident', function(){
			let confirmRemove = confirm("Are you sure you want to remove resident from house hold?");
			if(confirmRemove){
				let ID = $(this).parent().parent().prop("id");
				HouseHoldResidents = HouseHoldResidents.filter(x => x.DataCenterID != ID);
				//remove from UI
				$("#mdlEditHouseHold #tblHouseHoldResidents tr#"+ID).remove();
			}
		});

		$(" #mdlEditHouseHold #tblResidentSearch").on('click', '.btnSelectResident', function(){
			let ID = $(this).parent().parent().prop("id");
			let obj = ResidentSearch.find(x => x.DataCenterID == ID);
			console.log(obj);
			//check if already added to list
			let isExists = HouseHoldResidents.filter(x=> x.DataCenterID == ID).length;
			if(!Boolean(isExists)){
				HouseHoldResidents.push(obj);
				console.log(HouseHoldResidents);
				//add to UI
				$("#mdlEditHouseHold #tblHouseHoldResidents tbody").append(`
													<tr id="`+ obj.DataCenterID +`">
														<td>
															<button class="btn btn-danger btnRemoveResident">
																<span class="fas fa-trash" ></span>
																Remove
															</button>
														</td>
														<td> `+ obj.ResidentName +`</td>
														<td> 
															<input type="checkbox" class="chkHouseHoldContactPersonStatus" " /> 
														</td>
														<td> `+ obj.Age +`</td>
														<td> `+ obj.Gender +`</td>
														<td> 
															<input type="text" class="form-control txtRelToHomeOwner" />
														</td>
													</tr>
												`);
			}
			else{
				msgPopUp("Already Exists", "Resident Already belongs to Household.", "warning");
			}		
		});

		$("#mdlEditHouseHold #btnSearchResidentSubmit").click( function(){
			$(" #mdlEditHouseHold #frmSearchResident").trigger("submit");
		});

		$("#mdlEditHouseHold #frmSearchResident").submit( function(event){
			event.preventDefault();
			let data = $(this).serialize();
			let url = "API/HouseHolds/SearchResidentForHousehold.php";
			$.post(url, data, function(res){
				ResidentSearch = res;
				let $tbl = $("#mdlEditHouseHold #tblResidentSearch tbody");
				$tbl.html("");
				$.each( res, function(index, value){
					$tbl.append(`
							<tr id="`+ value.DataCenterID +`">
								<td>
									<button class="btn btn-primary btnSelectResident">
										<span class="fas fa-check" ></span>
										Select
									</button>
								</td>
								<td>`+ value.ResidentName +`</td>
								<td>`+ value.BirthDate +`</td>
								<td>`+ value.Gender +`</td>
							</tr>
						`);
				});
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#mdlNewHouseHold #tblHouseHoldResidents").on('click', '.btnSetAsContact', function(){
			let confirmSet = confirm("Are you sure you want to set resident as Household Contact?");
			if(confirmSet){
				let ID = $(this).parent().parent().prop("id");
				HouseHoldResidents = HouseHoldResidents.map(x => {
					if(x.DataCenterID == ID){
						x.isContactPerson = true;
					}	
					return x;
				});
				
				
				//Update UI
				$("#tblHouseHoldResidents tr#"+ID+" td:nth-child(3)").html("Yes");
			}
		});

		$("#mdlNewHouseHold #tblHouseHoldResidents").on('click', '.btnRemoveResident', function(){
			let confirmRemove = confirm("Are you sure you want to remove resident from house hold?");
			if(confirmRemove){
				let ID = $(this).parent().parent().prop("id");
				HouseHoldResidents = HouseHoldResidents.filter(x => x.DataCenterID != ID);
				//remove from UI
				$("#mdlNewHouseHold #tblHouseHoldResidents tr#"+ID).remove();
			}
		});

		$("#mdlNewHouseHold #tblResidentSearch").on('click', '.btnSelectResident', function(){
			let ID = $(this).parent().parent().prop("id");
			let obj = ResidentSearch.find(x => x.DataCenterID == ID);
			console.log(obj);
			//check if already added to list
			let isExists = HouseHoldResidents.filter(x=> x.DataCenterID == ID).length;
			if(!Boolean(isExists)){
				HouseHoldResidents.push(obj);
				console.log(HouseHoldResidents);
				//add to UI
				$("#mdlNewHouseHold #tblHouseHoldResidents tbody").append(`
													<tr id="`+ obj.DataCenterID +`">
														<td>
															<button class="btn btn-danger btnRemoveResident">
																<span class="fas fa-trash" ></span>
																Remove
															</button>
														</td>
														<td> `+ obj.ResidentName +`</td>
														<td> 
															<input type="checkbox" class="chkHouseHoldContactPersonStatus" " /> 
														</td>
														<td> `+ obj.Age +`</td>
														<td> `+ obj.Gender +`</td>
														<td> 
															<input type="text" class="form-control txtRelToHomeOwner" />
														</td>
													</tr>
												`);
			}
			else{
				msgPopUp("Already Exists", "Resident Already belongs to Household.", "warning");
			}		
		});

		$(document).on('keyup', '.txtRelToHomeOwner',function(){
			let txtVal = $(this).val();
			let id = $(this).parent().parent().attr('id');
			HouseHoldResidents = HouseHoldResidents.map( x => {
					let val = Object.assign({}, x);
					if(val.DataCenterID == id){
						val.Relationship = txtVal;
					}
					return val;
				});
			console.log(txtVal);
			console.log(HouseHoldResidents);
		});

		$("#mdlNewHouseHold #btnSearchResidentSubmit").click( function(){
			$("#mdlNewHouseHold #frmSearchResident").trigger("submit");
		});

		$("#mdlNewHouseHold #frmSearchResident").submit( function(event){
			event.preventDefault();
			let data = $(this).serialize();
			let url = "API/HouseHolds/SearchResidentForHousehold.php";
			$.post(url, data, function(res){
				ResidentSearch = res;
				let $tbl = $("#mdlNewHouseHold #tblResidentSearch tbody");
				$tbl.html("");
				$.each( res, function(index, value){
					$tbl.append(`
							<tr id="`+ value.DataCenterID +`">
								<td>
									<button class="btn btn-primary btnSelectResident">
										<span class="fas fa-check" ></span>
										Select
									</button>
								</td>
								<td>`+ value.ResidentName +`</td>
								<td>`+ value.BirthDate +`</td>
								<td>`+ value.Gender +`</td>
							</tr>
						`);
				});
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

		$("#frmSearch").submit( function(event){
			event.preventDefault();
			let frm = $(this).serialize();
			let url = "API/HouseHolds/SearchHouseHold.php";
			$.post(url, frm, function(res){
				let $tbl = $("#tblHouseHold tbody");
				$tbl.html("");
				$("#lblResultCount").html(res.length);
				$.each(res, function(index, value){
					$tbl.append(`
						<tr id="`+ value.HouseHoldID +`">
							<td>
								<button class="btn btn-primary btnView">
									<span class="fas fa-eye" ></span>
									View
								</button>
								<button class="btn btn-warning btnEdit">
									<span class="fas fa-edit" ></span>
									Edit
								</button>
								<button class="btn btn-secondary btnViewMemberLogs">
									<span class="fas fa-list" ></span>
									Member Logs
								</button>
								<button class="btn btn-secondary btnViewVisitorLogs">
									<span class="fas fa-list" ></span>
									Visitor Logs
								</button>
							</td>
							<td>`+ value.HouseHoldName +`</td>
							<td>`+ value.HouseNo +`</td>
							<td>`+ value.MembersCount +`</td>
							<td>`+ value.Street +`</td>
							<td>`+ value.BlockNo +`</td>
							<td>` + value.CreatedBy + `</td>
							<td>` + value.CreatedDateTime + `</td>
							<td>` + value.CreatedByPosition + `</td>
							<td>` + (value.UpdatedBy == undefined ? '' : value.UpdatedBy) + `</td>
							<td>` + (value.UpdatedDateTime == undefined ? '' : value.UpdatedDateTime) + `</td>
							<td>` + (value.UpdatedByPosition == undefined ? '' : value.UpdatedByPosition) + `</td>
						</tr>
					`);
				})
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});

	});
</script>

</html>