<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<HTML>
<HEAD>
 <TITLE><?php echo $LDPharmacyDBSearch; ?> - </TITLE>
<meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
<meta name="Author" content="Iddy Magohe">
<meta name="Generator" content="various: Quanta, AceHTML 4 Freeware, NuSphere, PHP Coder">
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php require_once('./index.php');
 ?>
  	<script language="javascript" >
<!--
function gethelp(x,s,x1,x2,x3,x4)
{
	if (!x) x="";
	urlholder="../../main/help-router.php<?php echo URL_APPEND; ?>&helpidx="+x+"&src="+s+"&x1="+x1+"&x2="+x2+"&x3="+x3+"&x4="+x4;
	helpwin=window.open(urlholder,"helpwin","width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
	window.helpwin.moveTo(0,0);
}
// -->

</script>
<link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
<script language="javascript" src="../../js/hilitebu.js"></script>

<STYLE TYPE="text/css">
A:link  {color: #000066;}
A:hover {color: #cc0033;}
A:active {color: #cc0000;}
A:visited {color: #000066;}
A:visited:active {color: #cc0000;}
A:visited:hover {color: #cc0033;}
</style>
<script language="JavaScript">
<!--
function popPic(pid,nm){

 if(pid!="") regpicwindow = window.open("../../main/pop_reg_pic.php?sid=<?php echo $sid."&lang=".$lang;?>&pid="+pid+"&nm="+nm,"regpicwin","toolbar=no,scrollbars,width=180,height=250");

}
// -->
</script>


<script language="javascript" >
<!--

function pruf(d)
{
	if(d.keyword.value=="")
	{
		d.keyword.focus();
		 return false;
	}
	return true;
}
function alert(){
var message;
	message=alert("No any help yet");
	return message;
}

// -->
</script>



</HEAD>
<BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066 onLoad="document.suchform.keyword.select()" >
<table width=102% border=0 cellspacing=0 height=10%>
  <tbody class="main">

	<tr>
		<td  valign="top" align="middle" height="35">
			 <table cellspacing="0"  class="titlebar" border=0>
 <tr valign=top  class="titlebar" >
  <td bgcolor="#99ccff" >
    &nbsp;&nbsp;<font color="#330066"><?php echo"SUPPLIER INFORMATIONS SEARCH"; ?></font>
       </td>
  <td bgcolor="#99ccff" align=right>

  <a href="javascript:window.history.back()"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)" ></a>
 <a href="#"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"></a>

   <a href= "./index.php" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"></a>  </td>

 </tr>
 </table>		</td>
	</tr>

	<tr>

      <td height="321" valign=top bgcolor=#ffffff> <ul>
          <p> <br>
          <form action="purchase_order_supplier.php" method="post" name="suchform" onSubmit="return pruf(this)">
            <table border=0 cellspacing=0 cellpadding=3>
              <tr bgcolor=#ffffdd>
                <td colspan=2><B> <FONT color="#800110"><?php echo "Enter a search keyword for example:* for all Suppliers or a keyword for Company name or Contact Person"; ?></font></B> <br> <p> </td>
              </tr>
              <tr bgcolor=#ffffdd>
                <td align=right><?php echo 'Search keyword'; ?></td>
                <td> <input type="text" name="keyword" value="<?php echo $keyword;?>" size=40 maxlength=40>


                	 <select name="criteria">
							<option value="">Select Criteria</option>


							<option value="Company_Name">Company Name</option>
							<option value="Contact_Person">Contact Person</option>



					</select>&nbsp</td>

              </tr>
              <tr>
                <td>&nbsp; </td>
                <td align=right> <input type="submit" value="Search" > </td>
              </tr>
            </table>
          </form>
          <?php if ($number_of_search_results !=0 ) { ?>
          <p><?php echo"Found " ; ?> <?php echo $number_of_search_results ;?>  for <b><?php echo "   $keyword " ;?> </b></p>
          <table width="55%" border="0" bgcolor=#CCCCDD align="left">
            <tr>
              <td width="10%"><b><?php echo "Company Number"; ?></b></td>
              <td width="30%"><b><?php echo "Company Name"; ?></b></td>
              <td width="10%"><b><?php echo "Contact Person"; ?></b></td>
              <td width="5%"><b><?php echo "Select"; ?></b></td>

            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>


            </tr>
            <?php
              echo $http_buffer;
            ?>
          </table>
          <?php } else { ?>
          <p><?php echo "Sorry, no items in the database for     <b>"; ?>  <?php echo $keyword . '</b> <FONT color="#800000">'. $message;?></font>.
          </p>
          <?php } ?>

        </ul>



		</td>
	</tr>

		<tr valign=top >

      <td bgcolor=#ffffff>
<hr> </td>

	</tr>

	</tbody>
 </table>

<p>&nbsp;</p>
</BODY>
</HTML>