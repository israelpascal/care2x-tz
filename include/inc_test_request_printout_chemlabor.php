<!-- outermost table for the form -->
<table border=0 cellpadding=1 cellspacing=0 bgcolor="#606060">
    <tr>
        <td>
<?php
function getAge($then) {
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
    return $age;
}
//print getAge('1990-04-04'); // 19
//print getAge('1990-08-04'); // 18, birthday hasn't happened yet
?>
            <!-- table for the form simulating the border -->
            <table border=0 cellspacing=0 cellpadding=0 bgcolor="white">
                <tr>
                    <td>

                        <!-- Here begins the table for the form  -->

                        <table   cellpadding=0 cellspacing=0 border=0 width=750>
                            <tr  valign="top">
                                <!--
                                                        <td bgcolor="<?php echo $bgc1 ?>" width="230">
                                                                        <div class="lmargin">
                                                                        <font size=3 color="#990000" face="arial">
                                                                                <p>
                                
                                                                        </div>
                                                                </td>
                                -->
                                <!-- Middle block of first row -->
                                
                                <td bgcolor="<?php echo $bgc1 ?>">
                                    <table border="1" cellpadding="0" bgcolor="" align="center">
                                        <tr>
                                            <?php
                                            /* Patient label */
                                            if ($read_form) {
                                                echo '
					<td width=20%>';
                                                if ($urgency == 0) {
                                                    echo '<font color="green"><b>NORMAL';
                                                }
                                                if ($urgency == 3) {
                                                    echo '<font color="blue"><b>PRIORITY';
                                                }
                                                if ($urgency == 5) {
                                                    echo '<font color="orange"><b>URGENT';
                                                }
                                                if ($urgency == 7) {
                                                    echo '<font color="red"><b>EMERGENCY';
                                                }
                                                echo '</td>';
                                                echo'<td width=20%>
					<font color="purple">' . $LDHospitalFileNr . '
						<font color="#ffffee" class="vi_data"><b>' . $h_selian_file_number . '
					</td>
					<td width="20%">
					<font color="purple">' . $LDName_2 . '
						<font color="#ffffee" class="vi_data"><b>' . $h_name_2 . '
					</td>
					<td width="20%">
							<font color="purple">' . $LDSurnameUkoo . '
					 	<font color="#ffffee" class="vi_data"><b>
						' . $h_name_last . '</b>
					</td>

					<td width="20%">
					<font color="purple">' . $LDFirstName . '
					<font color="#ffffee" class="vi_data"><b>
						' . $h_name_first . ' </b>
					</font>
					</td>';
                                                //echo '<img src="'.$root_path.'main/imgcreator/barcode_label_single_large.php?sid=$sid&lang=$lang&fen='.$full_en.'&en='.$pn.'" width=282 height=178>';
                                            }
                                            ?>
                                        </tr>
                                    </table>
                                </td>


                                <td  bgcolor="<?php echo $bgc1 ?>"  align="right">
                                    <!--  Block for the casenumber codes -->

                        </table>

                    </td>

                </tr>
                <!--  The  row for batch number -->
                <tr bgcolor="<?php echo $bgc1 ?>">
                    <td align="center"  colspan=3>
                        <font size=1 color="purple" face="verdana,arial" >
                        <font size=3 color="purple" face="verdana,arial"><?php print getAge($h_birthdate).'Years' ?></font>&nbsp;
                        <font size=3 color="purple" face="verdana,arial"><?php echo $LDSex.''.$h_sex; ?></font>
                        


                        </font></td>

                </tr>


                <tr>
                    <td>
                        <font size=2 color="purple" face="verdana,arial"><?php echo $LDDoctorRequest; ?> 
                        <?php echo $h_DoctorID; ?></font></td>
                </tr>

                <tr>
                    <td> 
                        <font size=2 color="purple" face="verdana,arial"><?php
                        
                        if ($h_encounter_class_nr == "2") {
                            echo 'Clinic/Department :';
                            echo $h_opd_admission;
                        } else {
							
                            echo 'Ward/Station :';
                            echo $h_ipd_admission.'<br>';
                            echo 'Room :'.$roomprefix.''.$h_room_nr;
                        }
                        ?> </font>

                    </td>

                </tr>

            </table>

            <!--  The test parameters begin  -->
            <table border=0 cellpadding=0 cellspacing=0 width=750 bgcolor="<?php echo $bgc1 ?>">
                <?php
                //* Get the global config for billing item*/
                include_once($root_path . 'include/care_api_classes/class_globalconfig.php');
                $glob_obj = new GlobalConfig($GLOBAL_CONFIG);

# Start buffering output
                ob_start();
                for ($i = 0; $i <= $max_row; $i++) {
                    echo '<tr class="lab">';
                    for ($j = 0; $j <= $column; $j++) {
                        if ($LD_Elements[$j][$i]['type'] == 'top') {
                            echo '<td bgcolor="#ee6666" colspan="3"><font color="white">&nbsp;<b>' . $LD_Elements[$j][$i]['value'] . '</b></font></td>';
                        } else {
                            if ($LD_Elements[$j][$i]['value']) {
                                echo '<td>';
                                if ($edit) {
                                    if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
                                        echo '<input type="hidden" name="' . $LD_Elements[$j][$i]['id'] . '" value="1">
							<a href="javascript:setM(\'' . $LD_Elements[$j][$i]['id'] . '\')">';
                                    } else {
                                        echo '<input type="hidden" name="' . $LD_Elements[$j][$i]['id'] . '" value="0">
							<a href="javascript:setM(\'' . $LD_Elements[$j][$i]['id'] . '\')">';
                                    }
                                }
                                //Check if item is billed for outpatient
                                if ($glob_obj->getConfigValue("restrict_unbilled_items") === "1" && $h_encounter_class_nr == "2") { //Check the restriction status
                                    if ($lab_obj->getLabBillNoByBatch($batch_nr, $LD_Elements[$j][$i]['id']) > 0) {
                                        if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
                                            echo '<img src="f.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                        } else {
                                            echo '<img src="b.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                        }
                                    } else {
                                        echo '<img src="b.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    }
                                } else if ($glob_obj->getConfigValue("restrict_unbilled_items") === "1" && $h_encounter_class_nr != "2") {
                                    if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
                                        echo '<img src="f.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    } else {
                                        echo '<img src="b.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    }
                                } else {
                                    if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
                                        echo '<img src="f.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    } else {
                                        echo '<img src="b.gif" border=0 width=18 height=6 id="' . $LD_Elements[$j][$i]['id'] . '">';
                                    }
                                }
                                if ($edit) {
                                    echo '</a>';
                                }
                                echo '</td><td>';
                                if ($edit)
                                    echo '<a href="javascript:setM(\'' . $LD_Elements[$j][$i]['id'] . '\')">' . $LD_Elements[$j][$i]['value'] . '</a>';
                                else
                                    echo $LD_Elements[$j][$i]['value'];

                                echo '</td><td>';
                                if (isset($stored_param[$LD_Elements[$j][$i]['id']]) && !empty($stored_param[$LD_Elements[$j][$i]['id']])) {
									require_once($root_path.'include/care_api_classes/class_lab.php');
                                    $lab_obj=new Lab;
                                    $lab_bill = $lab_obj->getLabBillNoByBatch($batch_nr, $LD_Elements[$j][$i]['id']);
                                    if ($lab_bill > 0) {
                                        echo '<font color="green">' . $LDLabRequestBilled . ' ' . $lab_bill . '</font>';
                                    } else {
                                        if ($glob_obj->getConfigValue("restrict_unbilled_items") !== "1") {
                                            echo '<img src="../../gui/img/common/default/warn.gif" border=0 alt="" style="filter:alpha(opacity=70)"> <font color="red">' . $LDLabRequestNotBilled . '</font> <img src="../../gui/img/common/default/warn.gif" border=0 alt="" style="filter:alpha(opacity=70)">';
                                        } else if ($glob_obj->getConfigValue("restrict_unbilled_items") == "1" && $h_encounter_class_nr != "2") {
                                            echo '<img src="../../gui/img/common/default/warn.gif" border=0 alt="" style="filter:alpha(opacity=70)"> <font color="red">' . $LDLabRequestNotBilled . '</font> <img src="../../gui/img/common/default/warn.gif" border=0 alt="" style="filter:alpha(opacity=70)">';
                                        }
                                    }
                                }
                                echo '</td>';
                            } else {
                                echo '<td colspan=3>&nbsp;</td>';
                            }
                        }
                    }

                    echo '</tr><tr>';
                    if ($i < $max_row) {
                        for ($k = 0; $k <= $column; $k++) {
                            echo '<td width=2></td><td colspan="2" bgcolor="#ffcccc" width=' . (intval(745 / $column) - 18) . ' ><img src="p.gif"  width=1 height=1></td>';
                        }
                        echo '</tr>';
                    }
                }

//$sTemp=ob_get_contents();
                ob_end_flush();
                ?>
                <tr>
                    <td colspan=10>&nbsp;<font size=2 face="verdana,arial" color="black"><?php if ($stored_request['doctor_sign']) echo stripslashes($stored_request['doctor_sign']); ?></font></td>
                    <td colspan=12&nbsp;><font size=2 face="verdana,arial" color="black"><?php if ($stored_request['notes']) echo stripslashes($stored_request['notes']); ?></font></td>
                </tr>
                <tr>
                 <!-- <td colspan=20><font size=2 face="verdana,arial" color="purple">&nbsp;<?php echo $LDEmergencyProgram . ' &nbsp;&nbsp;&nbsp;<img ' . createComIcon($root_path, 'violet_phone.gif', '0', 'absmiddle', TRUE) . '> ' . $LDPhoneOrder ?></td>-->
                </tr>

            </table><!-- End of the main table holding the form -->

        </td>
    </tr>
</table><!-- End of table simulating the border -->
