<?php
if ($PRINTOUT) {
    echo '<head>
<script language="javascript"> this.window.print(); </script>
<title>' . $LDRadiology_rep . '</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<STYLE TYPE="text/css">
.report{
font-size: 10px;
border-collapse:collapse;
}

</STYLE>
</head>';

?>
                            
<?php 	 
                                          
     echo $rep_obj->Detailed_Revenue($selected_date_from, $selected_date_to, $company, $_POST['admission_id']);
    exit();
}

if ($EXPORT) {
    echo '<head>
<title>' . $LDRadiology_rep . '</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<STYLE TYPE="text/css">
.report{
font-size: 12px;
border-collapse:collapse;
}

</STYLE>
<head>';
  $filename = "website_data_" . date('Y-m-d') . ".xls";

    //header("Content-type: application/x-msdownload");
    header("Content-type: application/vnd-ms-excel; charset=utf-8;");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Pragma: no-cache");
    //header("Expires: 0");
    
    echo $rep_obj->Detailed_Revenue_export($_GET['start'], $_GET['end'], $_GET['company'], $_GET['in_out_patient'], $EXPORT);
    exit();
}
?>



<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<HTML>
    <HEAD>
        <TITLE><?php echo $LDReportingModule; ?></TITLE>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta name="Author" content="Robert Meggle">
        <meta name="Generator" content="various: Quanta, AceHTML 4 Freeware, NuSphere, PHP Coder">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <script language="javascript" >
<!-- 
            function gethelp(x, s, x1, x2, x3, x4)
            {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php?sid=<?php echo sid; ?>&lang=$lang&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }
            function printOut()
            {
                urlholder = "./DetailedRevenue.php?printout=TRUE&start=<?php echo $_POST['date_from']; ?>&end=<?php echo $_POST['date_to']; ?>&company=<?php echo $company; ?>&in_out_patient=<?php echo $_POST['admission_id']; ?>";
                testprintout = window.open(urlholder, "printout", "width=800,height=600,menubar=no,resizable=yes,scrollbars=yes");
                window.testprintout.moveTo(0, 0);
            }

            function exportOut()
            {
                urlholder = "./DetailedRevenue.php?export=TRUE&start=<?php echo $_POST['date_from']; ?>&end=<?php echo $_POST['date_to']; ?>&company=<?php echo $company; ?>&in_out_patient=<?php echo $_POST['admission_id']; ?>";
                testprintout = window.open(urlholder, "export", "width=900,height=600,menubar=no,resizable=yes,scrollbars=yes");
                window.testprintout.moveTo(0, 0);
            }

//-->
<?php require($root_path . 'include/inc_checkdate_lang.php'); ?>

        </script> 

        <script language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>
        <script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>
        <script language="javascript" src="<?php echo $root_path; ?>js/dtpick_care2x.js"></script>
        <script src="<?php print $root_path; ?>/include/_jquery.js" language="javascript"></script> 

        <link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
        <script language="javascript" src="../../js/hilitebu.js"></script>

        <STYLE TYPE="text/css">
            A:link  {color: #000066;}
            A:hover {color: #cc0033;}
            A:active {color: #cc0000;}
            A:visited {color: #000066;}
            A:visited:active {color: #cc0000;}
            A:visited:hover {color: #cc0033;}

            .report{
                font-size: 10px;
                border-collapse:collapse;
            }


        </style>
        <script language="JavaScript">
            <!--
        function popPic(pid, nm) {

                if (pid != "")
                    regpicwindow = window.open("../../main/pop_reg_pic.php?sid=<?php echo sid; ?>&lang=$lang&pid=" + pid + "&nm=" + nm, "regpicwin", "toolbar=no,scrollbars,width=180,height=250");

            }
            // -->
        </script>


    </HEAD>

    <BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066  >

        <!-- START HEAD OF HTML CONTENT -->
        <table width=100% border=0 cellspacing=0 height=100%>
            <tbody class="main">

                <tr>

                    <td  valign="top" align="middle" height="35">
                        <table cellspacing="0"  class="titlebar" border=0>
                            <tr valign=top  class="titlebar" >
                                <td width="202" bgcolor="#99ccff" >
                                    &nbsp;&nbsp;<font color="#330066"><?php echo $LDDetailedRevenue; ?></font></td>
                                <td width="408" align=right bgcolor="#99ccff">
                                    <a href="javascript: history.back();"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a>
                                    <a href="javascript:gethelp('reporting_overview.php','Reporting :: Overview')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                                    <a href="<?php echo $root_path; ?>modules/reporting_tz/reporting_main_menu.php" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>  
                                </td>
                            </tr>
                        </table>	

                        <form name="form1" method="post" action="">				
                            </p>

                            <?php require_once($root_path . $top_dir . 'include/inc_gui_timeframe_cash_credit.php'); ?>
                                                      
                                         
                            <?php $rep_obj->Detailed_Revenue($selected_date_from, $selected_date_to, $company, $_POST['admission_id']); ?>
                            <a href="javascript:printOut()"><img border=0 src=<?php echo $root_path; ?>/gui/img/common/default/billing_print_out.gif></a>
                            &nbsp;&nbsp;
                            <a href="javascript:exportOut()"><img border=0 src=<?php echo $root_path; ?>/gui/img/common/default/savedisk.gif></a>



                        </form>









