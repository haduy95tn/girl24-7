<? echo $_GET['dbdate']?>
<?php
require('Classes/PHPExcel.php');
require('connect/db_connect.php');
$url = "";

if(isset($_POST['btnExport'])){
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle('data');

	$rowCount = 1;
	$sheet->setCellValue('A'.$rowCount,'ID');
	$sheet->setCellValue('B'.$rowCount,'Username');
	$sheet->setCellValue('C'.$rowCount,'Sex');
	$sheet->setCellValue('D'.$rowCount,'ID Number');
	$sheet->setCellValue('E'.$rowCount,'Phone');
	$sheet->setCellValue('F'.$rowCount,'Company');
	$sheet->setCellValue('G'.$rowCount,'Address company');
	$sheet->setCellValue('H'.$rowCount,'Appointment Purpose');
	$sheet->setCellValue('I'.$rowCount,'Devices');
	$sheet->setCellValue('J'.$rowCount,'Card Guest');
	$sheet->setCellValue('K'.$rowCount,'Name Staff');
	$sheet->setCellValue('L'.$rowCount,'Part');
	$sheet->setCellValue('M'.$rowCount,'Phone Staff');
	$sheet->setCellValue('N'.$rowCount,'DateTime');
	$sheet->setCellValue('O'.$rowCount,'Time In');
	$sheet->setCellValue('P'.$rowCount,'Time Out');

	$result =$mysqli->query( "SELECT * FROM khv_thainguyen WHERE (time_out >'0' AND DateTime BETWEEN '".$_GET['dbdate']." 00:00:00"."' AND '".$_GET['dbdate']." 23:59:59' ");
	while($row = mysqli_fetch_array($result)){
		print_r($row);
/*		$rowCount++;
		$sheet->setCellValue('A'.$rowCount,$row['id']);
		$sheet->setCellValue('B'.$rowCount,$row['Username']);
		$sheet->setCellValue('C'.$rowCount,$row['Sex']);
		$sheet->setCellValue('D'.$rowCount,$row['ID_Number']);
		$sheet->setCellValue('E'.$rowCount,$row['Phone']);
		$sheet->setCellValue('F'.$rowCount,$row['Company']);
		$sheet->setCellValue('G'.$rowCount,$row['Address_Company']);
		$sheet->setCellValue('H'.$rowCount,$row['Appointment_purpose']);
		$sheet->setCellValue('I'.$rowCount,$row['devices']);
		$sheet->setCellValue('J'.$rowCount,$row['card']);
		$sheet->setCellValue('K'.$rowCount,$row['Name_Staff']);
		$sheet->setCellValue('L'.$rowCount,$row['Part']);
		$sheet->setCellValue('M'.$rowCount,$row['Phone_Staff']);
		$sheet->setCellValue('N'.$rowCount,$row['DateTime']);
		$sheet->setCellValue('O'.$rowCount,$row['time_in']);
		$sheet->setCellValue('P'.$rowCount,$row['time_out']);*/
	}

/*	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$filename = 'export.xlsx';
	$objWriter->save($filename);
	header("Location: ".$filename);*/
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Visitor</title>
    <link rel="stylesheet" href="view.css" type="text/css">
    <link rel="SHORTCUT ICON" href="image/favicon.ico">
</head>

<body>
    <form method="POST">
		<button name="btnExport" type="submit">Xuất file</button>
	</form>
</body>
</html>
