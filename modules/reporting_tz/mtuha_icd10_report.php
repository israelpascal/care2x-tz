<?php
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
$lang_tables[] = 'date_time.php';
$lang_tables[] = 'reporting.php';
require($root_path . 'include/inc_front_chain_lang.php');
require($root_path . 'language/en/lang_en_reporting.php');
require($root_path . 'language/en/lang_en_date_time.php');
require($root_path . 'include/inc_date_format_functions.php');
require_once($root_path . 'include/care_api_classes/class_tz_reporting.php');
require_once($root_path.'include/care_api_classes/class_department.php');
$dept_obj= new Department;
$medical_depts=$dept_obj->getAllMedical();
#Load and create paginator object

/**
 * getting summary of OPD...
 */
 if(isset($_POST['date1']) || !empty($_POST['date1'])){
	 echo $_POST['date1'];
	 }
$rep_obj = new selianreport();

require_once('gui/gui_mtuha_icd10_report.php');


?>
