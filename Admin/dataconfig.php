<?php
include_once('../connection.php');
include_once('../classes/pack.php');
if (!isset($_SESSION)) {
   session_start();
}
  require_once '../class.user.php';
  $user = new USER;
  $user->bypass('Admin');

$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$pack = new pack;
$pack = $pack->fetchAll();

	$itemcheck = array("U/A","Chest PA", "F/A", "P.E", "CBC", "Drug Test", "Pregnancy Test", "HBsAg", "Lipid Profile", "FBS");
	$packtest = array("XRay", "Blood", "Specimen", "PE");
?>
<script type="text/javascript" src="../source/jquery-confirm.min.js"></script>
<link rel="stylesheet" type="text/css" href="../source/jquery-confirm.min.css">


<div class="container-fluid">
	<div class="row">
		
		<div class="col-12">
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Item</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="row">
                  		<div class="col-12">
                  			<span><b>Items: </b></span>
                  		<?php 
						$cnum = 0;
						foreach ($itemcheck as $check) {
						 ?>						
						  
						    <input type="checkbox" class="checkboxes " id="<?php echo 'cid'.$cnum ?>" value="<?php echo $check ?>">
						    <label for="<?php echo 'cid'.$cnum ?>" class="badge badge-dark text-light" style="cursor: pointer;font-size: 12px;">
						        <?php echo $check." " ?>
						    </label>
						  
						<?php $cnum++; } ?>
                  		</div>
                  		<label class="checkbox" for="checkbox1">
                        <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
                        Unchecked
                      </label>
                  	</div>
                  	<div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Name</label>
                          <input type="" name="txtItemName" required="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Description</label>
                          <input type="" name="txtItemDescription" required="" class="form-control" id="itemdesc">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="" name="txtItemPrice" required="" class="form-control">
                        </div>
                      </div>
                    </div>
                </div>
              </div>
		</div>
		<div class="col-12">
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Item</h4>
                  <p class="card-category">List of Items</p>
                </div>
                <div class="card-body">
                  	<div class="row">
                  		<div class="col-12">
                  		
                  		</div>
                  	</div>
                </div>
              </div>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Company</h4>
                  <p class="card-category">Complete Company Profile</p>
                </div>
                <div class="card-body">
                  <form> 
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <input type="text" class="form-control" name="comname" id="comname">
                        </div>
                      </div>
                    </div>                
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address ( Optional )</label>
                          <input type="text" class="form-control" name="comadd" id="comadd">
                        </div>
                      </div>
                    </div>                                 
                    <button type="submit" class="btn btn-primary float-right" id="addcompany">Add Company</button>                   
                  </form>
                </div>
              </div>
		</div>
		<div class="col-6">
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Company</h4>
                  <p class="card-category">List of Company</p>
                </div>
                <div class="card-body">
                  
                </div>
              </div>
		</div>
	</div>
	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#addcompany").click(function(e){
			e.preventDefault();
			var companyName = $("#comname").val();
			var companyAdd = $("#comadd").val();
			
		    $.confirm({
		        title: "Add Company",
		        content: "Are you Sure?",
		        theme: 'modern',
		        buttons: {
		          cancel: {
		            text: 'Cancel',
		            btnClass: 'btn-danger',
		            action: function(){
		              
		            }
		          },
		          yes: {
		            text: 'Yes',
		            btnClass: 'btn-primary',
		            action: function(){
		            	$.post("DataConfig/addCompany.php",{name: companyName, address: companyAdd}, function(data){		  
		            		$.alert({		            			
		            			theme: "modern",
							    title: data.title,
							    content: data.text,
							    icon: data.icon,						
							});
							$("#dataconfig").trigger("click");
		            	},"json");		     
		            }
		           
		          }
		        }
		     });
		    
		});
	});
</script>