<?php $bill_obj->Display_Header($LDBilling,'',''); ?>
<BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066>

<?php $bill_obj->Display_Headline($LDBillingReports,'','','billing_tz_reports.php','Billing :: Main Menu'); ?>

 
			<TABLE cellSpacing=0 width=600 class="submenu_frame" cellpadding="0" valign="middle">
			<TBODY valign="middle">
			<TR valign="middle">
				<TD valign="middle">
					<TABLE cellSpacing=1 cellPadding=3 width=600 valign="middle">
                    <TBODY class="submenu" valign="middle">
                    
				
				<TR>
                        <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
                        <TD class="submenu_item"><nobr><a href="billing_tz_archive_date.php"><?php echo $LDBillingArchiveDate; ?></a></nobr></TD>
                        <TD><?php echo $LDShowsArchiveBillsDate; ?></TD>
                      </tr>
				<TR>
                        <td align=center><img src="../../gui/img/common/default/showdata.gif" border=0></td>
                        <TD class="submenu_item"><nobr><a href="billing_tz_archive_month.php"><?php echo $LDBillingArchiveMonth; ?></a></nobr></TD>
                        <TD><?php echo $LDShowsArchiveBillsMonth; ?></TD>
                      </tr>
					  
                      <TR  height=1>
                        <TD colSpan=3 class="vspace"><IMG height=1 src="../../gui/img/common/default/pixel.gif" width=5></TD>
                      </TR>
                     
                    </TBODY>
                  </TABLE>
				</TD>
			</TR>
			</TBODY>
			</TABLE>
		

<?php $bill_obj->Display_Footer($LDBilling,'', '','billing_create_2.php','Billing :: Create Quotation'); ?>

<?php $bill_obj->Display_Credits(); ?>
