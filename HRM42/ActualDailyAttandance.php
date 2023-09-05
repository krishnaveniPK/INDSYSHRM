<?php
error_reporting(0);
set_include_path('/var/www/html/');
 include 'config.php';
 set_include_path('/var/www/html/');
 include 'mssql.php';
 set_include_path('/var/www/html/HRM16/');
include 'Attendancecalculation.php';





$user_id="";

$Clientid =1;

$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Attendancedate =  date('Y-m-d', strtotime('-1 day', strtotime($date)));
$AttendanceDate =$Attendancedate;





$Attendancemonth = date('n', strtotime($AttendanceDate));
$Attendanceyear = date('Y', strtotime($AttendanceDate));

$Manualattendence =  0;





$Manualattendence =  0;


if (mysqli_connect_errno()){
$Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
}
$resultExists = "SELECT * FROM indsys1029empdailyattendancemaster WHERE Attendencedate ='$AttendanceDate' AND Clientid ='$Clientid' LIMIT 1";
$resultExists01 = $conn->query($resultExists);


if(mysqli_fetch_row($resultExists01))
{

$GetChapter = "SELECT * FROM indsys1029empdailyattendancemaster where Clientid ='$Clientid' and Attendencedate = '$AttendanceDate'  ORDER BY Attendencedate";
$result_Chapter = $conn->query($GetChapter );
if(mysqli_num_rows($result_Chapter) > 0) { 

 
while($row = mysqli_fetch_array($result_Chapter)) {  

 $Adminapproval = $row['Adminapproval'];
 
 } 
}



}

else
{

$sqlsave = "INSERT IGNORE INTO indsys1029empdailyattendancemaster (Clientid,Attendencedate,NoofPresent,NoofAbsents,Noofleave,Addormodifydatetime,NoofEmployee,Userid,Empattendencestatus,Attendencemonth,Attendenceyear,Noofpermission,Adminapproval)
values('$Clientid','$AttendanceDate',0,0,0,'$date',0,'$user_id','Open','$Attendancemonth','$Attendanceyear',0,'No')";

$resultsave = mysqli_query($conn,$sqlsave);



}

$logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active'  AND DATE(Date_Of_Joing) <='$AttendanceDate'  ORDER BY Employeeid ASC";

//echo $logemp;
$logempall = mysqli_query($conn, $logemp);
while($row = mysqli_fetch_array($logempall)) {
$Employeeid =$row['Employeeid'];


$Title =$row['Title'];
$Firstname =$row['Firstname'];
$Lastname = $row['Lastname'];
$Gender =$row['Gender'];   
$Fullname =$row['Fullname'];   
$Allow_OT =$row['Allow_OT'];   
//$Category='Test';  

$Department =$row['Department'];

$Designation =$row['Designation'];
$EmpAutogenerationno =$row['EmpAutogenerationno'];

$Intime = "00:00:00";
$Outtime ="00:00:00";
$OTIntime = "00:00:00";
$OTOuttime ="00:00:00";
$Allowotyesorno =$Allow_OT;
$Indate ="";
$Outdate ="";
$Workinghrs = "00.00";
$ActualIntime ="00:00:00";
$ActualOuttime =$Outtime;

$AttenStatus ="A";

// $Checkweekoff = isThisDayAWeekend($AttendanceDate);
// if($Checkweekoff==true)
// {
//   $AttenStatus ="WO";
// }
$Workingdays ="0";
$msconn = connect_msdb();
$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msresp = "SELECT * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$AttendanceDate' and UserId='$Employeeid' and C4='0'  ORDER BY DeviceLogId  ASC" ;


//echo $msresp ;
$stmt = sqlsrv_query( $msconn, $msresp );
$msdlogcount = sqlsrv_num_rows($stmt);

while($msrow = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {

// echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Indate = $CreatedDate;
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$Intime = date("H:i:s",strtotime($CreatedDate));
$ActualIntime =$Intime ;

// $Intimemodified ="N";
// $Outtimemodified ="N";
// $OTinmodified ="N";
// $OToutmodified ="N";

if($Intime !="00:00:00")
{
$AttenStatus ="P";
$Workingdays ="1";
$Workinghrs = "08.00";
}


}

$Manualattendence =0;
$Regsisterattendence =0;



$resultDetail = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Attendencedate = '$AttendanceDate' and Employeeid = '$Employeeid' AND Clientid ='$Clientid' LIMIT 1";
$resultAttendance = $conn->query($resultDetail);

if(mysqli_num_rows($resultAttendance) > 0) { 


while($row = mysqli_fetch_array($resultAttendance)) 
{ 
$Manualattendence =$row['Manualattendence'];
$Regsisterattendence =$row['Regsisterattendence'];


if ($Regsisterattendence ==0)
{
$resultExists = "DELETE FROM  indsys1030empdailyattendancedetail WHERE Attendencedate = '$AttendanceDate' and Employeeid = '$Employeeid' AND Clientid ='$Clientid' LIMIT 1";
$resultExists01 = $conn->query($resultExists);


$resultattendancesave = "INSERT IGNORE INTO indsys1030empdailyattendancedetail (Clientid,Employeeid,Attendencedate,Title,Firstname,lastname,Userid,Addormodifydatetime,Workingdays,OT_HRS,Intime,Outtime,Workinghours,AttenStatus,Permissionfromtime,Permissionyesorno,Intimewithdate,Outtimewithdate,Department,Designation,Permissionouttime,Permissionhours,Actualworkinghours,ActualOt_HRS,Manualattendence,Regsisterattendence,Allowotyesorno,OTIntime,OTOuttime,ActualIntime,ActualOuttime,Breakhours,Attentypestatus,Editotin,Editotout,Editintime,Editouttime,Lophrs,Editedattenstatus,ActualOTIntime,ActualOTOuttime)
values('$Clientid','$Employeeid','$AttendanceDate','$Title','$Firstname','$Lastname','$user_id','$date','$Workingdays','00:00:00','$Intime','$Outtime','08:00','$AttenStatus','00:00:00','N','$Indate','$Outdate','$Department','$Designation','00:00:00','00:00:00',0,0,0,0,'$Allowotyesorno','$OTIntime','$OTOuttime','$ActualIntime','$ActualOuttime',0,'$AttenStatus','No','No','No','No',0,'No','00:00:00','00:00:00')";

$resultsave = mysqli_query($conn,$resultattendancesave);
if($resultsave ===TRUE)
{
  OutimeandOTfetchfromserver($conn,$msconn,$Clientid,$AttendanceDate,$Employeeid,$user_id);
}
else
{
  echo "$resultsave<br/>";

}
}
else
{
OutimeandOTfetchfromserver($conn,$msconn,$Clientid,$AttendanceDate,$Employeeid,$user_id);
}
}
}

else
{




$resultattendancesave = "INSERT IGNORE INTO indsys1030empdailyattendancedetail (Clientid,Employeeid,Attendencedate,Title,Firstname,lastname,Userid,Addormodifydatetime,Workingdays,OT_HRS,Intime,Outtime,Workinghours,AttenStatus,Permissionfromtime,Permissionyesorno,Intimewithdate,Outtimewithdate,Department,Designation,Permissionouttime,Permissionhours,Actualworkinghours,ActualOt_HRS,Manualattendence,Regsisterattendence,Allowotyesorno,OTIntime,OTOuttime,ActualIntime,ActualOuttime,Breakhours,Attentypestatus,Editotin,Editotout,Editintime,Editouttime,Lophrs,Editedattenstatus,ActualOTIntime,ActualOTOuttime)
values('$Clientid','$Employeeid','$AttendanceDate','$Title','$Firstname','$Lastname','$user_id','$date','$Workingdays','00:00:00','$Intime','$Outtime','08:00','$AttenStatus','00:00:00','N','$Indate','$Outdate','$Department','$Designation','00:00:00','00:00:00',0,0,0,0,'$Allowotyesorno','$OTIntime','$OTOuttime','$ActualIntime','$ActualOuttime',0,'$AttenStatus','No','No','No','No',0,'No','00:00:00','00:00:00')";

$resultsave = mysqli_query($conn,$resultattendancesave);

if($resultsave ===TRUE)
{
  OutimeandOTfetchfromserver($conn,$msconn,$Clientid,$AttendanceDate,$Employeeid,$user_id);
}
else
{
  echo "$resultsave<br/>";

}

}



}



function OutimeandOTfetchfromserver($conn,$msconn,$Clientid,$Attendencedate,$Employeeid,$user_id)
{

  try
  {
    $Attendancemonth = date('n', strtotime($Attendencedate));
    $Attendanceyear = date('Y', strtotime($Attendencedate));



 
 $logemp = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Clientid='$Clientid' and Attendencedate='$Attendencedate' and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";
	
   
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
$ActualIntime =$row['ActualIntime']; 
$ActualOuttime =$row['ActualOuttime'];
$Editotin = $row['Editotin'];
$Editotout = $row['Editotout'];
$Editintime =$row['Editintime']; 
$Editouttime =$row['Editouttime'];

$ActualOTIntime =$row['ActualOTIntime']; 
$ActualOTOuttime =$row['ActualOTOuttime'];


    $Workingdays=0;
    $calculatedworkinghrs =0;






$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$AddOUTTime = $Attendencedate;



if($Editintime!='Yes')
{
  $msrespin = "SELECT TOP 1 * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$Attendencedate' and UserId='$Employeeid' and C4='0'  ORDER BY DeviceLogId ASC" ;

$stmtin = sqlsrv_query( $msconn, $msrespin );


while($msrow = sqlsrv_fetch_array($stmtin,SQLSRV_FETCH_ASSOC)) {
//print_r($msrow);exit;
// echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Intimewithdate = $CreatedDate;
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$Intime = date("H:i:s",strtotime($CreatedDate));
$ActualIntime =$Intime;



}

}

  $time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
  $time_in_24_hour_format = substr(str_replace(":", ".", $time_in_24_hour_format), 0, 5);
  $Inhr = floor($time_in_24_hour_format);
 $Inminute = substr($time_in_24_hour_format, -2);
  $IntimeChk = "$Inhr.$Inminute";

  $secondShiftTime = "20";
  if($IntimeChk>=$secondShiftTime )
  {
///////////2nd Shift//////////////////

$AddOUTTime = date('Y-m-d', strtotime($Attendencedate. ' + 1 days'));


$Attendancemonth = date('n', strtotime($AddOUTTime));
$Attendanceyear = date('Y', strtotime($AddOUTTime));

if($Editouttime!='Yes')
{


$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msresp = "SELECT TOP 1 * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$AddOUTTime' and UserId='$Employeeid' and C4='1'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msresp ;
$stmt = sqlsrv_query( $msconn, $msresp );


while($msrow = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {
//print_r($msrow);exit;
// echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$Outtime = date("H:i:s",strtotime($CreatedDate));
$ActualOuttime = $Outtime;




}
}



if($Editotin !='Yes')  
{

$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msrespotintime = "SELECT TOP 1 * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$AddOUTTime' and UserId='$Employeeid' and C4='4'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msrespotintime ;
$stmtOTIN = sqlsrv_query( $msconn, $msrespotintime );


while($msrow = sqlsrv_fetch_array($stmtOTIN,SQLSRV_FETCH_ASSOC)) {
//print_r($msrow);exit;
// echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;

$OTIntime = date("H:i:s",strtotime($CreatedDate));
$ActualOTIntime = $OTIntime;



}
}

if($Editotout !='Yes')  
{
$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msrespotOTOutime = "SELECT TOP 1 * FROM $table_name where  FORMAT(LogDate,'yyyy-MM-dd') ='$AddOUTTime' and UserId='$Employeeid' and C4='5'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msrespotintime ;
$stmtOTOuttime = sqlsrv_query( $msconn, $msrespotOTOutime );


while($msrow = sqlsrv_fetch_array($stmtOTOuttime,SQLSRV_FETCH_ASSOC)) {
//print_r($msrow);exit;
// echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;

$OTOuttime = date("H:i:s",strtotime($CreatedDate));
$ActualOTOuttime = $OTOuttime;



}
}



    ///////////////////////////////
   
   
  }

  ///////////////////////1st Shift Attendance Fetching ///////////////////////
  else
  {

 //////////////////1st shift///////////////////////////////

 if($Editouttime!='Yes')
 {

 
//  $FromtimeLimit = $Intime;
$FromtimeLimit = "09:30:00";
$FromDate ="$AddOUTTime  $FromtimeLimit";

$TotimeLimit = "22:30:00";
$ToDate ="$AddOUTTime $TotimeLimit";

$msresp = "SELECT TOP 1 * FROM $table_name where   Logdate>='$FromDate' and Logdate <='$ToDate' and UserId='$Employeeid' and C4='1'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msresp ;
$stmt = sqlsrv_query( $msconn, $msresp );


while($msrow = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {
   //print_r($msrow);exit;
 // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$Outtime = date("H:i:s",strtotime($CreatedDate));
$ActualOuttime = $Outtime;




}
}



if($Editotin !='Yes')  
{

$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";
 
// $FromTimeLimit ="09:00:00";
// $FromDate ="$AddOUTTime $FromTimeLimit";

// $TotimeLimit = "20:30:00";
// $ToDate ="$AddOUTTime $TotimeLimit";
// $FromtimeLimit = $Intime;
$FromtimeLimit = "09:30:00";
$FromDate ="$AddOUTTime  $FromtimeLimit";
 $TotimeLimit = "23:45:00";
 $ToDate ="$AddOUTTime $TotimeLimit";
$msrespotintime = "SELECT TOP 1 * FROM $table_name where  Logdate>='$FromDate' and Logdate <='$ToDate'  and UserId='$Employeeid' and C4='4'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msrespotintime ;
$stmtOTIN = sqlsrv_query( $msconn, $msrespotintime );


while($msrow = sqlsrv_fetch_array($stmtOTIN,SQLSRV_FETCH_ASSOC)) {
   //print_r($msrow);exit;
 // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;

$OTIntime = date("H:i:s",strtotime($CreatedDate));
$ActualOTIntime = $OTIntime;



}
}

if($Editotout !='Yes')  
{
 
 // $FromTimeLimit ="09:00:00";
 // $FromDate ="$AddOUTTime $FromTimeLimit";
 
 // $TotimeLimit = "20:30:00";
 // $ToDate ="$AddOUTTime $TotimeLimit";
 $FromtimeLimit = "09:30:00";
 $FromDate ="$AddOUTTime  $FromtimeLimit";
 $TotimeLimit = "23:59:00";
 $ToDate ="$AddOUTTime $TotimeLimit";
$table_name = "DeviceLogs_".$Attendancemonth."_".$Attendanceyear."";

$msrespotOTOutime = "SELECT TOP 1 * FROM $table_name where   Logdate>='$FromDate' and Logdate<='$ToDate' and UserId='$Employeeid' and C4='5'  ORDER BY DeviceLogId ASC" ;

// $msresp = "SELECT * FROM '.$table_name.' where CreatedDate >='$Fromdate' and CreatedDate <='$Todate' and UserId='$Employeeid' and C1='in'  ORDER BY DeviceLogId ASC" ;
// echo $msrespotintime ;
$stmtOTOuttime = sqlsrv_query( $msconn, $msrespotOTOutime );


while($msrow = sqlsrv_fetch_array($stmtOTOuttime,SQLSRV_FETCH_ASSOC)) {
   //print_r($msrow);exit;
 // echo $msrow;
$CreatedDate = $msrow['LogDate'];
$Outtimewithdate = $CreatedDate;

$OTOuttime = date("H:i:s",strtotime($CreatedDate));
$ActualOTOuttime = $OTOuttime;



}
}



  
  
}



if($AttenStatus=="A")
{

  $MyGivenDateIn = strtotime($Attendencedate);
  $ConverDate = date("l", $MyGivenDateIn);
  $ConverDateTomatch = strtolower($ConverDate);
  if(($ConverDateTomatch == "sunday"))
  {
  	$AttenStatus="WO";

  }
}

Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime,$user_id,$ActualOTIntime,$ActualOTOuttime);


 }

  }
  catch(Exception $e)
  {

  }

}


?>