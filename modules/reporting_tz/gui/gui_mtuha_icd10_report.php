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
                urlholder = "./DetailedRevenue.php?printout=TRUE&start=<?php echo $selected_date_from; ?>&end=<?php echo $selected_date_to; ?>&company=<?php echo $company; ?>&in_out_patient=<?php echo $_POST['admission_id']; ?>";
                testprintout = window.open(urlholder, "printout", "width=800,height=600,menubar=no,resizable=yes,scrollbars=yes");
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
                                    &nbsp;&nbsp;<font color="#330066"><?php echo 'MTUHA'; ?></font></td>
                                <td width="408" align=right bgcolor="#99ccff">
                                    <a href="javascript: history.back();"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a>
                                    <a href="javascript:gethelp('reporting_overview.php','Reporting :: Overview')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                                    <a href="<?php echo $root_path; ?>modules/reporting_tz/reporting_main_menu.php" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>  
                                </td>
                            </tr>
                        </table>
                        <script>
                            function inputvalue() {
                                var date1 = document.forms["form1"]["date_from"].value;
                                var date2 = document.forms["form1"]["date_to"].value;
                                var nr_blocks = document.forms["blockform"]["blocks"].value;
                                if (date1 == '' || date1 == null) {
                                    alert('PLEASE ENTER DATE FROM');
                                    document.forms["form1"]["date_from"].focus();
                                    return false;
                                } else if (date2 == '' || date2 == null) {
                                    alert("PLEASE ENTER DATE TO");
                                    document.forms["form1"]["date_to"].focus();
                                    return false;
                                } else if (date1 > date2) {
                                    alert("DATE FROM MUST BE GREATER THAN DATE TO");
                                    return false;
                                } else if (!isNaN(nr_blocks)) {


                                    //var nr=CheckBlockValue();
                                    var i;

                                    for (i = 1; i <= nr_blocks; i++) {

                                        var start = document.forms["form1"]["start" + i].value;
                                        var end = document.forms["form1"]["end" + i].value;
                                        if (start > end) {
                                            alert("START AGE MUST BE LESS OR EQUAL TO END AGE");
                                            document.forms["form1"]["end" + i].focus();
                                            return false;

                                        } else if (start == '' || start == null) {
                                            alert("PLEASE DEFINE AGE GROUP");
                                            document.forms["form1"]["start" + i].focus();
                                            return false;
                                        } else if (end == '' || end == null) {
                                            alert("PLEASE DEFINE AGE GROUP");
                                            document.forms["form1"]["end" + i].focus();
                                            return false;
                                        }

                                    }

                                }


                            }  //end of input value function 







                        </script>	

                        <form name="blockform" method="post" action="" >

                            <input type="text" name="blocks" size="2" value="<?php echo $_POST['blocks']; ?>">
                            <input type="submit" name="submit" value="SHOW">
                        </form>

                        <form name="form1" method="post" action="" onsubmit="return inputvalue()">				


                            <?php
                            if ($_POST['blocks'] > 0) {
                                require_once($root_path . $top_dir . 'include/inc_gui_date_range_only.php');
                            }
                            $rep_obj->MtuhaDiagnosisBlocks($_POST['blocks']);
                            ?>


                        </form>








