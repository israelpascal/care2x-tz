
	
<table width="100%" border="0" align="center">
	<tr>
		<td><?php echo $LDDateFrom; ?><input name="date_from" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_from'] ?>">
            <a href="javascript:show_calendar('form1.date_from','<?php echo $date_format ?>')">
            <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>
        
        
			<?php echo $LDDateTo; ?>
            <input name="date_to" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_to'] ?>" >
            <a href="javascript:show_calendar('form1.date_to','<?php echo $date_format ?>')">
                <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>
                <font size=1>[dd/mm/yyyy]
        
           
			     <select name="dept" size="1">
                   <option value="all">all</option>
<?php
while(list($x,$v)=each($medical_depts)){

?>
<option value="<?php echo $v['nr'];?>"><?php echo $v['name_formal'];?></option>
<?php
}
?>
<input type="submit" name="show" value="<?php echo $LDShow; ?>"> 
</select>

        </td>
	</tr>
	
</table>












