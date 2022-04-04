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

    <h2 class="page-title"><span class="fas fa-flag"> </span> Reports</h2>
    <hr/>

    <div class="row">
        <form id="frmSearch" class="col">
			<div class="form-group row">
				<div class="col-lg-1">
					<label>Search:</label>
				</div>
				<div class="col-lg-6">
					<input type="text" name="txtSearch" class="form-control" placeholder="Report No / Reporter Name" />
				</div>
				<div class="col-lg-2">
					<button type="submit" class="btn btn-primary">
						<span class="fas fa-search" ></span>
						Search
					</button>
				</div>
				
				<div class="col-lg-2 offset-lg-1">
					<button id="btnNew" sty type="button" class="btn btn-success" style="display:none; float:right">
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
				<th>Report No</th>
				<th>Type</th>
				<th>Status</th>
				<th>Reporter</th>
				<th>Reported Date</th>
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
<div class="modal fade" id="mdlViewReport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">View Report</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmViewReport">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Report Type:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtReportType" class="form-control" />
							</div>
                            <div class="col-lg-2">
								<label>Status:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtReportStatus" class="form-control" />
							</div>
						</div>
					</div>
                    <div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Reported By:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtReportedBy" class="form-control" />
							</div>
                            <div class="col-lg-2">
								<label>Report Date/Time:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtReportedDateTime" class="form-control" />
							</div>
						</div>
					</div>
                    <hr>
                    <div class="form-group m-3">
						<div class="row">
                            <label>Report Details: </label>
                            <textarea name="txtReportDetails" class="form-control" style="min-height:200px; font-size:13px; margin:10px 0 0 0 "></textarea>
						</div>
					</div>
                    <hr>
                    <div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Acknowledged By:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtAcknowledgedBy" class="form-control" />
							</div>
                            <div class="col-lg-2">
								<label>Acknowledgement Date/Time:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtAcknowledgedDateTime" class="form-control" />
							</div>
						</div>
					</div>
                    <div class="form-group m-3">
						<div class="row">
                            <label>Acknowledgement Remarks: </label>
                            <textarea name="txtAcknowledgedmentRemarks" class="form-control" style="min-height:200px; font-size:13px; margin:10px 0 0 0 "></textarea>
						</div>
					</div>
                    <hr>
                    <div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Tagged Resolved By:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtTaggedResolvedBy" class="form-control" />
							</div>
                            <div class="col-lg-2">
								<label>Tagged Resolved Date/Time:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtTaggedResolvedDateTime" class="form-control" />
							</div>
						</div>
					</div>
                    <div class="form-group m-3">
						<div class="row">
                            <label>Tagged Resolved Remarks: </label>
                            <textarea name="txtTaggedResolvedRemarks" class="form-control" style="min-height:200px; font-size:13px; margin:10px 0 0 0 "></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button id="btnPrintReport" type="button" class="btn btn-warning" style="width:100px">
                <span class="fas fa-print"></span>
                Print
            </button>
			</div>
		</div>
	</div>
  </div>
</div>

<div class="modal fade" id="mdlUpdateStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Update Report Status</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="frmUpdateReportStatus">
					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Report Type:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtReportType" class="form-control" readonly />
								<input type="hidden" name="ReportID" class="form-control" readonly />
							</div>
                            <div class="col-lg-2">
								<label>Status:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtReportStatus" class="form-control" readonly />
							</div>
						</div>
					</div>
                    <div class="form-group m-3">
						<div class="row">
							<div class="col-lg-2">
								<label>Reported By:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtReportedBy" class="form-control" readonly />
							</div>
                            <div class="col-lg-2">
								<label>Report Date/Time:</label>
							</div>
							<div class="col-lg-4">
								<input type="text" name="txtReportedDateTime" class="form-control" readonly />
							</div>
						</div>
					</div>
                    <hr>
                    <div class="form-group m-3">
						<div class="row">
                            <label>Report Details: </label>
                            <textarea name="txtReportDetails" class="form-control" readonly style="min-height:200px; font-size:13px; margin:10px 0 0 0 "></textarea>
						</div>
					</div>
                    <hr>

					<div class="form-group m-3">
						<div class="row">
							<div class="col-lg-3">
								<label>Update Status To: </label>
							</div>
							<div class="col-lg-9">
								<select name="cboStatus" class="form-select" aria-label="Please select status to update">
									<!-- <option value="ACKNOWLEDGE">ACKNOWLEDGE</option>
									<option value="REJECT">REJECT</option>
									<option value="RESOLVED">RESOLVED</option> -->
								</select>
							</div>
						</div>
					</div>
					<div class="form-group m-3">
						<div class="row">
                            <label>Remarks: </label>
                            <textarea name="txtUpdateStatusRemarks" required class="form-control" style="min-height:200px; font-size:13px; margin:10px 0 0 0 "></textarea>
						</div>
					</div>
                    
				</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="frmUpdateReportStatus" class="btn btn-primary">Save changes</button>
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

		$("#btnPrintReport").click( function(){
			$("#frmViewReport").printThis({
				importCSS : true,
				importStyle : true,
				canvas : true,
				loadCSS : document.URL.substr(0,document.URL.lastIndexOf('/')) + "/css/bootstrap.min.css"
			});
		});

		$("#frmUpdateReportStatus").submit( function(event){
			event.preventDefault();
			let data = $(this).serialize();
			let url = "API/Reports/UpdateReportStatus.php";
			$.post(url, data, function(res){
				if(res.result){
					msgPopUp("Saved!",  "Report Updated Successfully.", "success");
					$(".modal").modal('hide');
					$("#frmSearch").trigger('submit');
				}
				else{
					msgPopUp("Error!",  "Failed to Update Report.", "warning");
				}
			}, 'json')
			.fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
		});

		$("#tblList").on('click', '.btnUpdateStatus', function(){
			let $tr = $(this).parent().parent()
            let ID = $tr.prop("id");
            let url = "API/Reports/GetReportDetailsByID.php?ID=" + ID;
            $.get(url, function(res){
                let $frm = $("#frmUpdateReportStatus");
				$frm.find('input[name=ReportID]').val(ID);
				$frm.find('input[name=txtReportType]').val(res.ReportType);
				$frm.find('input[name=txtReportStatus]').val(res.ReportStatus);
				$frm.find('input[name=txtReportedBy]').val(res.CreatedBy);
				$frm.find('input[name=txtReportedDateTime]').val(res.CreatedDateTime);
				$frm.find('textarea[name=txtReportDetails]').html(res.ReportDetails);
				$frm.find('select[name=cboStatus]').html('');
				let ReportStatus = $tr.find('td:nth-child(4)').html();
				console.log(ReportStatus);
				if(ReportStatus == "PENDING"){
					$frm.find('select[name=cboStatus]').append(`
									<option value="ACKNOWLEDGE">ACKNOWLEDGE</option>
									<option value="REJECT">REJECT</option>
							`);
				}
				else if (ReportStatus == "ACKNOWLEDGE"){
					$frm.find('select[name=cboStatus]').append(`
									<option value="RESOLVED">RESOLVED</option>
							`);
				}

				$("#mdlUpdateStatus").modal("show");
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

        $("#tblList").on('click', '.btnView', function(){
            let ID = $(this).parent().parent().prop("id");
            let url = "API/Reports/GetReportDetailsByID.php?ID=" + ID;
            $.get(url, function(res){
                let $frm = $("#frmViewReport");
				$frm.find('input[name=txtReportType]').val(res.ReportType);
				$frm.find('input[name=txtReportStatus]').val(res.ReportStatus);
				$frm.find('input[name=txtReportedBy]').val(res.CreatedBy);
				$frm.find('input[name=txtReportedDateTime]').val(res.CreatedDateTime);
				$frm.find('textarea[name=txtReportDetails]').html(res.ReportDetails);
				$frm.find('input[name=txtAcknowledgedBy]').val(res.AcknowledgedBy);
				$frm.find('input[name=txtAcknowledgedDateTime]').val(res.AcknowledgedDateTime);
				$frm.find('input[name=txtAcknowledgedmentRemarks]').val(res.ReportAcknowledgementRemarks);
				$frm.find('input[name=txtTaggedResolvedBy]').val(res.ResolvedBy);
				$frm.find('input[name=txtTaggedResolvedDateTime]').val(res.ResolvedDateTime);
				$frm.find('input[name=txtTaggedResolvedRemarks]').val(res.ReportResolveRemarks);

				$("#mdlViewReport").modal("show");
            }, 'json')
            .fail( function(xhr, status, message){
                msgPopUp("Error has occured", message, "danger");
            });
        });

        $("#frmSearch").submit( function(event){
            event.preventDefault();
            let data = $(this).serialize();
            let url = "API/Reports/SearchReports.php";
            $.post(url, data, function(res){
                let $tbl = $("#tblList tbody");
                $tbl.html("");
                $.each(res, function(index, value){
                    $tbl.append(`
                                <tr id="`+value.ReportID+`">
                                    <td>
                                        <button class="btn btn-primary btnView">
                                            <span class="fas fa-eye"></span>
                                            View
                                        </button>
                                        <button class="btn btn-warning btnUpdateStatus" style="display:`+(parseInt(value.isAllowUpdateStatus) > 0 ? "block" : "none")+`">
                                            <span class="fas fa-edit"></span>
                                            Update Status
                                        </button>
                                    </td>
                                    <td>`+ value.ReportNo +`</td>
                                    <td>`+ value.ReportType +`</td>
                                    <td>`+ value.ReportStatus +`</td>
                                    <td>`+ value.CreatedBy +`</td>
                                    <td>`+ value.CreatedDateTime +`</td>
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