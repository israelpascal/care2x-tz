<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);

$report_textsize=12;
$report_titlesize=16;
$report_auxtitlesize=10;
$report_authorsize=10;

require('./roots.php');
require($root_path.'include/inc_environment_global.php');
/**
* CARE 2X Integrated Hospital Information System beta 1.0.09 - 2003-11-25
* GNU General Public License
* Copyright 2002,2003,2004,2005 Elpidio Latorilla
* elpidio@latorilla.com
*
* See the file "copy_notice.txt" for the licence notice
*/
//$lang_tables[]='startframe.php';

$lang_tables[]='person.php';
$lang_tables[]='departments.php';
define('LANG_FILE','aufnahme.php');
//define('NO_2LEVEL_CHK',1);
//define('NO_CHAIN',TRUE);
$local_user='aufnahme_user';
require_once($root_path.'include/inc_front_chain_lang.php');
require_once($root_path.'include/inc_date_format_functions.php');
require_once($root_path.'include/care_api_classes/class_encounter.php');
include_once($root_path.'include/inc_t1ps_ar2uni.php');


# Get the encouter data
$enc_obj= new Encounter($enc);
if($enc_obj->loadEncounterData()){
	$encounter=$enc_obj->getLoadedEncounterData();
	//extract($encounter);
}

# Fetch insurance and encounter classes
$encounter_class=$enc_obj->getEncounterClassInfo($encounter['encounter_class_nr']);
$insurance_class=$enc_obj->getInsuranceClassInfo($encounter['insurance_class_nr']);

# Resolve the encounter class name
if (isset($$encounter_class['LD_var'])&&!empty($$encounter_class['LD_var'])){
	$eclass=$$encounter_class['LD_var'];
}else{
	$eclass= $encounter_class['name'];
} 
# Resolve the insurance class name
if (isset($$insurance_class['LD_var'])&&!empty($$insurance_class['LD_var'])) $insclass=$$insurance_class['LD_var']; 
    else $insclass=$insurance_class['name']; 

# Get ward or department infos
if($encounter['encounter_class_nr']==1){
	# Get ward name
	include_once($root_path.'include/care_api_classes/class_ward.php');
	$ward_obj=new Ward;
	$current_ward_name=$ward_obj->WardName($encounter['current_ward_nr']);
}elseif($encounter['encounter_class_nr']==2){
	# Get ward name
	include_once($root_path.'include/care_api_classes/class_department.php');
	$dept_obj=new Department;
	//$current_dept_name=$dept_obj->FormalName($current_dept_nr);
	$current_dept_LDvar=$dept_obj->LDvar($encounter['current_dept_nr']);
	if(isset($$current_dept_LDvar)&&!empty($$current_dept_LDvar)) $current_dept_name=$$current_dept_LDvar;
		else $current_dept_name=$dept_obj->FormalName($encounter['current_dept_nr']);
}

require_once($root_path.'include/care_api_classes/class_insurance.php');
$insurance_obj=new Insurance;


$classpath=$root_path.'classes/phppdf/';
$fontpath=$classpath.'fonts/';
# Load and create pdf object
include($classpath.'class.ezpdf.php');
$pdf= new Cezpdf();


$logo=$root_path.'gui/img/logos/lopo/care_logo.png';
$arlogo=$root_path.'gui/img/logos/lopo/ar/care_logo.png';//added  by Waleed Fathalla at 06/03/2004
$pidbarcode=$root_path.'cache/barcodes/pn_'.$encounter['pid'].'.png';
$encbarcode=$root_path.'cache/barcodes/en_'.$enc.'.png';

# Patch for empty file names 2004-05-2 EL
if(empty($encounter['photo_filename'])){
	$idpic=$root_path.'fotos/registration/_nothing_';
 }else{
	$idpic=$root_path.'fotos/registration/'.$encounter['photo_filename'];
}

if($lang=='ar'||$lang=='fa') {// for arabic lang, added  by Waleed Fathalla at 06/03/2004

# Load the page header #1
require('../std_plates/pageheader1ar.php');
# Load the patient data plate #1
require('../std_plates/patientdata1ar.php');

$data=NULL;
# make empty line
$y=$pdf->ezText("\n",14);

$data[]=array(ar2uni($LDPatientData));
$pdf->ezTable($data,'','',array('xPos'=>'left','xOrientation'=>'right','showLines'=>0,'fontSize'=>$report_titlesize,'showHeadings'=>0,'shaded'=>2,'shadeCol2'=>array(0.9,0.9,0.9),'width'=>555,'cols'=>array(0=>array('justification'=>'right'))));
# make empty line
$y=$pdf->ezText("\n",14);

# reset
$data=NULL;
$data[]=array(formatDate2Local($encounter['encounter_date'],$date_format),ar2uni("$LDAdmitDate :"));
$data[]=array(formatDate2Local($encounter['encounter_date'],$date_format,TRUE,TRUE),ar2uni("$LDAdmitTime :"));
$data[]=array('');
$data[]=array(ar2uni($encounter['title']),ar2uni("$LDTitle :"));
$data[]=array($encounter['sex'],ar2uni("$LDSex :"));
$data[]=array($encounter['blood_group'],ar2uni("$LDBloodGroup :"));
$data[]=array(ar2uni($eclass),ar2uni("$LDAdmitType :"));
if($encounter['encounter_class_nr']==1){
	$data[]=array(ar2uni($current_ward_name),ar2uni("$LDWard :"));
}else{
	$data[]=array(ar2uni($current_dept_name),ar2uni("$LDDepartment :"));
}
$data[]=array('');
$data[]=array(ar2uni($encounter['referrer_diagnosis']),ar2uni("$LDDiagnosis :"));
$data[]=array(ar2uni($encounter['referrer_dr']),ar2uni("$LDRecBy :"));
$data[]=array(ar2uni($encounter['referrer_recom_therapy']),ar2uni("$LDTherapy :"));
$data[]=array(ar2uni($encounter['referrer_notes']),ar2uni("$LDSpecials :"));
$data[]=array('');
$data[]=array(ar2uni($insclass),ar2uni("$LDBillType :"));
$data[]=array($encounter['insurance_nr'],ar2uni("$LDInsuranceNr :"));
$data[]=array(ar2uni($insurance_obj->getFirmName($encounter['insurance_firm_id'])),ar2uni("$LDInsuranceCo :"));
$data[]=array('');
$data[]=array(ar2uni($encounter['create_id']),ar2uni("$LDAdmitBy :"));

$pdf->ezTable($data,'','',array('xPos'=>'right','xOrientation'=>'left','showLines'=>0,'fontSize'=>$report_textsize,'showHeadings'=>0,'shaded'=>0,'cols'=>array(0=>array('justification'=>'right'))));

}else{

# Load the page header #1
require('../std_plates/pageheader1.php');
# Load the patient data plate #1
require('../std_plates/patientdata1.php');

$data=NULL;
# make empty line
//$y=$pdf->ezText("\n",14);

//$data[]=array($LDPatientData);
//$pdf->ezTable($data,'','',array('xPos'=>'left','xOrientation'=>'right','showLines'=>0,'fontSize'=>$report_titlesize,'showHeadings'=>0,'shaded'=>2,'shadeCol2'=>array(0.9,0.9,0.9),'width'=>555));
# make empty line
$y=$pdf->ezText("\n",14);
$sql="SELECT cep.prescribe_date,cep.article,cep.dosage,cep.times_per_day,cep.days,cep.total_dosage,cep.prescriber FROM care_encounter_prescription AS cep INNER JOIN care_encounter AS ce ON ce.encounter_nr=cep.encounter_nr INNER JOIN care_tz_drugsandservices AS pricelist ON pricelist.item_id=cep.article_item_number WHERE ce.pid='".$encounter['pid']."' AND pricelist.purchasing_class like 'drug_list%'";
//echo $sql;
$result=$db->Execute($sql);
while($data[]=$result->FetchRow())
{}

$pdf->ezTable($data,array('prescribe_date'=>'Prescription Date','article'=>'Medicine/procedure','dosage'=>'Dosage','times_per_day'=>'Time Per Day','days'=>'Days','total_dosage'=>'Total Dose','prescriber'=>'Prescribed By')); 
//$pdf->ezTable($data,'','',array('xPos'=>'left','xOrientation'=>'right','showLines'=>0,'fontSize'=>$report_textsize,'showHeadings'=>0,'shaded'=>0,'cols'=>array(0=>array('justification'=>'right'))));
# reset

$data=NULL;
$y=$pdf->ezText("\n",7);
$sql="SELECT *, FROM_UNIXTIME(timestamp) AS tarehe FROM care_tz_diagnosis WHERE PID=".$encounter['pid'];
$result=$db->Execute($sql);
while($data[]=$result->FetchRow())
{}

$pdf->ezTable($data,array('tarehe'=>'Diganosis Date','ICD_10_code'=>'ICD 10 CODE','ICD_10_description'=>'DIAGNOSIS','type'=>'Type','comment'=>'Comment','doctor_name'=>'Doctor Name'));

$data=NULL;
$y=$pdf->ezText("\n",7);
$sql="SELECT ce.pid,lab.paramater_name,parameter_value,lab.test_date,lab.test_time,lab.create_id,lab.create_time FROM care_test_findings_chemlabor_sub AS lab INNER JOIN care_encounter AS ce ON lab.encounter_nr=ce.encounter_nr WHERE lab.paramater_name NOT LIKE '%FBP%' AND ce.pid=".$encounter['pid'];

$result=$db->Execute($sql);
while($data[]=$result->FetchRow())
{}

$pdf->ezTable($data,array('create_time'=>'Date','paramater_name'=>'Test Name','parameter_value'=>'Result','create_id'=>'Entered By'));
$data=NULL;

$y=$pdf->ezText("\n",7);
$sql="SELECT a.item_id,a.item_description, b.test_request,c.findings,c.diagnosis,c.create_id,c.create_time FROM care_tz_drugsandservices AS a INNER JOIN care_test_request_radio AS b ON a.item_id=b.test_request INNER JOIN care_test_findings_radio AS c ON b.encounter_nr=c.encounter_nr INNER JOIN care_encounter AS d ON d.encounter_nr=c.encounter_nr WHERE d.pid=".$encounter['pid'];
$result=$db->Execute($sql);
while($data[]=$result->FetchRow())
{}
$pdf->ezTable($data,array('create_time'=>'Date','findings'=>'Findings','diagnosis'=>'Diagnosis','create_id'=>'Entered By'));

$data=NULL;
$y=$pdf->ezText("\n",7);
$sql="SELECT `date`,`notes`,`short_notes`,nts.`create_id`,nts.`create_time` FROM `care_encounter_notes`  AS nts INNER JOIN care_encounter  AS ce ON ce.encounter_nr=nts.encounter_nr WHERE ce.pid=".$encounter['pid'];
$result=$db->Execute($sql);
while($data[]=$result->FetchRow())
{}
$pdf->ezTable($data,array('create_time'=>'Date','notes'=>'Full Notes','short_notes'=>'Short Notes','create_id'=>'Entered By'));

}

$pdf->ezStream();

?>
