<?php


error_reporting(0);
include '../config.php';
include 'Attendancecalculation.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );

$logempnew = "SELECT * FROM indsys1017employeemaster WHERE   Empactive='Active' and Type_Of_Posistion='Category 3'  ORDER BY Employeeid ASC";
	
   
$logempallnew = mysqli_query($conn, $logempnew);
while($row = mysqli_fetch_array($logempallnew)) {
 
  
   $Employeeid =$row['Employeeid'];

$logemp = "SELECT * FROM indsys1030empdailyattendancedetail WHERE  Attendencedate='2023-03-31'   and Clientid='1' and Employeeid='$Employeeid'   ORDER BY Employeeid ASC";
	
   
$logempall = mysqli_query($conn, $logemp);
while($row = mysqli_fetch_array($logempall)) {
 
  $AttenStatus =$row['AttenStatus'];
  $Intime =$row['Intime'];
  $Outtime =$row['Outtime'];
  $Permissionyesorno =$row['Permissionyesorno'];
$OTIntime =$row['OTIntime'];
$OTOuttime =$row['OTOuttime'];
$Manualattendence = $row['Manualattendence'];
$Regsisterattendence = $row['Regsisterattendence'];
$ActualIntime =$row['ActualIntime']; ;
$ActualOuttime =$row['ActualOuttime'];;
$Attendancedate = $row['Attendencedate'];
  
Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendancedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime,$user_id);
echo "$Attendancedate  $Employeeid <br/>";
}
}


// function getHoursAndMins($time, $format = '%02d:%02d')
// {
//     if ($time < 1) {
//         return;
//     }
//     $hours = floor($time / 60);
//     $minutes = ($time % 60);
//     return sprintf($format, $hours, $minutes);
// }

// function getIntervalMinutes($Intime , $OutTime){
// 	$dateTimeObject1 = date_create($Intime); 
// $dateTimeObject2 = date_create($OutTime); 
// $interval = date_diff($dateTimeObject1, $dateTimeObject2); 

// $minutes = $interval->days * 24 * 60;
// $minutes += $interval->h * 60;
// return $minutes += $interval->i;
// }
?>