<?php
include "../connection.php";
include "../classes/trans.php";
$trans = new trans;
$id = $_POST['id'];
$data = $trans->fetch_trans($id);
?>
<style type="text/css">
	label{
		font-weight: bolder;
	}
	.modal-title{
		font-weight: bolder;
	}
</style>
<div class="modal fade" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">EDIT HMO Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div>
       		<input type="hidden" name="" id="transID" value="<?php echo $id ?>">
       		<label for="itemName" >Date</label>
       		<input type="text" name="tdate" class="form-control" id="tdate" value="<?php echo $data['TransactionDate']?>">
       	</div>
       	<div>
       		<label for="itemDesc" >AC</label>
       		<input type="text" name="AC" class="form-control" id="AC" value="<?php echo $data['AC']?>">
       	</div>
       	<div>
       		<label for="itemPrice" >AN</label>
       		<input type="text" name="AN" class="form-control" id="AN" value="<?php echo $data['AN']?>">
       	</div>
       	<div>
       		<label for="itemType" >LOE</label>
       		<input type="text" name="LOE" class="form-control" id="LOE" value="<?php echo $data['LOE']?>">
       	</div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#saveChanges").click(function(){
			var tdate = $("#tdate").val();
			var AC = $("#AC").val();
			var AN = $("#AN").val();
			var LOE = $("#LOE").val();
			var id = $('#transID').val();
			$.post('UpdateHMO.php',{id:id,tdate:tdate,AC:AC,AN:AN,LOE:LOE},function(e){
				alert("Edited Successfully");
				location.reload();
			});
		});
	});
</script>