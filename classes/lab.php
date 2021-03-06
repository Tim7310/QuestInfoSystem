<?php
class lab {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, qpd_labresult x WHERE x.TransactionID = t.TransactionID AND f.PatientID = x.PatientID ORDER BY t.TransactionID");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, qpd_labresult v WHERE f.PatientID = ? AND t.PatientID = ? AND v.PatientID = ? AND t.TransactionID = ? AND v.TransactionID = ?");
			$query->bindValue(1, $id);
			$query->bindValue(2, $id);
			$query->bindValue(3, $id);
			$query->bindValue(4, $tid);
			$query->bindValue(5, $tid);
			$query->execute();

			return $query->fetch();
	}
	public function fetch_data2($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_labresult WHERE PatientID = ? and TransactionID = ?");
			$query->bindValue(1, $id);
			$query->bindValue(2, $tid);
			$query->execute();

			return $query->fetch();
	}

 //    public function fetch_data3($id, $tid){
	// 		global $pdo;

	// 		$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, lab_hematology h,lab_microscopy m, lab_serology s WHERE f.PatientID = ? AND t.PatientID = ? AND v.PatientID = ? AND t.TransactionID = ? AND h.TransactionID = ?");
	// 		$query->bindValue(1, $id);
	// 		$query->bindValue(2, $id);
	// 		$query->bindValue(3, $id);
	// 		$query->bindValue(4, $tid);
	// 		$query->bindValue(5, $tid);
	// 		$query->execute();

	// 		return $query->fetch();
	// }

	public function creationDate($id, $table, $idname){
		global $pdo;

		$query = $pdo->prepare("SELECT CreationDate FROM $table WHERE $idname = '$id'");
		$query->execute();

		$data = $query->fetch();
		return $data[0];

	}

	public function medtech(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM lab_personnel WHERE Position = 'MEDICAL TECHNOLOGIST' OR Position = 'QUALITY CONTROL' OR Position = 'PATHOLOGIST'");
		$query->execute();

		return $query->fetchAll();
	}
	public function medtechByID($id){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM lab_personnel WHERE personnelID = ? ");
		$query->bindValue(1, $id);
		$query->execute();

		return $query->fetch();
	}
	public function printCount($pid, $tid, $test){
		global $pdo;
		$sql = $pdo->prepare("SELECT * from print_count where TransactionID = '$tid' and PatientID = '$pid' and Test = '$test'");
		$sql->execute();
		$printed = $sql->fetch();

		if (is_array($printed)) {
			$count = $printed['PrintCount'] + 1;
			$query = $pdo->prepare("UPDATE print_count set PrintCount = '$count' where TransactionID = '$tid' and PatientID = '$pid' and Test = '$test'");
		}else{
			$query = $pdo->prepare("INSERT INTO print_count(TransactionID, PatientID, Test) VALUES ('$tid', '$pid', '$test')");
		}
		$query->execute();
	}
	public function checkPrint($pid, $tid, $test){
		global $pdo;
		$sql = $pdo->prepare("SELECT * from print_count where TransactionID = '$tid' and PatientID = '$pid' and Test = '$test'");
		$sql->execute();
		$print = $sql->fetch();
		$count = $sql->rowCount();
		if ($count > 0) {
			$count = $print['PrintCount'];
		}
		return $count;
	}
	public function addMicro($tid, $pid, $FecColor, $fecCon, $fecMicro, $fecOt, $UriColor, $UriTrans, $UriPh, $UriSp, $UriPro, $UriGlu, $RBC, $WBC, $Bac, $MThreads, $ECells, $Amorph, $CoAx, $UriOt, $LE, $NIT, $URO, $BLD, $KET, $BIL, $PregTest, $PathID, $MedID, $QualityID, $date, $AFBVA1="", $AFBVA2="", $AFBR1="", $AFBR2="", $AFBD="", $OccultBLD=""){
		global $pdo;

		$sql = $pdo->prepare("INSERT INTO lab_microscopy( TransactionID, PatientID, FecColor, FecCon, FecMicro, FecOt, UriColor, UriTrans, UriPh, UriSp, UriPro, UriGlu, RBC, WBC, Bac, MThreads, ECells, Amorph, CoAx, UriOt, LE, NIT, URO, BLD, KET, BIL, PregTest, AFBVA1, AFBVA2, AFBR1, AFBR2, AFBD, OccultBLD, PathID, MedID, QualityID, CreationDate) VALUES ('$tid', '$pid', '$FecColor', '$fecCon','$fecMicro', '$fecOt', '$UriColor', '$UriTrans', '$UriPh', '$UriSp', '$UriPro', '$UriGlu', '$RBC', '$WBC', '$Bac', '$MThreads', '$ECells', '$Amorph', '$CoAx', '$UriOt', '$LE', '$NIT', '$URO', '$BLD', '$KET', '$BIL', '$PregTest', '$AFBVA1', '$AFBVA2', '$AFBR1', '$AFBR2', '$AFBD', '$OccultBLD', '$PathID', '$MedID', '$QualityID', '$date')");
		$sql->execute();

	}
	public function updateMicro($tid, $pid, $FecColor, $fecCon, $fecMicro, $fecOt, $UriColor, $UriTrans, $UriPh, $UriSp, $UriPro, $UriGlu, $RBC, $WBC, $Bac, $MThreads, $ECells, $Amorph, $CoAx, $UriOt, $LE, $NIT, $URO, $BLD, $KET, $BIL, $PregTest, $PathID, $MedID, $QualityID, $date, $AFBVA1="", $AFBVA2="", $AFBR1="", $AFBR2="", $AFBD="", $OccultBLD=""){
		global $pdo;
		$sql = $pdo->prepare("UPDATE lab_microscopy set FecColor = '$FecColor', FecCon = '$fecCon', FecMicro = '$fecMicro', FecOt = '$fecOt', UriColor = '$UriColor', UriTrans = '$UriTrans', UriPh = '$UriPh', UriSp = '$UriSp', UriPro = '$UriPro', UriGlu = '$UriGlu', RBC = '$RBC', WBC = '$WBC', Bac = '$Bac', MThreads = '$MThreads', ECells = '$ECells', Amorph = '$Amorph', CoAx = '$CoAx', UriOt = '$UriOt', LE = '$LE', NIT = '$NIT', URO = '$URO', BLD = '$BLD', KET = '$KET', BIL = '$BIL', PregTest = '$PregTest', AFBVA1 = '$AFBVA1', AFBVA2 = '$AFBVA2', AFBR1='$AFBR1', AFBR2='$AFBR2', AFBD = '$AFBD', OccultBLD = '$OccultBLD', PathID = '$PathID', MedID = '$MedID', QualityID = '$QualityID', DateUpdate = '$date' where PatientID = '$pid' and TransactionID = '$tid'");
		$sql->execute();
	}
	public function addHema($tid, $pid, $WhiteBlood, $Hemoglobin, $HemoNR, $Hematocrit, $HemaNR, $Neutrophils, $Lymphocytes, $Monocytes, $CBCOt, $EOS, $BAS, $CBCRBC, $PLT, $PTime, $PTControl, $ActPercent, $INR, $PR131, $APTTime, $APTControl, $PathID, $MedID, $QualityID, $Date, $PTimeNV="", $PTControlNV="", $ActPercentNV="", $INRNV="", $APTTimeNV="", $APTControlNV="",$MS="", $ESR="", $ESRMethod="", $bt="", $rh="", $ct="", $blt=""){
		global $pdo;
		$sql = $pdo->prepare("INSERT INTO lab_hematology (TransactionID, PatientID, WhiteBlood, Hemoglobin, HemoNR, Hematocrit, HemaNR, Neutrophils, Lymphocytes, Monocytes, CBCOt, EOS, BAS, CBCRBC, PLT, PTime, PTControl, ActPercent, INR, PR131, APTTime, APTControl, PTimeNV, PTControlNV, ActPercentNV, INRNV, APTTimeNV, APTControlNV, MS, ESR, ESRMethod, bloodType, rh, clottingTime, bleedingTime, PathID, MedID, QualityID, CreationDate) values ('$tid', '$pid', '$WhiteBlood', '$Hemoglobin', '$HemoNR', '$Hematocrit',' $HemaNR', '$Neutrophils', '$Lymphocytes', '$Monocytes', '$CBCOt', '$EOS', '$BAS', '$CBCRBC', '$PLT', '$PTime', '$PTControl', '$ActPercent', '$INR', '$PR131', '$APTTime', '$APTControl', '$PTimeNV', '$PTControlNV', '$ActPercentNV', '$INRNV', '$APTTimeNV', '$APTControlNV', '$MS', '$ESR', '$ESRMethod', '$bt', '$rh', '$ct', '$blt', '$PathID', '$MedID', '$QualityID', '$Date')");
		$sql->execute();
	}
	public function updateHema($tid, $pid, $WhiteBlood, $Hemoglobin, $HemoNR, $Hematocrit, $HemaNR, $Neutrophils, $Lymphocytes, $Monocytes, $CBCOt, $EOS, $BAS, $CBCRBC, $PLT, $PTime, $PTControl, $ActPercent, $INR, $PR131, $APTTime, $APTControl, $PathID, $MedID, $QualityID, $Date, $PTimeNV="", $PTControlNV="", $ActPercentNV="", $INRNV="", $APTTimeNV="", $APTControlNV="",$MS="", $ESR="", $ESRMethod="", $bt="", $rh="", $ct="", $blt=""){
		global $pdo;
		$sql = $pdo->prepare("UPDATE lab_hematology set WhiteBlood = '$WhiteBlood', Hemoglobin = '$Hemoglobin', HemoNR = '$HemoNR', Hematocrit = '$Hematocrit', HemaNR = '$HemaNR', Neutrophils = '$Neutrophils', Lymphocytes = '$Lymphocytes', Monocytes = '$Monocytes', CBCOt = '$CBCOt', EOS = '$EOS', BAS = '$BAS', CBCRBC = '$CBCRBC', PLT = '$PLT',PTime = '$PTime', PTControl = '$PTControl', ActPercent = '$ActPercent', INR = '$INR', PR131 = '$PR131', APTTime = '$APTTime', APTControl = '$APTControl' , PTimeNV = '$PTimeNV', PTControlNV = '$PTControlNV', ActPercentNV = '$ActPercentNV', INRNV = '$INRNV', APTTimeNV = '$APTTimeNV', APTControlNV = '$APTControlNV', MS = '$MS', ESR = '$ESR', ESRMethod = '$ESRMethod', bloodType = '$bt', rh = '$rh', clottingTime = '$ct', bleedingTime = '$blt', PathID = '$PathID', MedID = '$MedID', QualityID = '$QualityID', CreationDate = '$Date' where PatientID = '$pid' and TransactionID = '$tid'");
		$sql->execute();
	}
	public function addChem( $TransactionID, $PatientID, $FBS, $FBScon, $BUA, $BUAcon, $BUN, $BUNcon, $CREA, $CREAcon, $CHOL, $CHOLcon, $TRIG, $TRIGcon, $HDL, $HDLcon, $LDL, $LDLcon, $CH, $VLDL, $Na, $K, $Cl, $ALT, $AST, $HB, $ALP, $PSA, $RBS, $RBScon, $GGTP, $PathID, $MedID, $QualityID, $Date, $LDH, $Calcium, $Amylase, $Lipase, $InPhos, $Protein, $Albumin, $Globulin, $Magnesium, $OGTT1, $OGTT1con, $OGTT2, $OGTT2con, $OGCT, $OGCTcon, $CPKMB, $CPKMM, $totalCPK, $IonCalcium, $BILTotal, $BILDirect, $BILIndirect, $AGRatio, $notes = "" ){
		global $pdo;
		$sql = $pdo->prepare("INSERT INTO lab_chemistry (TransactionID, PatientID, FBS, FBScon, BUA, BUAcon, BUN, BUNcon, CREA, CREAcon, CHOL, CHOLcon, TRIG, TRIGcon, HDL, HDLcon, LDL, LDLcon, CH, VLDL, Na, K, Cl, ALT, AST, HB, ALP, PSA, RBS, RBScon, GGTP, LDH, Calcium, Amylase, Lipase, InPhos, Protein, Albumin, Globulin, Magnesium, OGTT1, OGTT1con, OGTT2, OGTT2con, OGCT, OGCTcon, CPKMB, CPKMM, totalCPK, IonCalcium, BILTotal, BILDirect, BILIndirect, AGRatio, PathID, MedID, QualityID, CreationDate, chemNotes) values ('$TransactionID', '$PatientID', '$FBS', '$FBScon', '$BUA', '$BUAcon', '$BUN', '$BUNcon', '$CREA', '$CREAcon', '$CHOL', '$CHOLcon', '$TRIG', '$TRIGcon', '$HDL', '$HDLcon', '$LDL', '$LDLcon', '$CH', '$VLDL', '$Na', '$K', '$Cl', '$ALT', '$AST', '$HB', '$ALP', '$PSA', '$RBS', '$RBScon', '$GGTP', '$LDH', '$Calcium', '$Amylase', '$Lipase', '$InPhos', '$Protein', '$Albumin', '$Globulin', '$Magnesium', '$OGTT1', '$OGTT1con', '$OGTT2', '$OGTT2con', '$OGCT', '$OGCTcon', '$CPKMB', '$CPKMM', '$totalCPK', '$IonCalcium', '$BILTotal', '$BILDirect', '$BILIndirect', '$AGRatio', '$PathID', '$MedID', '$QualityID', '$Date','$notes')");
		$sql->execute();
	}
	public function updateChem( $TransactionID, $PatientID, $FBS, $FBScon, $BUA, $BUAcon, $BUN, $BUNcon, $CREA, $CREAcon, $CHOL, $CHOLcon, $TRIG, $TRIGcon, $HDL, $HDLcon, $LDL, $LDLcon, $CH, $VLDL, $Na, $K, $Cl, $ALT, $AST, $HB, $ALP, $PSA, $RBS,$RBScon, $GGTP, $PathID, $MedID, $QualityID, $Date, $LDH, $Calcium, $Amylase, $Lipase, $InPhos, $Protein, $Albumin, $Globulin, $Magnesium, $OGTT1, $OGTT1con, $OGTT2, $OGTT2con, $OGCT, $OGCTcon, $CPKMB, $CPKMM, $totalCPK, $IonCalcium, $BILTotal, $BILDirect, $BILIndirect, $AGRatio, $notes = "" ){
		global $pdo;
		$sql = $pdo->prepare("UPDATE lab_chemistry set FBS = '$FBS', FBScon = '$FBScon', BUA = '$BUA', BUAcon = '$BUAcon', BUN = '$BUN', BUNcon = '$BUNcon', CREA = '$CREA', CREAcon = '$CREAcon', CHOL = '$CHOL', CHOLcon = '$CHOLcon', TRIG = '$TRIG', TRIGcon = '$TRIGcon', HDL = '$HDL', HDLcon = '$HDLcon', LDL = '$LDL', LDLcon = '$LDLcon', CH = '$CH', VLDL = '$VLDL', Na = '$Na', K = '$K', Cl = '$Cl', ALT = '$ALT', AST = '$AST', HB = '$HB', ALP = '$ALP', PSA = '$PSA', RBS = '$RBS', RBScon = '$RBScon', GGTP = '$GGTP', LDH = '$LDH', Calcium = '$Calcium', Amylase = '$Amylase', Lipase = '$Lipase', InPhos = '$InPhos', Protein = '$Protein', Albumin = '$Albumin', Globulin = '$Globulin', Magnesium = '$Magnesium', OGTT1 = '$OGTT1', OGTT1con = '$OGTT1con', OGTT2 = '$OGTT2', OGTT2con = '$OGTT2con', OGCT = '$OGCT', OGCTcon = '$OGCTcon', CPKMB = '$CPKMB', CPKMM = '$CPKMM', totalCPK = '$totalCPK', IonCalcium = '$IonCalcium', BILTotal = '$BILTotal', BILDirect = '$BILDirect', BILIndirect = '$BILIndirect', AGRatio = '$AGRatio', PathID = '$PathID', MedID = '$MedID', QualityID = '$QualityID', DateUpdate = '$Date', chemNotes = '$notes'  where PatientID = '$PatientID' and TransactionID = '$TransactionID'");
		$sql->execute();
	} 
	 // 
	// 
	public function addSerology( $TransactionID, $PatientID, $HBsAG, $AntiHav, $SeroOt, $PathID, $MedID, $QualityID, $Date, $VDRL="",$psa="",$AntiHBS="", $HBeAG="", $AntiHBE="", $AntiHBC="", $TYDOTIgM="", $TYDOTIgG="", $CEA="", $AFP="", $CA125="", $CA19="", $CA15="", $TSH="", $FT3="", $FT4="",$CRPdil="",$CRPRes="",$HIV1="",$HIV2=""){
		global $pdo;
		$sql = $pdo->prepare("INSERT into lab_serology (TransactionID, PatientID, HBsAG, AntiHav, SeroOt, VDRL, PSAnti, AntiHBS, HBeAG, AntiHBE, AntiHBC, TYDOTIgM, TYDOTIgG, CEA, AFP, CA125, CA19, CA15, TSH, FT3, FT4, CRPdil, CRPRes, HIV1, HIV2, PathID, MedID, QualityID, CreationDate) values ('$TransactionID', '$PatientID','$HBsAG','$AntiHav','$SeroOt', '$VDRL', '$psa', '$AntiHBS', '$HBeAG', '$AntiHBE', '$AntiHBC', '$TYDOTIgM', '$TYDOTIgG', '$CEA', '$AFP', '$CA125', '$CA19', '$CA15', '$TSH', '$FT3', '$FT4', '$CRPdil', '$CRPRes', '$HIV1', '$HIV2', '$PathID','$MedID','$QualityID','$Date')");
		$sql->execute();
	}
	public function updateSerology( $TransactionID, $PatientID, $HBsAG, $AntiHav, $SeroOt, $PathID, $MedID, $QualityID, $Date, $VDRL="",$psa="",$AntiHBS="", $HBeAG="", $AntiHBE="", $AntiHBC="", $TYDOTIgM="", $TYDOTIgG="", $CEA="", $AFP="", $CA125="", $CA19="", $CA15="", $TSH="", $FT3="", $FT4="",$CRPdil="",$CRPRes="",$HIV1="",$HIV2="" ){
		global $pdo;
		$sql = $pdo->prepare("UPDATE lab_serology set HBsAG = '$HBsAG', AntiHav = '$AntiHav', SeroOt = '$SeroOt', VDRL = '$VDRL', PSAnti = '$psa', AntiHBS = '$AntiHBS', HBeAG = '$HBeAG', AntiHBE = '$AntiHBE', AntiHBC = '$AntiHBC', TYDOTIgM = '$TYDOTIgM', TYDOTIgG = '$TYDOTIgG', CEA = '$CEA', AFP = '$AFP', CA125 = '$CA125', CA19 = '$CA19', CA15 = '$CA15', TSH = '$TSH', FT3 = '$FT3', FT4 = '$FT4', CRPdil = '$CRPdil', CRPRes = '$CRPRes', HIV1 = '$HIV1', HIV2 = '$HIV2', PathID = '$PathID', MedID = '$MedID', QualityID = '$QualityID', DateUpdate = '$Date' where PatientID = '$PatientID' and TransactionID = '$TransactionID'");
		$sql->execute();
	}
	public function addToxi( $TransactionID, $PatientID, $Meth, $Tetra, $Drugtest ,$PathID, $MedID, $QualityID, $Date){
		global $pdo;
		$sql = $pdo->prepare("INSERT into lab_toxicology ( TransactionID, PatientID, Meth, Tetra, Drugtest, PathID, MedID, QualityID, CreationDate) values ( '$TransactionID', '$PatientID', '$Meth', '$Tetra', '$Drugtest' ,'$PathID', '$MedID', '$QualityID', '$Date')");
		$sql->execute();
	}
	public function updateToxi( $TransactionID, $PatientID, $Meth, $Tetra, $Drugtest ,$PathID, $MedID, $QualityID, $Date ){
		global $pdo;
		$sql = $pdo->prepare("UPDATE lab_toxicology set Meth = '$Meth', Tetra = '$Tetra', Drugtest = '$Drugtest', PathID = '$PathID', MedID = '$MedID', QualityID = '$QualityID', DateUpdate = '$Date' where PatientID = '$PatientID' and TransactionID = '$TransactionID'");
		$sql->execute();
	}

	public function fetchlabAll($table){
		global $pdo;
		$sql = $pdo->prepare("SELECT * from $table l, qpd_trans t, qpd_patient p where p.PatientID = l.PatientID and t.TransactionID = l.TransactionID ");
		$sql->execute();
		return $sql->fetchAll();
	}
	public function fetchlabByDate($table,$month,$year){
		global $pdo;
		$sql = $pdo->prepare("SELECT * from $table l, qpd_trans t, qpd_patient p 
		where p.PatientID = l.PatientID and t.TransactionID = l.TransactionID and
		MONTH(t.TransactionDate) = '$month' and YEAR(t.TransactionDate) = '$year'");
		$sql->execute();
		return $sql->fetchAll();
	}
	public function getData($pid, $tid, $table){
		global $pdo;
		$sql = $pdo->prepare("SELECT * from $table l, qpd_trans t, qpd_patient p where l.TransactionID = '$tid' and l.PatientID = '$pid' and p.PatientID = l.PatientID and t.TransactionID = l.TransactionID");
		$sql->execute();
		return $sql->fetch();
	}
	public function getDataByDate($pid, $tid, $table,$month,$year){
		global $pdo;
		$sql = $pdo->prepare("SELECT * from $table l, qpd_trans t, qpd_patient p 
		where l.TransactionID = '$tid' and l.PatientID = '$pid' 
		and p.PatientID = l.PatientID and t.TransactionID = l.TransactionID 
		and MONTH(t.TransactionDate) = '$month' and YEAR(t.TransactionDate) = '$year'");
		$sql->execute();
		return $sql->fetch();
	}

	public function checkData($pid, $tid, $table){
		global $pdo;
		$sql = $pdo->prepare("SELECT * from $table where TransactionID = '$tid' and PatientID = '$pid'");
		$sql->execute();
		return $sql->rowCount();
	}
	public function fetchData($pid, $tid, $table){
		global $pdo;
		$sql = $pdo->prepare("SELECT * from $table where TransactionID = '$tid' and PatientID = '$pid'");
		$sql->execute();
		return $sql->fetch();
	}

}

?>
