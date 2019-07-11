<?php
if (isset($_GET['gen']))
{
    $SD = $_GET['SD'];
    $ED = $_GET['ED'];
    $Company = $_GET['Company'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Summary Report</title>
    <!-- <link rel="stylesheet" media="all" type="text/css" href="../source/bootstrap3.3.7/css/bootstrap.min.css>"> -->
    <link href="../sorting/bootstrap.css" rel="stylesheet">
    <link href="../sorting/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../sorting/dataTables.responsive.css" rel="stylesheet">
</head>

<style type="text/css" media="all">
    .form-control
    {
        margin-bottom: 10px;
        width:300px;
    }


</style>
<body >
<div class="container-fluid">
<center><p style="font-family: 'Century Gothic'; font-size: 18px;"><b>Summary Report</b></p></center>
<center><p style="font-family: 'Century Gothic'; font-size: 20px;"><b><?php echo $Company;?></b></p></center><br>
<div class="col-sm-12" style="padding-left: 0px">
    <div class="dataTable_wrapper">
    <table class="table table-bordered" style="display: 100%; table-layout: auto; font-family:'Century Gothic'; ">
<?php
include_once('../summarycon.php');
if ($Company == 'DNATA' || $Company == 'DNATA TRAVEL INC') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>AGE</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>PREGNANCY TEST</center></th>
                <th><center>ISHIHARA</center></th>
                <th><center>DRUG TEST</center></th>
                <th><center>CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
                $select = "SELECT t.TransactionDate, f.LastName, f.FirstName, f.MiddleName, f.Age, x.Impression, m.UriOt,m.FecMicro, m.FecOt, m.PregTest, v.cv, s.Drugtest, c.MedicalClass, c.Notes, h.CBCOt FROM qpd_patient f, lab_microscopy m, lab_hematology h, lab_toxicology s, qpd_xray x, qpd_class c, qpd_vital v, qpd_trans t WHERE
                        f.PatientID=m.PatientID AND 
                        f.PatientID=h.PatientID AND
                        f.PatientID=s.PatientID AND 
                        f.PatientID=x.PatientID AND
                        f.PatientID=c.PatientID AND
                        f.PatientID=v.PatientID AND
                        f.PatientID=t.PatientID AND
                        t.TransactionID=m.TransactionID AND 
                        t.TransactionID=h.TransactionID AND 
                        t.TransactionID=s.TransactionID AND
                        t.TransactionID=x.TransactionID AND
                        t.TransactionID=c.TransactionID AND
                        t.TransactionID=v.TransactionID AND
                        t.TransactionDate >= '$SD' AND t.TransactionDate <='$ED' AND 
                        f.CompanyName LIKE '$Company%' ORDER BY f.LastName";

           $result = mysqli_query($con, $select);
           $i = 0;
           while($row = mysqli_fetch_array($result))
            {
                $firnam = $row['FirstName'];
                $midnam = $row['MiddleName'];
                $lasnam = $row['LastName'];
                $age = $row['Age'];
                $date = $row['TransactionDate'];
                $CBCOt = $row['CBCOt'];
                $DT = $row['Drugtest'];
                $Preg = $row['PregTest'];
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

                $cv = $row['cv'];

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td>$age</td>
                <td >$xray1</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$Preg</td>
                <td>$cv</td>
                <td nowrap>$DT</td>
                <td>$patclass1</td>
                <td nowrap>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If DNATA
else
    {
   echo "<thead>
            <tr>
            	<th><center>No.</center></th>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>DRUG TEST SCREENING</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
                           $select = "SELECT * FROM qpd_patient f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_trans t WHERE 
                        f.PatientID=l.PatientID AND 
                        f.PatientID=x.PatientID AND 
                        f.PatientID=c.PatientID AND 
                        f.PatientID=p.PatientID AND 
                        f.PatientID=t.PatientID AND 
                        t.TransactionID=l.TransactionID AND 
                        t.TransactionID=x.TransactionID AND 
                        t.TransactionID=c.TransactionID AND 
                        t.TransactionID=p.TransactionID AND
                        f.CreationDate >= '$SD' AND f.CreationDate <='$ED' AND 
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
                $DT = $row['DT'];
                $Preg = $row['PregTest'];
                $HBsAg = $row['HBsAg'];
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
                    }
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

                $i++;

        
         echo"<tr>
         		<td nowrap>$i</td>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam &nbsp; $midnam</td>
                <td>$xray1</td>
                <td>$UriOt</td>
                <td>$DT</td>
                <td>$FecMicro1</td>
                <td>$CBCOt</td>
                <td>$patclass1</td>
                <td>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If Else



//End of Php?>
    </table>
    </div>
    </div>
    </div>
<?php
}
?>

</body>
</html>


