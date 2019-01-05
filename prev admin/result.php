
<?php
include_once('connection.php');
include_once('classes/patient.php');
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Result Form</title>

<link rel="stylesheet" media="all" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<style type="text/css" media="all">
.form-control{
	margin-bottom: 10px;
	width:350px;
}

</style>
<body >
<?php
include_once('sidebar.php');
?>

<form action="submitresult.php" method="post" autocomplete="off" enctype="multipart/form-data">
<div class="container">
<center><h3><b>ADD PATIENT RESULT</b></h3></center><br>
<div class="col-sm-12 col-sm-offset-0">
	<div class="panel panel-info" style="border-radius: 0px;">
		<div class="panel-heading">
			<b>Patient Information</b>
		</div>
			<div class="panel-body">
				<div class="form-group">
				<div class="col-sm-12 ">
					<div class="col-sm-3 " style="padding-left: 0px">
					<label>Firstname: </label><br>
					<div class="col-sm-12 " style="padding-left: 0px"><input type="text" class="hidden" name="firnam" value="<?php echo $data['firnam'] ?>"><?php echo $data['firnam'] ?></div>
					</div>
					<div class="col-sm-3 " style="padding-left: 0px">
					<label>Middlename: </label><br>
					<div class="col-sm-12 " style="padding-left: 0px"><input type="text" class="hidden" name="midnam" value="<?php echo $data['midnam'] ?>"><?php echo $data['midnam'] ?></div>
					</div>
					<div class="col-sm-3 " style="padding-left: 0px">
					<label>Lastname: </label><br>
					<div class="col-sm-12 " style="padding-left: 0px"><input type="text" class="hidden"  name="lasnam" value="<?php echo $data['lasnam'] ?>"><?php echo $data['lasnam'] ?></div>
					</div>
					<div class="col-sm-3 " style="padding-left: 0px">
					<label>Company Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Patient Code: </label><br>
					<div class="col-sm-6 " style="padding-left: 0px"><input type="text" class="hidden"  name="comnam" value="<?php echo $data['comnam'] ?>"><?php echo $data['comnam'] ?></div>
					<div class="col-sm-6 " style="padding-left: 0px"><input type="text" class="hidden"  name="Code" value="<?php echo $data['Code'] ?>"><?php echo $data['Code'] ?></div>
					</div>
					<input type="text" class="hidden"  name="id" value="<?php echo $data['id'] ?>">
				</div>
				</div>
			</div>
		</div>
</div>

<div class="col-sm-12 col-sm-offset-0">
	<div class="panel panel-info" style="border-radius: 0px;">
 		<div class="panel-heading"><b>Laboratory Sciences Result</b></div>
  		<div class="panel-body">
				<div class="form-group">
					<div class="col-sm-12 ">
				 	
				 	 <b>HEMATOLOGY</b><br>
				 	 Complete Blood Count

				 	 <div class="col-sm-12 ">
				 	 	<div class="col-sm-9 " style="padding-left: 0px">
				 	 		
				 	 	</div>
				 	 	<div class="col-sm-3 " style="padding-left: 15px">
				 	 		Normal Range<br>
				 	 	</div>
				 	 </div>

				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 250px">White Blood Cells : </div>
				 	 	<div class="col-sm-1 " style="padding-left: 0px"><input type="text" name="WhiteBlood" class="form-control" pattern=".{3,}"  onkeypress='validate(event)' maxlength="5"></div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">x10^9/L</div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">4.23-11.07</div>
				 	 </div>

				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 250px">Hemoglobin : </div>
				 	 	<div class="col-sm-1 " style="padding-left: 0px"><input type="text" name="Hemoglobin" class="form-control" pattern=".{3,}"  onkeypress='validate(event)' maxlength="3"></div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">g/L</div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">M:137-175</div>
				 	 </div>

				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 250px">Hematocrit : </div>
				 	 	<div class="col-sm-1 " style="padding-left: 0px"><input type="text" name="Hematocrit" class="form-control" pattern=".{3,}"  onkeypress='validate(event)' maxlength="5"></div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">VF</div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">M:0.40-0.51</div>
				 	 </div>

				 	 <br>Differential Count<br>
				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 250px">Neutrophils : </div>
				 	 	<div class="col-sm-1 " style="padding-left: 0px"><input type="text" name="Neutrophils" class="form-control" onkeypress='validate(event)' maxlength="3"></div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">%</div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">34-71</div>
				 	 </div>

				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 250px">Lymphocytes : </div>
				 	 	<div class="col-sm-1 " style="padding-left: 0px"><input type="text" name="Lymphocytes" class="form-control" onkeypress='validate(event)' maxlength="3"></div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">%</div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">22-53</div>
				 	 </div>

				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 250px">Monocytes : </div>
				 	 	<div class="col-sm-1 " style="padding-left: 0px"><input type="text" name="Monocytes" class="form-control" onkeypress='validate(event)' maxlength="3"></div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">%</div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">5-12</div>
				 	 </div>

				 	 <b>DRUG SCREENING</b><br>
				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">METHAMPHETHAMINE: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="Meth">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">TETRAHYDROCANABINOL: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="Tetra">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	  <b>SEROLOGY</b><br>
				 	   <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">HBsAg: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="HBsAg">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NON-REACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	 	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">PREGNANCY TEST: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="PregTest">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">POSITIVE</OPTION>
				 	 		<OPTION value="REACTIVE">NEGATIVE</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>
<!-- FECALYSIS -->
				 	   <b>FECALYSIS</b><br>
				 	   <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">COLOR: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="FecColor">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="BROWN">BROWN</OPTION>
				 	 		<OPTION value="LIGHT BROWN">LIGHT BROWN</OPTION>
				 	 		<OPTION value="DARK BROWN">DARK BROWN</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	 	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">CONSISTENCY: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="FecCon">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="FORMED">FORMED</OPTION>
				 	 		<OPTION value="SEMI-FORMED">SEMI-FORMED</OPTION>
				 	 		<OPTION value="SOFT">SOFT</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">MICROSCOPIC FINDINGS: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="FecMicro">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONE">NO INTESTINAL PARASITE SEEN</OPTION>
				 	 		
				 	 		
				 	 	</SELECT>
				 	 	</div>
				 	 </div>
<!-- URINE -->
				 	 	<b>CLINICAL MICROSCOPY</b><br>
				 	 	<b>Complete Urinalysis</b><br>
				 	 	Physical/Chemical<br>
				 	   <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">Color: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="UriColor">
				 	 		<OPTION ></OPTION>
				 	 		<OPTION value="STRAW">STRAW</OPTION>
				 	 		<OPTION value="LIGHT YELLOW">LIGHT YELLOW</OPTION>
				 	 		<OPTION value="YELLOW">YELLOW</OPTION>
				 	 		<OPTION value="DARK YELLOW">DARK YELLOW</OPTION>
				 	 		<OPTION value="RED">RED</OPTION>
				 	 		<OPTION value="ORANGE">ORANGE</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>


				 	 	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">Transparency: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="UriTrans">
				 	 		<OPTION ></OPTION>
				 	 		<OPTION value="CLEAR">CLEAR</OPTION>
				 	 		<OPTION value="HAZY">HAZY</OPTION>
				 	 		<OPTION value="SL. TURBID">SL. TURBID</OPTION>
				 	 		<OPTION value="TURBID">TURBID</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>


				 	 	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">pH: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="UriPh">
				 	 		<OPTION ></OPTION>
				 	 		<OPTION value="5.0">5.0</OPTION>
				 	 		<OPTION value="6.0">6.0</OPTION>
				 	 		<OPTION value="6.5">6.5</OPTION>
				 	 		<OPTION value="7.0">7.0</OPTION>
				 	 		<OPTION value="7.5">7.5</OPTION>
				 	 		<OPTION value="8.0">8.0</OPTION>
				 	 		<OPTION value="8.5">8.5</OPTION>
				 	 		<OPTION value="9.0">9.0</OPTION>
				 	 		<OPTION value="9.5">9.5</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	 	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">Sp. Gravity: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="UriSp">
				 	 		<OPTION ></OPTION>
				 	 		<OPTION value="1.000">1.000</OPTION>
				 	 		<OPTION value="1.005">1.005</OPTION>
				 	 		<OPTION value="1.010">1.010</OPTION>
				 	 		<OPTION value="1.015">1.015</OPTION>
				 	 		<OPTION value="1.020">1.020</OPTION>
				 	 		<OPTION value="1.025">1.025</OPTION>
				 	 		<OPTION value="1.030">1.030</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	  	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">Protein: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="UriPro">
				 	 		<OPTION ></OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	  	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">Glucose: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="UriGlu">
				 	 		<OPTION ></OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	 <div class="col-sm-12 ">
				 	 	<div class="col-sm-9 " style="padding-left: 0px">
				 	 		Microscopic<br>
				 	 	</div>
				 	 	<div class="col-sm-3 " style="padding-left: 15px">
				 	 		Normal Range<br>
				 	 	</div>
				 	 </div>

				 	
				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 250px">RBC : </div>
				 	 	<div class="col-sm-1 " style="padding-left: 0px"><input type="text" name="RBC" class="form-control" pattern=".{3,}"  onkeypress='validate(event)' maxlength="5"></div>
				 		<div class="col-sm-3 " style="padding-left: 25px">/hpf</div>
				 		<div class="col-sm-3 " style="padding-left: 25px">0-3</div>
				 	 </div>

				 	 <div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 250px">WBC : </div>
				 	 	<div class="col-sm-1 " style="padding-left: 0px"><input type="text" name="WBC" class="form-control" pattern=".{3,}"  onkeypress='validate(event)' maxlength="5"></div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">/hpf</div>
				 	 	<div class="col-sm-3 " style="padding-left: 25px">0-5</div>
				 	 </div>

				 	   	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">E. Cells: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="ECells">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 </div>

				 	 	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">M. threads: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="Mthreads">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 		</div>

				 		<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">Bacteria: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="Bac">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 	</div>

				 	 	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">Amorphous: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="Amorph">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
				 	 	</div>
				 	 	</div>

				 	 	<div class="col-sm-12 "> 										
				 	 	<div class="col-sm-5 " style="padding-left: 190px">CoAx: </div>
				 	 	<div class="col-sm-2 " style="padding-left: 0px">
				 	 	<SELECT class="form-control" name="CoAx">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
				 	 	</div>


				 	 </div>
					 <center><input type="submit" class="btn btn-success" value="SUBMIT" ></center>  
<?php } ?>
				 	 </form>
					</div>
				</div>
		</div>
	</div>

	
</div>
</div>

<script type="text/javascript">
  function validate(evt) 
  {
	  var theEvent = evt || window.event;
	  var key = theEvent.keyCode || theEvent.which;
	  key = String.fromCharCode( key );
	  var regex = /[0-9\-\.]/;
	  if( !regex.test(key) )
	  	{
	    theEvent.returnValue = false;
	    if(theEvent.preventDefault) theEvent.preventDefault();
  		}
	}
</script>
    
<script type="text/javascript">
	function validate_email(field,alerttxt)
    {
    	with(field)
        {
          apos=value.indexof("@");
          dotpos=value.lastIndexof(".");
          if(apos<1||dotpos-apos<2)
        	{
            	alert(alerttxt);return false;
        	}
        }
        else
        {
        	return true;
        }
    }
</script>				

							
</body>
</html>