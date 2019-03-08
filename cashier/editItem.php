<?php
include "../connection.php";
include "../classes/pack.php";
$pack = new pack;
$id = $_POST['id'];
$item = $pack->fetch_data($id);
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
        <h5 class="modal-title">EDIT ITEM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div>
       		<input type="hidden" name="" id="ItemID" value="<?php echo $id ?>">
       		<label for="itemName" >Item Name</label>
       		<input type="text" name="itemName" class="form-control" id="itemName" value="<?php echo $item['ItemName']?>">
       	</div>
       	<div>
       		<label for="itemDesc" >Item Description</label>
       		<input type="text" name="itemDesc" class="form-control" id="itemDesc" value="<?php echo $item['ItemDescription']?>">
       	</div>
       	<div>
       		<label for="itemPrice" >Item Price</label>
       		<input type="text" name="itemPrice" class="form-control" id="itemPrice" value="<?php echo $item['ItemPrice']?>">
       	</div>
       	<div>
       		<label for="itemType" >Item Type</label>
       		<input type="text" name="itemType" class="form-control" id="itemType" value="<?php echo $item['ItemType']?>">
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
			var id = $("#ItemID").val();
			var name = $("#itemName").val();
			var desc = $("#itemDesc").val();
			var price = $("#itemPrice").val();
			var type = $('#itemType').val();
			$.post('UpdateItem.php',{id:id,name:name,desc:desc,price:price,type:type},function(){
				alert("Edited Successfully");
				location.reload();
			});
		});
	});
</script>