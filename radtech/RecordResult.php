<?php 
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/qc.php');
include_once('../classes/rad.php');
include_once('../classes/lab.php');
include_once('../classes/pe.php');
include_once('../classes/vital.php');
include_once('../classes/medhis.php');
include_once('../classes/patient.php');
$patient = new Patient;
$tran = new trans;
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$data = $patient->fetch_data($id);
	$trans = $tran->Patient_Trans($id);
	$tid = $tran->RecentTransID($id);
	$tid =$_POST['tid'];
$His = new His;
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$his = $His->fetch_data($id, $tid);
$vital = new vital;
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$vit = $vital->fetch_data($id, $tid);
$pe = new pe;
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$pe = $pe->fetch_data($id, $tid);
$lab = new lab;
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$lab = $lab->fetch_data($id, $tid);
$rad = new rad;
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$rad = $rad->fetch_data($id, $tid);
$qc = new qc;
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$qc = $qc->fetch_data($id, $tid);
?>
<div class="container">
<div class="row">
<div class="col-md-12 ">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Laboratory Results</b></center></div>
            <div class="card-block">
            	<!-- CBC -->
            	
            	<div class="row">
	            	<div class="col">
	            		<b>HEMATOLOGY</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col-3">
	            		<b>Complete Blood Count</b>
	            	</div>
	            	<div class="col-2">
	            		
	            	</div>
	            	<div class="col-2">
	            		
	            	</div>
	            	<div class="col-2 ">
	            		<b>Normal Range</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="WhiteBlood" class="col-3 col-form-label text-right">White Blood Cells :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['WhiteBlood'] ?></b>
	            	</div>
	            	<label for="WhiteBlood" class="col-2 col-form-label">x10^9/L</label>
	            	<label for="WhiteBlood" class="col-2 col-form-label">4.23-11.07</label>
				</div>
				<div class="form-group row">
	            	<label for="Hemoglobin" class="col-3 col-form-label text-right">Hemoglobin :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Hemoglobin'] ?></b>
	            	</div>
	            	<label for="Hemoglobin" class="col-2 col-form-label">g/L</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['HemoNR'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Hematocrit" class="col-3 col-form-label text-right">Hematocrit :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Hematocrit'] ?></b>
	            	</div>
	            	<label for="Hematocrit" class="col-2 col-form-label">VF</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['HemaNR'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>Differential Count</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Neutrophils" class="col-3 col-form-label text-right">Neutrophils :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Neutrophils'] ?></b>
	            	</div>
	            	<label for="Neutrophils" class="col-2 col-form-label">%</label>
	            	<label for="Neutrophils" class="col-2 col-form-label">34-71</label>
				</div>
				<div class="form-group row">
	            	<label for="Lymphocytes" class="col-3 col-form-label text-right">Lymphocytes :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Lymphocytes'] ?></b>
	            	</div>
	            	<label for="Lymphocytes" class="col-2 col-form-label">%</label>
	            	<label for="Lymphocytes" class="col-2 col-form-label">22-53</label>
				</div>
				<div class="form-group row">
	            	<label for="Monocytes" class="col-3 col-form-label text-right">Monocytes :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Monocytes'] ?></b>
	            	</div>
	            	<label for="Monocytes" class="col-2 col-form-label">%</label>
	            	<label for="Monocytes" class="col-2 col-form-label">5-12</label>
				</div>
				<div class="form-group row">
	            	<label for="CBCOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['CBCOt'] ?></b>
	            	</div>
				</div>
<!-- U/A -->	
				<div class="row">
	            	<div class="col-3 ">
	            		<b>CLINICAL MICROSCOPY</b>
	            	</div>
				</div>
				<div class="row">
	            	<div class="col-3 ">
	            		<b>Complete Urinalysis</b>
	            	</div>
				</div>
				<div class="row">
	            	<div class="col-3 ">
	            		<b>Physical/Chemical</b>
	            	</div>
	            	<div class="col-3 "></div>
	            	<div class="col-2 ">
	            		<b>Microscopic</b>
	            	</div>
	            	<div class="col-2 "></div>
	            	<div class="col-2 ">
	            		<b>Normal Range</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriColor" class="col-3 col-form-label text-right">Color :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriColor'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-3 col-form-label text-right">RBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $lab['RBC'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="RBC" class="col-2 col-form-label">0-3</label>
				</div>
				<div class="form-group row">
	            	<label for="UriTrans" class="col-3 col-form-label text-right">Transparency :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriTrans'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-3 col-form-label text-right">WBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $lab['WBC'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="WBC" class="col-2 col-form-label">0-5</label>
				</div>
				<div class="form-group row">
	            	<label for="UriPh" class="col-3 col-form-label text-right">pH :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriPh'] ?></b>
	            	</div>
	            	<label for="ECells" class="col-3 col-form-label text-right">E.Cells:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['ECells'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriSp" class="col-3 col-form-label text-right">Sp. Gravity :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriSp'] ?></b>
	            	</div>
	            	<label for="Mthreads" class="col-3 col-form-label text-right">M.Threads:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['MThreads'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPro" class="col-3 col-form-label text-right">Protein :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriPro'] ?></b>
	            	</div>
	            	<label for="Bac" class="col-3 col-form-label text-right">Bacteria:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Bac'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriGlu" class="col-3 col-form-label text-right">Glucose :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriGlu'] ?></b>
	            	</div>
	            	<label for="Amorph" class="col-3 col-form-label text-right">Amorphous:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Amorph'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriOt'] ?></b>
	            	</div>

	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['CoAx'] ?></b>
	            	</div>
				</div>


<!-- Drug Test -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>DRUG SCREENING</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Meth" class="col-3 col-form-label text-right">METHAMPHETHAMINE:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Meth'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Tetra" class="col-3 col-form-label text-right">TETRAHYDROCANABINOL:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Tetra'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="DT" class="col-3 col-form-label text-right">DT RESULT:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['DT'] ?></b>
	            	</div>
				</div>
<!-- Serology -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>SEROLOGY</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="HBsAg" class="col-3 col-form-label text-right">HBsAg:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['HBsAg'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="PregTest" class="col-3 col-form-label text-right">PREGNANCY TEST:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['PregTest'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="SeroOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['SeroOt'] ?></b>
	            	</div>
				</div>
<!-- FECALYSIS -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>FECALYSIS</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecColor" class="col-3 col-form-label text-right">Color:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['FecColor'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['FecCon'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['FecMicro'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['FecOt'] ?></b>
	            	</div>
				</div>
				<div class="form-group row"><hr></div>

				<div class="form-group row">
	            	<div class="col">
	            		<center><b><?php echo $lab['Received'] ?></b></center>
	            	</div>
	            	<div class="col">
	            		<center><b><?php echo $qc['QC'] ?></b></center>

	            	</div>
	            	<div class="col">
	            		<center><b><?php echo $lab['Printed'] ?></b></center>
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col">
	            		<center>Medical Technologist</center>
	            	</div>
	            	<div class="col">
	            		<center>Quality Control</center>
	            	</div>
	            	<div class="col">
	            		<center>Pathologist</center>
	            	</div>
				</div>
            </div>
        </div>
    </div>
</div>

<?php }}}}}}} ?>