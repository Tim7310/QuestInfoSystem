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
<style>
  input{
    border:none !important;
  }
</style>

<div class="container-fluid">
	<div class="row">
		
		<div class="col-12">
			<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Item</h4>
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
                            <span class="checkbox">
                              <input type="checkbox" class="checkboxes" id="<?php echo 'cid'.$cnum ?>" 
                              value="<?php echo $check ?>">
                              <label for="<?php echo 'cid'.$cnum ?>">
                                  <?php echo $check." " ?>
                              </label>
                            </span>
                          <?php $cnum++; } ?>
                  	</div>                 		
                  </div>
                  <form id="addItemForm" method="post">
                  	<div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Name</label>
                          <input type="" name="ItemName" required="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Item Description</label>
                          <input type="" name="ItemDescription" required="" class="form-control" id="itemdesc">
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="" name="ItemPrice" required="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">                                        
                            <select class="selectpicker " data-style="btn-info" title="Item Type" name="CashType" required>
                              <option value="CashIndustrial">CASH INDUSTRIAL</option>
                              <option value="CashLab" selected="">CASH LAB</option>
                              <option value="CashImaging">CASH IMAGING</option>
                              <option value="AccountIndustrial">ACCOUNT INDUSTRIAL</option>
                              <option value="AccountHMO">ACCOUNT HMO</option>
                            </select>                 
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <span style="font-weight: bolder">Test: &nbsp;&nbsp; </span>          
                        <?php 
                            foreach ($packtest as $check1) {
                             ?>                                       
                                <input type="checkbox" name="<?php echo $check1 ?>" value="<?php echo $check1 ?>" id="<?php echo $check1 ?>" style="" class="checkbox2">
                                <label for="<?php echo $check1 ?>" class="badge badge-info" style="cursor: pointer;">
                                    <?php echo $check1." " ?>
                                </label>                            
                          <?php } ?> 
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right" id="addItem" name="btnCreatePackage">
                    Add Item</button>
                    <button type="button" class="btn btn-info float-right" id="editItem">Edit Package</button>
                  </form>
                </div>
              </div>
		</div>
		<!-- <div class="col-12">
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
		</div> -->
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
<div id="postLoader"></div>
<script type="text/javascript" src="../source/jquery-confirm.min.js"></script>
<script type="text/javascript" src="../source/jquery.form.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    jQuery.validator.setDefaults({
      debug: true,
      success: "valid"
    });
    $(function () {
        $('select').selectpicker();
    });
		
		$("#addcompany").click(function(e){
			e.preventDefault();
			var companyName = $("#comname").val();
			var companyAdd = $("#comadd").val();
      if (companyName == "") {
        $.alert({
          theme: "modern", title: "Empty Field", content: "Please fill up required field",
        });
      }else{
			
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
		            			theme: "modern", title: data.title, content: data.text, icon: data.icon,						
							       });
							$("#dataconfig").trigger("click");
		            	},"json");		     
		            }
		           
		          }
		        }
		     });
        }
		});
    $(".checkbox input").click(function(){
      var descitem = [];
      $(".checkboxes").each(function(){     
        if($(this).prop("checked")){
          descitem.push($(this).val());       
        }
      });
      $("#itemdesc").val(descitem.join(", "));
      $("#itemdesc").keyup();
    });
//Add Item Script
$("#addItemForm").submit(function(e){
  e.preventDefault();
      var option = { 
          target: "#Postloader",
          dataType: "json",
          url:        'dataconfig/addItem.php', 
          success:    function(data) { 
              $.alert({ theme: "modern", title: data.title, content: data.text, icon: data.icon });
              $("#dataconfig").trigger("click");
          } 
        }; 
        $.confirm({
              title: "Add Item", content: "Are you Sure?", theme: 'modern',
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
                    $("#addItemForm").ajaxSubmit(option);         
                  }                
                }
              }
           }); 
 });       
// script End
      
    
	});
</script>