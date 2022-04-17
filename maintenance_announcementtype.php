<div class="mainContent" style="width:calc(100vw - 500px) !important">
	<h4 class="page-title"></i>Announcement Types</h4>
	<hr/>

    <div class="row">
        <div class="col-lg-12">
            <form id="frmAnnouncementTypesSearch">
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
    </div>

    <div class="row">
        <table id="tblList" class="table table-condensed table-striped table-bordered">
			<thead class="thead-dark">
				<th width="150px">Action</th>
				<th>Description</th>
				<th>is Active</th>
				<th>Created By</th>
				<th>Created Date / Time</th>
				<th>Created By Position</th>
				<th>Updated By</th>
				<th>Updated Date / Time</th>
				<th>Updated By Position</th>
			</thead>
			<tbody>
                
            </tbody>
        </table>
    </div>

</div>

<!-- MODALS -->

<!-- END of MODALS -->

<script defer="true">
    $(document).ready( function(){

        setTimeout(() => {
            $("#frmAnnouncementTypesSearch").trigger('submit');
        }, 500);
        //----------------------

        $("#tblList").on('click', '.btnEdit', function(){
            let ID = $(this).parent().parent().prop('id');
            let url = "API/Maintenance/AnnouncementTypes/GetAnnouncementTypeDetailsByID.php?ID=" + ID;
            $.get(url, function(res){
                let $frm = $("#frmEditAnnouncementType");
                $frm.find("input[name=txtDescription]").val(res.Description);
                $frm.find("input[name=txtID]").val(res.ATID);
                $frm.find("input[name=chkIsActive]").prop("checked", res.isActive);
                $("#mdlEditAnnouncementType").modal("show");
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

        $("#frmEditAnnouncementType").submit( function(event){
            event.preventDefault();
            let data = $(this).serialize();
            let url = "API/Maintenance/AnnouncementTypes/UpdateAnnouncementType.php";
            $.post(url, data, function(res){
                if(res.result){
					msgPopUp("Saved!",  "Announcement Type has been successfully saved.", "success");
					$(".modal").modal('hide');
                    $("#frmAnnouncementTypesSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save Announcement Type.", "warning");
				}
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

        $("#frmNewAnnouncementType").submit( function(event){
            event.preventDefault();
            let data = $(this).serialize();
            let url = "API/Maintenance/AnnouncementTypes/CreateAnnouncementType.php";
            $.post(url, data, function(res){
                if(res.result){
					msgPopUp("Saved!",  "Announcement Type has been successfully saved.", "success");
					$(".modal").modal('hide');
                    $("#frmAnnouncementTypesSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to save Announcement Type.", "warning");
				}
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

        $("#btnNew").click( function(){
            $("#mdlNewAnnouncementType").modal("show");
        });

        $("#frmAnnouncementTypesSearch").submit( function(event){
            event.preventDefault();
            let data = $(this).serialize();
            let url = "API/Maintenance/AnnouncementTypes/GetAnnouncementTypes.php";
            $.post(url, data, function(res){
                let $tbl = $("#tblList tbody");
                $tbl.html("");
                let tblContent = "";
                $.each(res, function(index, value){
                    $tbl.append(`
                                <tr id="`+ value.ATID +`">
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
                                    <td>` + value.CreatedByPosition + `</td>
                                    <td>` + (value.UpdatedBy == undefined ? '' : value.UpdatedBy) + `</td>
                                    <td>` + (value.UpdatedDateTime == undefined ? '' : value.UpdatedDateTime) + `</td>
                                    <td>` + (value.UpdatedByPosition == undefined ? '' : value.UpdatedByPosition) + `</td>
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
