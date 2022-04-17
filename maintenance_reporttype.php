<div class="mainContent" style="width:calc(100vw - 500px) !important">
	<h4 class="page-title"></i>Complaint Types</h4>
	<hr/>

    <div class="row">
        <div class="col-lg-12">
            <form id="frmReportTypesSearch">
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
                $frm.find("input[name=chkIsActive]").prop("checked", (parseInt(res.isActive) == 1 ? true : false));
                $("#mdlEditReportType").modal("show");
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

        $("#frmEditReportType").submit( function(event){
            event.preventDefault();
            return false;
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
            return false;
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
