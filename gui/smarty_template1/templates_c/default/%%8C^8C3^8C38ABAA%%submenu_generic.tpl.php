<?php /* Smarty version 2.6.22, created on 2013-05-06 19:54:52
         compiled from pharmacy/submenu_generic.tpl */ ?>
		<form name="substore_select" method="post" action="">
			<TABLE cellSpacing=0  width=600 class="submenu_frame" cellpadding="0">
			<TBODY>
			<TR>
				<TD>
					<TABLE cellSpacing=1 cellPadding=3 width=600>
					<TBODY class="submenu">
<TR><td><?php echo $this->_tpl_vars['sloc_nr']; ?>
</td></tr>

						<TR>
							<td colspan="3" class="submenu_title"  align=left><?php echo $this->_tpl_vars['TP_SELECT_BLOCK']; ?>
 <?php echo $this->_tpl_vars['sTitleIcon']; ?>
 <?php echo $this->_tpl_vars['LDSelectsubstore']; ?>
 </td>
						</tr>

						
						
						<TR>
							<td align=center><?php echo $this->_tpl_vars['sOutPatientIcon']; ?>
</td>
							<TD class="submenu_item"><a href="pharmacy_tz">click here</a></nobr></TD>
							<TD><?php echo $this->_tpl_vars['LDStoreListTxt']; ?>
</TD>
						</tr>
						
						
					</TBODY>
					</TABLE>
				</TD>
			</TR>
			</TBODY>
			</TABLE>
			<!--do not omit  $TP _HINPUTS , must be inside the form tags -->
			<?php echo $this->_tpl_vars['TP_HINPUTS']; ?>

			<?php echo $this->_tpl_vars['TP_HIDDENS']; ?>

		</form>