<?php
if($encounter['encounter_class_nr']==1){
	$ward_dept=$LDWard;
	$current_ward_dept_name=$current_ward_name;
	
}else{
	$ward_dept=$LDDepartment;
	$current_ward_dept_name=$current_dept_name;
	
}
$pataddress=$encounter['addr_str']." ".$encounter['addr_str_nr']."\n".$encounter['addr_zip']." ".$encounter['citytown_name'];
//$pdf->Line(20,750,550,750);
$pdf->ezText("\n",6);
$data[]=array("$LDLastName:\n$LDFirstName:\n$LDBday:\n$LDSex:\n\n$ward_dept:",$encounter['name_last']."\n".$encounter['name_first']."\n".formatDate2Local($encounter['date_birth'],$date_format)."\n".$encounter['sex']."\n\n".$current_ward_dept_name,'    ',"$LDEncounterNr:\n$LDAdmitDate:\n$LDAdmitTime :",$enc);

$pdf->ezTable($data,'','',array('xPos'=>'left','xOrientation'=>'right','showLines'=>0,'fontSize'=>12,'showHeadings'=>0,'shaded'=>0,'cols'=>array(0=>array('justification'=>'right'))));
# Add the PID barcode
if(file_exists($pidbarcode)){
	$imgsize=GetImageSize($pidbarcode);
 	$pdf->addPngFromFile($pidbarcode,40,650,$imgsize[0],25);
}
/*
$y=$pdf->ezText("\n",18);
$pdf->addText(280,$y,14,"$LDEncounterNr:");
$pdf->addText(280,$y-14,14,$enc);
*/
# Add the encounter barcode
if(file_exists($encbarcode)){
	$imgsize=GetImageSize($encbarcode);
 	$pdf->addPngFromFile($encbarcode,400,600,$imgsize[0],50);
}

$pdf->setStrokeColor(0,0,0);
$pdf->setLineStyle(2);
$pdf->rectangle(20,650,555,110);

# Add the person id picture
if(file_exists($idpic)){
	//$imgsize=GetImageSize($idpic);
 	$pdf->addJpegFromFile($idpic,450,655,88);
}
?>
