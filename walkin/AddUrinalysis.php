<?php
	$ucArray =  array(
				array("pH", array("5.0","6.0","7.0","8.0","9.0")),
				array("Specific Gravity", array("1.000","1.005","1.010","1.015","1.020","1.025","1.030")),
				array("Protein", array("NEGATIVE","TRACE","1+","2+","3+","4+")),
				array("Glucose", array("NEGATIVE","TRACE","1+","2+","3+","4+")),
				array("Leukocyte Esterase", array("NEGATIVE","TRACE","1+","2+","3+","4+")),
				array("Nitrite", array("NEGATIVE","TRACE","1+","2+","3+","4+")),
				array("Urobilinogen", array("NEGATIVE","TRACE","1+","2+","3+","4+"),"mg/dl","0.2~0.9 mg/dl"),
				array("Blood", array("NEGATIVE","TRACE","1+","2+","3+","4+")),
				array("Ketone", array("NEGATIVE","TRACE","1+","2+","3+","4+")),
				array("Bilirubin", array("NEGATIVE","TRACE","1+","2+","3+","4+")),
				);
	$micArray = array(
				array("RBC","","/hpf","0-3"),
				array("WBC","","/hpf","0-5"),
				array("Epithelial Cells",array("","RARE","FEW","MODERATE","MANY")),
				array("Bacteria",array("","RARE","FEW","MODERATE","MANY")),
				array("M. Thread",array("","RARE","FEW","MODERATE","MANY")),
				array("Amorphous",array("","RARE","FEW","MODERATE","MANY")),
				array("Parasite",array("","RARE","FEW","MODERATE","MANY")),
				array("Pus clump/s",array("","RARE","FEW","MODERATE","MANY")),
				array("Pus cast",array("","RARE","FEW","MODERATE","MANY")),
				array("Red cell cast",array("","RARE","FEW","MODERATE","MANY")),
				array("Hyaline cast",array("","RARE","FEW","MODERATE","MANY")),
				array("Fine granular cast",array("","RARE","FEW","MODERATE","MANY")),
				array("Coarse granular cast",array("","RARE","FEW","MODERATE","MANY")),
				array("Red cell Clump/s",array("","RARE","FEW","MODERATE","MANY")),
				);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.inStyle{
		padding: 3px;
		padding-right: 5px;
		padding-left:5px;
		width: 200px;
		border-radius: 2px;
		cursor: pointer;
		height: 30px;
		margin: 2px;
		border: none;
		background-color: #2980b9;
	}
	.inStyle option{
		font-size: 13px;
	}
	.titleStyle{
		font-weight: bold;		
		margin-left: -10px; 
		font-size: 20px
	}
</style>
<body>
	<div class="container-fluid ">
		<form id="form" method="post">
		<div class="row">
			<div class="col titleStyle">
				Physical Microscopic
			</div>
		</div>
		<div class="row">
			<div class="col-3">Color</div>
			<div class="col-3">
				<select class="inStyle" style="font-size: 15px;color:white" name="Color">
					<option value="STRAW">STRAW</option>
					<option value="LIGHT YELLOW">LIGHT YELLOW</option>
					<option value="YELLOW">YELLOW</option>
					<option value="DARK YELLOW">DARK YELLOW</option>
					<option value="RED">RED</option>
					<option value="ORANGE">ORANGE</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-3">Transparency</div>
			<div class="col-3">
				<select class="inStyle" style="font-size: 15px;color:white" name="Transparency">
					<option value="CLEAR">CLEAR</option>
					<option value="HAZY">HAZY</option>
					<option value="SLIGHTLY TURBID">SLIGHTLY TURBID</option>
					<option value="TURBID">TURBID</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col titleStyle">
				Urine Chemical
			</div>
		</div>
		<?php for ($i=0; $i < count($ucArray); $i++) { 	
		?>
		<div class="row">
			<div class="col-3"><?php echo $ucArray[$i][0]?></div>
			<div class="col-3">
				<select class="inStyle" style="font-size: 15px;color:white" name="<?php echo $ucArray[$i][0]?>">
					<?php for ($y=0; $y < count($ucArray[$i][1]); $y++) { 
						
					?>
					<option value="<?php echo $ucArray[$i][1][$y]?>"><?php echo $ucArray[$i][1][$y]?></option>
					<?php } ?>
				</select>
			</div>
			<?php if(isset($ucArray[$i][2])){ ?>
				<div class="col-5"><?php echo $ucArray[$i][2]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ucArray[$i][3]?></div>
			<?php } ?>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col titleStyle">
				Microscopic
			</div>
		</div>
		<div class="row">
		<?php for ($x=0; $x < count($micArray); $x++) { ?>
			
			<div class="col-3"><?php echo $micArray[$x][0]?></div>
			<div class="col-3">
				<?php if(is_array($micArray[$x][1])){ ?>
				<select class="inStyle" style="font-size: 15px;color:white" name="<?php echo $micArray[$x][0]?>">
					<?php for ($y=0; $y < count($micArray[$x][1]); $y++) { 
						
					?>
					<option value="<?php echo $micArray[$i][1][$y]?>" style="font-size: 15px;color:white"><?php echo $micArray[$x][1][$y]?></option>
					<?php } ?>
				</select>
				<?php } else{?>
					<input type="text" name="<?php echo $micArray[$x][0]?>" class="inStyle"style="font-size: 15px;color:white" > 
				<?php } ?>
			</div>
			<?php if(isset($micArray[$x][2])){ ?>
				<div class="col-5"><?php echo $micArray[$x][2]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $micArray[$x][3]?></div>
			<?php } ?>
		
		<?php } ?>
		</div>
			<div class="form-group row mt-3">
				<div class="col">
	            	<input type="text" name="Clinician" class="form-control" placeholder="Clinician/Walk-In">
	            </div>
	            <div class="col">
	            	<input type="text" name="Received" class="form-control" value ='' placeholder=" Medical Technologist">
	            </div>
	            <div class="col">
	            	<input type="text" name="qc" class="form-control" value ='' placeholder=" Quality Control">
	            </div>
	            <div class="col">
	            	<input type="text" name="Pathologist" class="form-control" value="Emiliano Dela Cruz,MD">
	            </div>
			</div>
			<div class="form-group row">
				<div class="col">
	            	
	            </div>
	            <div class="col">
	            	<input type="text" name="RMTLIC" class="form-control" value ='' placeholder=" Medical Technologist License">
	            </div>
	            <div class="col">
	            	<input type="text" name="QCLIC" class="form-control" value ='' placeholder="Quality Control License">
	            </div>
	            <div class="col">
	            	<input type="text" name="PATHLIC" class="form-control" value="0073345" placeholder="Pathologist License">
	            </div>
			</div>
			<div class="form-group row">
				<div class="col" style="font-weight: bold; padding-top: 0px;"><center>Clinician/Walk-In</center></div>
	            <div class="col" style="font-weight: bold; padding-top: 0px;"><center>Medical Technologist</center></div>
	            <div class="col" style="font-weight: bold; padding-top: 0px;"><center>Quality Control</center></div>
	            <div class="col" style="font-weight: bold; padding-top: 0px;"><center>Pathologist</center></div>
			</div>

			<center><input type="submit" class="btn btn-primary mt-3" value="SUBMIT" style="cursor: pointer" id="submit"></center>
			</form>
			<div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Modal Header</h4>
			        </div>
			        <div class="modal-body">
			          <p>Some text in the modal.</p>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
			 </div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").click(function(e){
			e.preventDefault();
			var formData = $("#form").serialize();
			alert(formData);

		});
	});	
</script>
</html>