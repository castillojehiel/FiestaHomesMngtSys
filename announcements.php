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

    <h2 class="page-title"><span class="fas fa-comments"> </span> Announcements</h2>
    <hr/>

    <div class="row">
        <form id="frmSearch" class="col">
			<div class="form-group row">
				<div class="col-lg-1">
					<label>Search:</label>
				</div>
				<div class="col-lg-6">
					<input type="text" name="txtSearch" class="form-control" placeholder="Title" />
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
				<th width="200px">Action</th>
				<th>Title</th>
				<th>Type</th>
				<th>Expiry</th>
				<th>Status</th>
				<th>Created By</th>
				<th>Created Date Time</th>
				<th>Updated By</th>
				<th>Updated Date Time</th>
				<th>Published By</th>
				<th>Published Date Time</th>
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
<div class="modal fade" id="mdlNewAnnouncement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Create New Announcement</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmNewAnnoucement">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Announcement Type:</label>
							</div>
							<div class="col-lg-10">
								<select name="cboAnnouncementType" class="form-select">
									<?php
										include 'API/Connection.php';
										$query ="SELECT * FROM announcementtypes WHERE isActive = 1";
										$sql = $conn ->query($query);
										while($data = $sql -> fetch_assoc()):
									?>
										<option value="<?php echo($data["ATID"]) ?>"><?php echo($data["Description"]) ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Title:</label>
							</div>  
							<div class="col-lg-10">
								<input name="txtTitle" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Expiry Date:</label>
							</div>
							<div class="col-lg-10">
								<input name="txtExpiryDate" type="date" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Details:</label>
							</div>
							<div class="col-lg-10">
								<textarea name="txtDetails" class="form-control" style="min-height:200px"></textarea>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmNewAnnoucement" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
  </div>
</div>

<div class="modal fade" id="mdlEditAnnouncement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit Announcement</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmEditAnnouncement">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Announcement Type:</label>
							</div>
							<div class="col-lg-10">
								<input name="txtID" type="hidden" class="form-control" required />
								<select name="cboAnnouncementType" class="form-select">
									<?php
										include 'API/Connection.php';
										$query ="SELECT * FROM announcementtypes WHERE isActive = 1";
										$sql = $conn ->query($query);
										while($data = $sql -> fetch_assoc()):
									?>
										<option value="<?php echo($data["ATID"]) ?>"><?php echo($data["Description"]) ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Title:</label>
							</div>  
							<div class="col-lg-10">
								<input name="txtTitle" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Expiry Date:</label>
							</div>
							<div class="col-lg-10">
								<input name="txtExpiryDate" type="date" class="form-control" required />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Details:</label>
							</div>
							<div class="col-lg-10">
								<textarea name="txtDetails" class="form-control" style="min-height:200px"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-10 offset-lg-2">
							<input type="checkbox" name="chkIsActive" type="date" />
							<label>is Active</label>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmEditAnnouncement" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
  </div>
</div>

<div class="modal fade" id="mdlViewAnnouncement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit Announcement</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmViewAnnouncement">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Announcement Type:</label>
							</div>
							<div class="col-lg-10">
								<select name="cboAnnouncementType" class="form-select">
									<?php
										include 'API/Connection.php';
										$query ="SELECT * FROM announcementtypes WHERE isActive = 1";
										$sql = $conn ->query($query);
										while($data = $sql -> fetch_assoc()):
									?>
										<option value="<?php echo($data["ATID"]) ?>"><?php echo($data["Description"]) ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Title:</label>
							</div>  
							<div class="col-lg-10">
								<input name="txtTitle" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Expiry Date:</label>
							</div>
							<div class="col-lg-10">
								<input name="txtExpiryDate" type="date" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Details:</label>
							</div>
							<div class="col-lg-10">
								<textarea name="txtDetails" class="form-control" style="min-height:200px" readonly></textarea>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-10 offset-lg-2">
							<input type="checkbox" name="chkIsActive" readonly />
							<label>is Active</label>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Created By</label>
							</div>
							<div class="col-lg-10">
								<input name="txtCreatedBy" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Created Date/Time:</label>
							</div>
							<div class="col-lg-10">
								<input name="txtCreatedDateTime" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Updated By</label>
							</div>
							<div class="col-lg-10">
								<input name="txtUpdatedBy" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Updated Date/Time:</label>
							</div>
							<div class="col-lg-10">
								<input name="txtUpdatedDateTime" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>PublishedBy</label>
							</div>
							<div class="col-lg-10">
								<input name="txtPublishedBy" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Published Date/Time:</label>
							</div>
							<div class="col-lg-10">
								<input name="txtPublishedDateTime" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>UnpublishedBy</label>
							</div>
							<div class="col-lg-10">
								<input name="txtUnpublishedBy" class="form-control" readonly />
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Unpublished Date/Time:</label>
							</div>
							<div class="col-lg-10">
								<input name="txtUnpublishedDateTime" class="form-control" readonly />
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
</div>

<!-- END of MODALS -->

<script defer="true">
    $(document).ready( function(){

        setTimeout(() => {
            $("#frmSearch").trigger('submit');
        }, 1000);

        /////////////////---------------

		$("#btnNew").click( function(){
			$("#mdlNewAnnouncement").modal('show');
		});	

		$("#tblList").on('click', '.btnUnpublish', function(){
			let ID = $(this).parent().parent().prop("id");

			let userConfirm = confirm("Are you sure you want to unpublish this announcement?");
			if(!userConfirm)
				return;

			let url = "API/Announcement/UnpublishAnnouncement.php";
			let data = {ID : ID};
			$.post(url, data, function(res){
				if(res.result){
					msgPopUp("Unpublished!",  "Announcement has been unpublished successfully.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to unpublish announcement.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
		});

		$("#tblList").on('click', '.btnPublish', function(){
			let ID = $(this).parent().parent().prop("id");

			let userConfirm = confirm("Are you sure you want to publish this announcement?");
			if(!userConfirm)
				return;

			let url = "API/Announcement/PublishAnnouncement.php";
			let data = {ID : ID};
			$.post(url, data, function(res){
				if(res.result){
					msgPopUp("Published!",  "Announcement has been published successfully.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to publish announcement.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
		});

		$("#tblList").on('click', '.btnView', function(){
			let ID = $(this).parent().parent().prop("id");
			let url = "API/Announcement/GetAnnouncementDetailsByID.php?ID=" + ID;
			$.get(url, function(res){
				console.log(res);
				let $frm = $("#frmViewAnnouncement");
				$frm.find('select[name=cboAnnouncementType]').val(res.ATID).change();
				$frm.find('input[name=txtTitle]').val(res.Title);
				$frm.find('input[name=txtID]').val(ID);
				$frm.find('input[name=txtExpiryDate]').val(res.ExpiryDate);
				$frm.find('textarea[name=txtDetails]').html(res.Details);
				$frm.find('input[name=chkIsActive]').prop('checked', res.isActive);
				$frm.find('input[name=txtCreatedBy]').val(res.CreatedBy);
				$frm.find('input[name=txtCreatedDateTime]').val(res.CreatedDateTime);
				$frm.find('input[name=txtUpdatedBy]').val(res.UpdatedBy);
				$frm.find('input[name=txtUpdatedDateTime]').val(res.UpdatedDateTime);
				$frm.find('input[name=txtPublishedBy]').val(res.PublishedBy);
				$frm.find('input[name=txtPublishedDateTime]').val(res.PublishedDateTime);
				$frm.find('input[name=txtUnpublishedBy]').val(res.UnpublishedBy);
				$frm.find('input[name=txtUnpublishedDateTime]').val(res.UnpublishedDateTime);
				$("#mdlViewAnnouncement").modal('show'); 
			},'json')
			.fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
		});


		$("#frmEditAnnouncement").submit( function(event){
			event.preventDefault();
			let data = $(this).serialize();
			let url = "API/Announcement/UpdateAnnouncement.php";
			$.post(url, data, function(res){
				if(res.result){
					msgPopUp("Saved!",  "Announcement record has been successfully saved.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save announcement record.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
		});

		$("#tblList").on('click', '.btnEdit', function(){
			let ID = $(this).parent().parent().prop("id");
			let url = "API/Announcement/GetAnnouncementDetailsByID.php?ID=" + ID;
			$.get(url, function(res){
				console.log(res);
				let $frm = $("#frmEditAnnouncement");
				$frm.find('select[name=cboAnnouncementType]').val(res.ATID).change();
				$frm.find('input[name=txtTitle]').val(res.Title);
				$frm.find('input[name=txtID]').val(ID);
				$frm.find('input[name=txtExpiryDate]').val(res.ExpiryDate);
				$frm.find('textarea[name=txtDetails]').html(res.Details);
				$frm.find('input[name=chkIsActive]').prop('checked', res.isActive);
				$("#mdlEditAnnouncement").modal('show'); 
			},'json')
			.fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
		});

		$("#frmNewAnnoucement").submit( function(event){
			event.preventDefault();
			let url = "API/Announcement/CreateNewAnnouncement.php";
			let data = $(this).serialize();
			$.post(url, data, function(res){
				if(res.result){
					msgPopUp("Saved!",  "Announcement record has been successfully saved.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save announcement record.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
		});

        $("#frmSearch").submit( function(event){
            event.preventDefault();
            let data = $(this).serialize();
            let url = "API/Announcement/SearchAnnouncements.php";
            $.post(url, data, function(res){
                let $tbl = $("#tblList tbody");
                $tbl.html("");
                $.each(res, function(index, value){
                    $tbl.append(`
                                <tr id="`+value.AnnouncementID+`">
                                    <td>
                                        <button class="btn btn-primary btnView">
                                            <span class="fas fa-eye"></span>
                                            View
                                        </button>
                                        <button class="btn btn-warning btnEdit">
                                            <span class="fas fa-edit"></span>
                                            Edit
                                        </button>
										<button class="btn btn-success btnPublish" style="display:`+ (value.isAllowPublish == true ? "block" : "none") +`">
                                            <span class="fas fa-newspaper"></span>
                                            Publish
                                        </button><button class="btn btn-danger btnUnpublish" style="display:`+ (value.isAllowUnpublish == true ? "block" : "none") +`" >
                                            <span class="fas fa-stop"></span>
                                            Unpublish
                                        </button>
                                    </td>
                                    <td>` + value.Title +`</td>
                                    <td>` + value.AnnouncementType +`</td>
                                    <td>` + value.ExpiryDate +`</td>
                                    <td>` + value.AnnouncementStatus +`</td>
                                    <td>` + value.CreatedBy + `</td>
									<td>` + value.CreatedDateTime + `</td>
									<td>` + (value.UpdatedBy == undefined ? '' : value.UpdatedBy) + `</td>
									<td>` + (value.UpdatedDateTime == undefined ? '' : value.UpdatedDateTime) + `</td>
									<td>` + (value.PublishedBy == undefined ? '' : value.PublishedBy) + `</td>
									<td>` + (value.PublishedDateTime == undefined ? '' : value.PublishedDateTime) + `</td>
                                </tr>
                            `); 
                });

                $("#lblResultCount").html(res.length);

            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

    });
</script>