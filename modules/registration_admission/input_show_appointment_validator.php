<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');

require($root_path . 'include/inc_environment_global.php');
include_once($root_path . 'include/care_api_classes/class_multi.php');

$multi = new multi;

require_once($root_path . 'include/care_api_classes/class_appointment.php');
$obj = new Appointment();

extract($_GET);
$dz = explode('/', $dt);
$dt2 = $dz[2] . '-' . $dz[1] . '-' . $dz[0];

if (($tm != '') && ($dt != '') && ($dpt != '')) {
    $vk = $db->Execute(' SELECT * FROM care_appointment WHERE date="' . $dt2 . '" AND time LIKE "%' . $tm . '%" AND to_dept_nr=' . $dpt);
    if ($vk->RecordCount() > 0) {
        print 'There is another appointment on this Time <input type="hidden" id="hd" name="hd" value="1">';
    } else {
        print '<input type="hidden" id="hd" name="hd" value="0">';
        print mysql_error();
    }
    //Check That the allowed number of appointments is not exceeded

    if ($obj->appointment_count($dt2, '_DEPT', $dpt)) {
        $sql = $db->Execute("SELECT max_appointments FROM care_department
                                                WHERE nr = $dpt");
        $app = $sql->FetchRow();
        $app = $app['max_appointments'];
        print 'You have reached the maximum number of ' . $app . ' appointments for ' . $dt . ' on this department'
                . '<input type="hidden" id="max_app" name="max_app" value="1">';
    }
} else
    print ' ... <input type="hidden" id="hd" name="hd" value="0">';
?>