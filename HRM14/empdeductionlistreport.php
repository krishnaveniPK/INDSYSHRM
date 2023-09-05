<?php


include '../config.php';
require_once('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


session_start();
  $user_id = $_SESSION["Userid"];
  $username = $_SESSION["Username"];
  $usermail=$_SESSION["Mailid"];
  $Clientid =$_SESSION["Clientid"];
     
  $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$Payrollyear=$_SESSION['Payrollyear'];
$Payrollmonth=$_SESSION['Payrollmonth'];

$Category =$_SESSION['Category']; 
$Category = implode(',', $Category); 
$Category = "'$Category'"; // added single quote to start and end position
$Category = str_replace(",","','","$Category");


$GetState = "SELECT Employeeid,Fullname,Department,Designation,Salary_Advance,FoodDeduction,TDS FROM indsys1027employeepayrolldeduction  where SalMonth='$Payrollmonth' and Salyear='$Payrollyear' AND Category in(". $Category.")  ORDER BY Employeeid";
$result_Region = $conn->query($GetState);

$excel=new Spreadsheet();
$active=$excel->getActiveSheet();
$active->setTitle("payroll");

$excel->getActiveSheet()->getStyle( 'A1')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'B1')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'C1')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'D1')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'E1')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'F1')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle( 'G1')->getFont()->setBold( true );


$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(32);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);



$active->setCellValue('A1','EMPLOYEE ID');
$active->setCellValue('B1','EMPLOYEE NAME');
$active->setCellValue('C1','DEPARTMENT');
$active->setCellValue('D1','DESIGNATION');
$active->setCellValue('E1','SALARY ADVANCE');
$active->setCellValue('F1','FOOD & OTHER DEDUCTION');
$active->setCellValue('G1','TDS');



$file=2;
while($rows =$result_Region->fetch_assoc()){
  $active->setCellValue('A'.$file,$rows['Employeeid']);
  $active->setCellValue('B'.$file,$rows['Fullname']);
  $active->setCellValue('C'.$file,$rows['Department']);
  $active->setCellValue('D'.$file,$rows['Designation']);
  $active->setCellValue('E'.$file,$rows['Salary_Advance']);
  $active->setCellValue('F'.$file,$rows['FoodDeduction']);
  $active->setCellValue('G'.$file,$rows['TDS']);
 
  $file++;
}
$gettime = time();
$Downloadtime = time();
$gettime = "EMP_DEDUCTIONLIST_REPORT_$Payrollmonth-$Payrollyear-$Downloadtime.xls";


header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=".$gettime."");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');


$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;
?>