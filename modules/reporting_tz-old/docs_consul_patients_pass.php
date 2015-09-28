<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
//require($root_path . 'include/inc_front_chain_lang.php');
//require($root_path . 'language/en/lang_en_reporting.php');
require($root_path . 'language/en/lang_en_date_time.php');
require($root_path . 'include/inc_date_format_functions.php');

$lang_tables[] = 'date_time.php';
$lang_tables[] = 'reporting.php';
require($root_path . 'include/inc_front_chain_lang.php');
require_once('include/inc_timeframe.php');
$month = array_search(1, $ARR_SELECT_MONTH);
$year = array_search(1, $ARR_SELECT_YEAR);

$debug = FALSE;
($debug) ? $db->debug = TRUE : $db->debug = FALSE;

//Get Doctors List
//$docs_qry = "SELECT name FROM care_users
//                 WHERE login_id = '$doctor'";
//$doc_name_res = $db->Execute($doc_name_qry)->FetchRow();
//$doc_name = $doc_name_res[0];

require_once('gui/gui_docs_consul_patients_pass.php');
?>