<?php
include_once("classes.php");
include_once("dbConnect.php");
include_once('../classes/trans.php');
include_once('../classes/rad.php');
$rad = new rad;
$trans = new trans;
$patients = $trans->fetch_all();
?>
<html>
	<head>
		<title>Radiology Report</title>
	</head>
<body>
<style type="text/css">
	.tablebtn{
		width: 70px;
		padding: 10px;
	}
	
</style>
<div class="container" >
<div class="card">
<div class="card-header card-header-primary">
  <h4 class="card-title">Radiology Report</h4>  
</div>
<div class="card-body">

	<table id="example" class="table table-striped " cellspacing="0" width="100%">
	               <thead>
                    	<th nowrap>Transaction No.<button style="display: none" id="trigbtn"></button></th>
                    	<!-- <th>Patient ID</th> -->
                    	<th nowrap>Transaction Date</th>
						<th>Company Name</th>
						<th nowrap>Patient Name</th>
						<th>Action</th>
					</thead>
					<?php foreach  ($patients as $patient) {  
						$havexray = 0;
						// $items = $trans->each_item($patient['ItemID']);
						// foreach ($items as $item) {
						// 	$xcount = $trans->itemXray($item['ItemID']);
						// 	$havexray = $xcount + $havexray;

						// }
						// if ($havexray > 0 ) {
							//echo $havexray;
						
					?>
						
					<tr>
							<td>
								<?php echo $patient['TransactionID']?>
							</td>
							<!-- <td>
								<?php echo $patient['PatientID']?>
							</td> -->
							<td>
								<?php echo $patient['TransactionDate']?>
							</td>
							<td>
								<?php echo $patient['CompanyName']?>
							</td>	
							<td nowrap>
								<?php echo $patient['LastName']?>, <?php echo $patient['FirstName']?> <?php echo $patient['MiddleName']?> 
							</td>
							<td >
							<?php 
								if ($rad->checkXray($patient['PatientID'], $patient['TransactionID'])) {
									# code...
								
							?> 
								<button type="button" class="btn btn-info tablebtn" onclick="document.location = 'xray/XRayVIEW.php?id=<?php echo $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>';">VIEW</button>
							<?php }else{ ?>
								<button type="button" class="btn btn-primary tablebtn" onclick="document.location = 'xray/XRayADD1.php?id=<?php echo $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>';">ADD</button>
							<?php } ?>
							</td>

					</tr>
	<?php   }	?> 
    </table>
</div>
</div>
</div>

<div class="modal fade" id="marker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Print Markers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="xray/sticker.php" method="get" target="_blank">
      <div class="modal-body form-group container">
	      <div class="row">
	      	<div class="col-1"></div>
	      <div class="col-5 pt-3">
	      	<b>Trasaction ID's Range:</b>
	      </div>
	      <div class="col-2">
	        <div class="form-group">
	          <label class="bmd-label-floating">From</label>
	          <input type="text" name="from" id="from" class="form-control" required>
	        </div>
	      </div>
	    <div class="col-1 pt-3"> - </div>
	      <div class="col-2">
		        <div class="form-group">
		          <label class="bmd-label-floating">To</label>
		          <input type="text" name="to" id="to" class="form-control" required>
		        </div>
	      	</div>
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Print</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {
   var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       700,
        scrollCollapse: true,
        "scrollX": true,
        paging: true,
        buttons: ['excel', 'pdf', { 
            text: 'Print Markers',
            className: 'btn-primary',
                action: function () {
                   $('#marker').modal('toggle');
                }
            }
            ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );


} );	
</script>	
</body>
</html> 