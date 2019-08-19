 <?php
if (isset($_GET['gen']))
{
    $SD = $_GET['SD'];
    $ED = $_GET['ED'];
    $Company = $_GET['Company'];
?>
<html>
	<head>
		<title>VXI SUMMARY RESULTS</title>
		<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="../source/CDN/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/jszip.min.js"></script>
		<script type="text/javascript" src="../source/CDN/pdfmake.min.js"></script>
		<script type="text/javascript" src="../source/CDN/vfs_fonts.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.html5.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.print.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.colVis.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
	</head>
<body>
<?php
include_once('qcsidebar.php');
?>
<div class="container" style="margin-top: 10px;">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
        				<th><center>DATE</center></th>
        				<th><center>DATE EMAILED</center></th>
        				<th><center>DATE RECEIVED HARDCOPY</center></th>
        				<th><center>DT SOFTCOPY</center></th>
        				<th><center>LOB</center></th>
        				<th><center>REMARKS</center></th>
        				<th><center>CLASS</center></th>
		                <th><center>LAST NAME</center></th>
		                <th><center>FIRST NAME</center></th>
		                <th><center>MIDDLE NAME</center></th>
		                <th><center>AGE</center></th>
		                <th><center>SEX</center></th>
		                <th><center>HT(ft)</center></th>
		                <th><center>WT(kg)</center></th>
		                <th><center>BP(mmHg)</center></th>
		                <th><center>VISUAL ACUITY</center></th>
		                <th><center>URINALYSIS</center></th>
		                <th><center>CBC</center></th>
		                <th><center>CHEST XRAY</center></th>
		                <th><center>DRUG TEST</center></th>
		                <th><center>ALV/SPOT VIEW</center></th>
						<th><center>MEDICAL HISTORY</center></th>
		                <th><center>PAST SURGICAL HISTORY</center></th>
		                <th><center>PHYSICAL EXAMINATION FINDINGS</center></th>
		                <th><center>RECOMMENDATIONS</center></th>
						
					</thead>
					<?php
					include_once('../summarycon.php');
					  $select = "SELECT * FROM qpd_patient f, lab_microscopy m, lab_hematology h, lab_toxicology s, qpd_class c, qpd_xray x, qpd_vital v, qpd_medhis d, qpd_pe p, qpd_trans t WHERE
                        f.PatientID=m.PatientID AND 
						f.PatientID=h.PatientID AND 
						f.PatientID=c.PatientID AND
						f.PatientID=v.PatientID AND
						f.PatientID=d.PatientID AND
						f.PatientID=p.PatientID AND 
						f.PatientID=t.PatientID AND 
						f.PatientID=x.PatientID AND 
						t.TransactionID=m.TransactionID AND 
						t.TransactionID=h.TransactionID AND
						t.TransactionID=s.TransactionID AND
						t.TransactionID=c.TransactionID AND
						t.TransactionID=v.TransactionID AND
						t.TransactionID=d.TransactionID AND 
						t.TransactionID=p.TransactionID AND
						t.TransactionID=x.TransactionID AND
                        t.TransactionDate >= '$SD' AND t.TransactionDate <='$ED' AND 
                        f.CompanyName LIKE '$Company%' ORDER BY f.LastName";

			           $result = mysqli_query($con, $select);
			           $i = 0;
			           while($row = mysqli_fetch_array($result))
			            {
			                $firnam = $row['FirstName'];
                $midnam = $row['MiddleName'];
                $lasnam = $row['LastName'];
                $date = $row['CreationDate'];
                $comnam = $row['CompanyName'];
                $age = $row['Age'];
                $gen = $row['Gender'];
                $connum = $row['ContactNo'];
                $CBCOt = $row['CBCOt'];
                $DT = $row['Drugtest'];
                $Meth = $row['Meth'];
                $Tetra = $row['Tetra'];
                $Preg = $row['PregTest'];
/*                $HBsAg = $row['HBsAg'];
                    if ($HBsAg == "NON-REACTIVE") 
                    {
                        $HBsAg1="NR";
                    }
                    else if ($HBsAg == "NONREACTIVE") 
                    {
                        $HBsAg1="NR";
                    }
                    else if ($HBsAg == "REACTIVE") 
                    {
                        $HBsAg1="R";
                    }
                    else
                    {
                        $HBsAg1 = "N/A";
                    }*/
                $FecMicro = $row['FecMicro'];
                if ($FecMicro == "NO INTESTINAL PARASITE SEEN") 
                    {
                        $FecMicro1="NIPS";
                    }
                    else if ($FecMicro == "Presence of:") 
                    {
                        $FecMicro1=$row['FecOt'];
                    }
                    else
                    {
                        $FecMicro1 = "NO SPECIMEN";
                    }
                $UriOt = $row['UriOt'];

                $xray = $row['Impression'];
                if ($xray == "NORMAL CHEST FINDINGS" || $xray == "CONSIDERED NORMAL CHEST PA")
                {
                    $xray1 = "NORMAL";
                }
                else if ($xray == "-NORMAL CHEST FINDINGS")
                {
                    $xray1 = "NORMAL";
                }
                else if ($xray == "")
                {
                    $xray1 = "NO XRAY";
                }
                else
                {
                    $xray1 = $row['Impression'];
                }

                $patclass = $row['MedicalClass'];
                $note = $row['Notes'];
                if ($patclass == "CLASS A - Physically Fit")
                {
                    $patclass1 = "Class A";
                    $patclass2 = "FIT TO WORK";
                }
                else if ($patclass == "CLASS B - Physically Fit but with minor condition curable within a short period of time, that will not adversely affect the workers efficiency")
                {
                    $patclass1 = "Class B";
                    $patclass2 = "FIT TO WORK";
                }
                else if ($patclass =="CLASS C - With abnormal findings generally not accepted for employment.") 
                {
                    $patclass1 = "Class C";
                    $patclass2 = "Unemployable";
                } 
                else if ($patclass =="CLASS D - Unemployable") 
                {
                    $patclass1 = "Class D";
                    $patclass2 = "Unemployable";
                }
                else
                {
                    $patclass1 = "PENDING";
                    $patclass2 = $note;
                }
                $ht = $row['height'];
                $wt = $row['weight'];
                $bp = $row['bp'];
                $lmp = $row['lmp'];
                $cv = $row['cv'];
                $uod = $row['uod'];
                $uos = $row['uos'];
                $cod = $row['cod'];
                $cos = $row['cos'];
                 if ($uod!="" && $uos!="") 
                {
                    $va = $uod;
                    $va1 = $uos;
                    $va2 = "UNCORRECTED";
                }
                else if ($cod!="" && $cos!="") 
                {
                    $va = $cod;
                    $va1 = $cos;
                    $va2 = "CORRECTED";
                }
                else
                {
                    $va = $cod + $uod;
                    $va1 = $cos + $uod;
                    $va2 = "";
                }

                $opr = $row['opr'];
                if ($opr == '' || $opr == '-')
                {
                	$opr1 = 'NONE';
                }
                else
                	$opr1=$opr;

                $rec = $row['Notes'];

                $findings1 = $row['Notes'];



                $asth = $row['asth'];
				$tb = $row['tb'];
				$dia = $row['dia'];
				$hb = $row['hb'];
				$hp = $row['hp'];
				$kp = $row['kp'];
				$ab = $row['ab'];
				$jbs = $row['jbs'];
				$pp = $row['pp'];
				$mh = $row['mh'];
				$fs = $row['fs'];
				$alle = $row['alle'];
				$ct = $row['ct'];
				$hep = $row['hep'];
				$std = $row['std'];

				$a=array();

				if($asth == "YES")
                {
                    array_push($a, "ASTHMA");          
                }
                if($tb == "YES")
                {
                    array_push($a, "TUBERCOLOSIS");          
                }
                if($dia == "YES")
                {
                    array_push($a, "DIABETES");          
                }
                if($hb == "YES")
                {
                    array_push($a, "HIGH BLOOD PRESSURE");          
                }
                if($hp == "YES")
                {
                    array_push($a, "HEART PROBLEM");          
                }
                if($kp == "YES")
                {
                    array_push($a, "KIDNEY PROBLEM");          
                }
                if($ab == "YES")
                {
                    array_push($a, "ABDOMINAL/HERNIA");          
                }
                if($jbs == "YES")
                {
                    array_push($a, "JOINT/BACK/SCOLIOSIS");          
                }
                if($pp == "YES")
                {
                    array_push($a, "PSYCHIATRIC PROBLEM");          
                }
                if($mh == "YES")
                {
                    array_push($a, "MIGRAINE/HEADACHE");          
                }
                if($fs == "YES")
                {
                    array_push($a, "FAINTING/SEIZURE");          
                }
                if($alle == "YES")
                {
                    array_push($a, "ALLERGIES");          
                }
                if($ct == "YES")
                {
                    array_push($a, "CANCER/TUMOR");          
                }
                if($hep == "YES")
                {
                    array_push($a, "HEPATITIS");          
                }
                if($std == "YES")
                {
                    array_push($a, "STD");          
                }
                if(empty($a))
                {
                    array_push($a, "NONE");          
                }




                $medhis = implode(", ", $a);


			        $i++;


					 ?>
					<tr>
						<td ><?php echo $date ?></td>
		                <td ></td>
		                <td ></td>
		                <td ></td>
		                <td ></td>
		                <td ><?php echo $patclass2 ?></td>
		                <td ><?php echo $patclass1 ?></td>
		                <td ><?php echo $lasnam ?></td>
		                <td ><?php echo $firnam ?></td>
		                <td ><?php echo $midnam ?></td>
		                <td ><?php echo $age ?></td>
		                <td ><?php echo $gen ?></td>
		                <td ><?php echo $ht ?></td>
		                <td ><?php echo $wt ?></td>
		                <td ><?php echo $bp ?></td>
		                <td ><?php echo $va ?>,<?php echo $va1 ?> --  (<?php echo $va2 ?>) </td></td>
		                <td ><?php echo $UriOt ?></td>
		                <td ><?php echo $CBCOt ?></td>
		               	<td ><?php echo $xray1 ?></td>
		                <td >Meth: <?php echo $Meth ?> Tetra: <?php echo $Tetra ?></td>
		                <td >NONE</td>
		                <td ><?php echo $medhis ?></td>
		                <td ><?php echo $opr1 ?></td>
		                <td ><?php echo $findings1 ?></td>
		                <td ><?php echo $rec ?></td>

							

					</tr>
					<?php  } } 	?> 
    </table>
</div>


<script>
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       500,
        scrollCollapse: true,
        "scrollX": true,
        paging:         false,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );	
</script>	
</body>
</html> 