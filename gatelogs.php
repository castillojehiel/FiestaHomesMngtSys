<!DOCTYPE html>
<?php 
    include 'sidenav.php';
?>

<style>
	/* @media print {
		@page {
			margin: 0; 
		}
	} */
</style>

<div class="mainContent" >

    <h2 class="page-title"><span class="fas fa-list"> </span> Gate Logs</h2>
    <hr/>

    <div class="row">
        <form id="frmSearch" class="col">
			<div class="form-group row">
				<div class="col-lg-1">
					<label>Search:</label>
				</div>
                <div class="col-lg-2">
					<input type="date" name="txtDateFrom" class="form-control" />
				</div>
                <div class="col-lg-2">
					<input type="date" name="txtDateTo" class="form-control"  />
				</div>
				<div class="col-lg-4">
					<input type="text" name="txtKeyword" class="form-control" placeholder="Name / Resident ID / Visitor ID / Vehicle Model|Plate Number" />
				</div>
				<div class="col-lg-2">
					<button type="submit" class="btn btn-primary">
						<span class="fas fa-search" ></span>
						Search
					</button>
				</div>
			</div>
            <div class="row">
                <div class="col-lg-1 offset-lg-1">
					<div class="row">
						<div class="col-lg-4 form-group" style="display:inline-flex; margin:7px 0">
							<input type="checkbox" name="chkResidents" checked />
							<label style="margin:-3px 0 0 3px">Residents</label>

							<input type="checkbox" name="chkVisitors" checked style="margin:0 0 0 20px" />
							<label style="margin:-3px 0 0 3px">Visitors</label>

							<input type="checkbox" name="chkCars" checked style="margin:0 0 0 20px" />
							<label style="margin:-3px 0 0 3px">Vehicles</label>
						</div>
					</div>
                </div>  
				<div class="col-lg-2 offset-lg-8">
					<button id="btnPrintLogs" type="button" class="btn btn-warning w-100">
						<span class="fas fa-print" ></span>
						Print
					</button>
				</div>
            </div>
		</form>
    </div>
    <div class="row">
        <table id="tblList" class="table table-condensed table-striped table-bordered">
			<thead class="thead-dark">
				<th>QRCode</th>
				<th>Details</th>
				<th>Type</th>
				<th>HouseHold</th>
				<th>Address</th>
				<th>Logs Type</th>
				<th>Scanned By</th>
				<th>Scanned DateTime</th>
				<th>Scanned By Position</th>
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

<script defer="true">
	$(document).ready(function(){
		var date = new Date();
        var currentDate = date.toISOString().substring(0,10);
        $("#frmSearch input[name=txtDateFrom]").val(currentDate);
        $("#frmSearch input[name=txtDateTo]").val(currentDate);

		//------------------------------------------------

		$("#btnPrintLogs").click(function(){
			let hasRecordsToPrint = Boolean(parseInt($("#lblResultCount").html()));
			if(hasRecordsToPrint){
				$("#tblList").printThis({
					importCSS : true,
					importStyle : true,
					loadCSS : document.URL.substr(0,document.URL.lastIndexOf('/')) + "/css/bootstrap.min.css",
					header : `<h4>Gatelogs Report</h4>
							</br>
							<p>Date Range : `+ $("input[name=txtDateFrom]").val() +` - `+ $("input[name=txtDateTo]").val() +`</p>`
				});
			}
			else{
				msgPopUp("Nothing to print...", "Please generate records to print first", "warning");
			}
		});


		$("#frmSearch").submit(function(event){
			event.preventDefault();
			let url = "API/Gatelogs/SearchGateLogs.php";
			let data = $(this).serialize();
			$.post(url, data, function(res){
				$("#lblResultCount").html(res.length);
				let $tbl = $("#tblList tbody");
				$tbl.html("");
				$.each(res, function(indx, value){
					$tbl.append(	`<tr>
										<td>`+ (value.QRCode == null ? `` : value.QRCode) +`</td>
										<td>`+ (value.LogDetails == null ? `` : value.LogDetails) +`</td>
										<td>`+ (value.TypeOfDetail == null ? `` : value.TypeOfDetail) +`</td>
										<td>`+ (value.HouseHold == null ? `` : value.HouseHold) +`</td>
										<td>${(value.HouseNo == null ? `` : value.HouseNo) + ', ' + (value.BlockNo == null ? `` : value.BlockNo) + ', ' +  (value.Street == null ? `` : value.Street)}</td>
										<td>`+ (value.LogType == null ? `` : value.LogType) +`</td>
										<td>`+ (value.ScannedBy == null ? `` : value.ScannedBy) +`</td>
										<td>`+ (value.CreatedDateTime == null ? `` : value.CreatedDateTime) +`</td>
										<td>`+ (value.ScannedByPosition == null ? `` : value.ScannedByPosition) +`</td>
									</tr>`);
				});
			}, 'json')
			.fail( function(xhr, status, message){
				msgPopUp("Error has occured", message, "danger");
			});
		});
	});
</script>