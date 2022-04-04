<!DOCTYPE html>
<?php 
    include 'sidenav.php';
?>

<div class="mainContent">
	<h2 class="page-title"><i class="fas  fa-tools"></i> Maintenance</h2>
	<hr/>

	<div class="row">
		<div class="col-2">
			<ul class="nav flex-column">
				<li class="nav-item maintenanceItem" id="maintenanceReportTypes">
					<a class="nav-link active " href="#">Report Types</a>
				</li>
				<li class="nav-item maintenanceItem" id="maintenanceAnnouncementTypes">
					<a class="nav-link " href="#">Announcement Types</a>
				</li>
				
			</ul>
		</div>
		<div class="col-10" id="maintenanceContent">
		</div>
	</div>

</div>

<!-- Report Type modals -->
<div class="modal fade" id="mdlNewReportType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">New Report Type</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmNewReportType">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Description:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtDescription" class="form-control" />
								<input type="hidden" name="txtID" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-10 offset-2">
								<input type="checkbox" name="chkIsActive" checked="checked" />
								<label>is Active</label>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmNewReportType" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="mdlEditReportType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">New Report Type</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmEditReportType">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Description:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtDescription" class="form-control" />
								<input type="hidden" name="txtID" class="form-control" />
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
			<button type="submit" form="frmEditReportType" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- End of Report Type modals -->


<!-- Report Announcement modals -->
<div class="modal fade" id="mdlNewAnnouncementType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">New Announcement Type</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmNewAnnouncementType">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Description:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtDescription" class="form-control" />
								<input type="hidden" name="txtID" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-10 offset-2">
								<input type="checkbox" name="chkIsActive" checked="checked" />
								<label>is Active</label>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmNewAnnouncementType" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="mdlEditAnnouncementType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit Announcement Type</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmEditAnnouncementType">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Description:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" name="txtDescription" class="form-control" />
								<input type="hidden" name="txtID" class="form-control" />
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
			<button type="submit" form="frmEditAnnouncementType" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- End of Announcement Type modals -->
<script defer="true">
$(document).ready(function(){
    $(".maintenanceItem").click( function(){
        let ID = $(this).prop("id");
        SetMaintenanceContent(ID);
    });

    function SetMaintenanceContent(id){
        let url = "";
        switch(id){
            case "maintenanceReportTypes" :
                url = "maintenance_reporttype.php";
                break;
				case "maintenanceAnnouncementTypes" :
                url = "maintenance_announcementtype.php";
                break;
            default :
                url = "";
        }

        $.get(url, function(res){
            $("#maintenanceContent").html(res);
        })

    }

    
})
</script>


<script defer="true">
    $(document).ready( function(){

        setTimeout(() => {
            $("#frmReportTypesSearch").trigger('submit');
        }, 500);
        //----------------------

        $("#tblList").on('click', '.btnEdit', function(){
            let ID = $(this).parent().parent().prop('id');
            let url = "API/Maintenance/ReportTypes/GetReportTypeDetailsByID.php?ID=" + ID;
            $.get(url, function(res){
                let $frm = $("#frmEditReportType");
                $frm.find("input[name=txtDescription]").val(res.Description);
                $frm.find("input[name=txtID]").val(res.ReportTypeID);
                $frm.find("input[name=chkIsActive]").prop("checked", res.isActive);
                $("#mdlEditReportType").modal("show");
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

        $("#frmEditReportType").submit( function(event){
            event.preventDefault();
            let data = $(this).serialize();
            let url = "API/Maintenance/ReportTypes/UpdateReportType.php";
            $.post(url, data, function(res){
                if(res.result){
					msgPopUp("Saved!",  "Report Type has been successfully saved.", "success");
					$(".modal").modal('hide');
                    $("#frmReportTypesSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save Report Type.", "warning");
				}
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

        $("#frmNewReportType").submit( function(event){
            event.preventDefault();
            let data = $(this).serialize();
            let url = "API/Maintenance/ReportTypes/CreateReportType.php";
            $.post(url, data, function(res){
                if(res.result){
					msgPopUp("Saved!",  "Report Type has been successfully saved.", "success");
					$(".modal").modal('hide');
                    $("#frmReportTypesSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save Report Type.", "warning");
				}
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

        $("#btnNew").click( function(){
            $("#mdlNewReportType").modal("show");
        });

        $("#frmReportTypesSearch").submit( function(event){
            event.preventDefault();
            let data = $(this).serialize();
            let url = "API/Maintenance/ReportTypes/GetReportTypes.php";
            $.post(url, data, function(res){
                let $tbl = $("#tblList tbody");
                $tbl.html("");
                let tblContent = "";
                $.each(res, function(index, value){
                    $tbl.append(`
                                <tr id="`+ value.ReportTypeID +`">
                                    <td>
                                        <button type="button" class="btn btn-warning btnEdit">
                                            <span class="fas fa-edit"></span>
                                            Edit
                                        </button>
                                    </td>
                                    <td>`+ value.Description +`</td>
                                    <td>` + (value.isActive == false ? 'Inactive' : 'Active') + `</td>
                                    <td>` + value.CreatedBy + `</td>
                                    <td>` + value.CreatedDateTime + `</td>
                                    <td>` + (value.UpdatedBy == undefined ? '' : value.UpdatedBy) + `</td>
                                    <td>` + (value.UpdatedDateTime == undefined ? '' : value.UpdatedDateTime) + `</td>
                                </tr>
                                `);
                });
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

    });
</script>

</html>