<?php


error_reporting(0);
include '../config.php';
include 'Attendancecalculation.php';
require_once ('class.phpmailer.php');
include ("class.smtp.php");
 include '../mssql.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';
$Sessionid = $_SESSION["SESSIONID"];
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];
 //$MethodGet='Save';
if($MethodGet == 'LoadDate')
{
    $date01 =date("Y-m-d H:i:s" );
   
   
    header('Content-Type: application/json');
    echo json_encode($data01);
 }
 //////////////////////////
 if($MethodGet == 'Save')
{


try
{
    

    // $AttendanceDate ='2022-07-01';
    //  $Atendancestatus ="Open";
    $AttendanceDate =$form_data['AttendanceDate'];
     $Atendancestatus =$form_data['Atendancestatus'];
   
    $Attendancemonth = date('n', strtotime($AttendanceDate));
    $Attendanceyear = date('Y', strtotime($AttendanceDate));
  
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

if($Adminapproval =='Yes')
 
{
    $attandancedate = $AttendanceDate;

$datecon = (new DateTime($attandancedate))->getTimestamp();
$new_date = date("Y-m-d H:i:s", strtotime('+46 hours', $datecon));


$dt=$new_date;
        $dt1 = strtotime($dt);
        $dt2 = date("l", $dt1);
        $dt3 = strtolower($dt2);
    if( ($dt3 == "sunday"))
		{
            $datecon = (new DateTime($new_date))->getTimestamp();
            $new_date = date("Y-m-d H:i:s", strtotime('+24 hours', $datecon ));
        } 
    else
		{
            
        }



  

$Currentdate = date("Y-m-d H:i:s" );
if ($new_date > $Currentdate)
{
   
}
else
{
  $Message ="AdminPermission";
  $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return; 
}
}
 
}

  else
  {

    $sqlsave = "INSERT IGNORE INTO indsys1029empdailyattendancemaster (Clientid,Attendencedate,NoofPresent,NoofAbsents,Noofleave,Addormodifydatetime,NoofEmployee,Userid,Empattendencestatus,Attendencemonth,Attendenceyear,Noofpermission,Adminapproval)
    values('$Clientid','$AttendanceDate',0,0,0,'$date',0,'$user_id','Open','$Attendancemonth','$Attendanceyear',0,'No')";

    $resultsave = mysqli_query($conn,$sqlsave);
     

    
 }

 $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active'  AND DATE(Date_Of_Joing) <='$AttendanceDate'   ORDER BY Employeeid ASC";
	
   //echo $logemp;
 $logempall = mysqli_query($conn, $logemp);
 while($row = mysqli_fetch_array($logempall)) {
  $Department =$row['Department'];


   $Employeeid =$row['Employeeid'];


$Title =$row['Title'];
$Firstname =$row['Firstname'];
$Lastname = $row['Lastname'];
$Gender =$row['Gender'];   
$Fullname =$row['Fullname'];   
$Allow_OT =$row['Allow_OT'];   
//$Category='Test';  



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


  while($rownewww = mysqli_fetch_array($resultAttendance)) 
  { 
    $Manualattendence =$rownewww['Manualattendence'];
    $Regsisterattendence =$rownewww['Regsisterattendence'];
    
   
  if ($Regsisterattendence ==0)
  {
    $resultExists = "DELETE FROM  indsys1030empdailyattendancedetail WHERE Attendencedate = '$AttendanceDate' and Employeeid = '$Employeeid' AND Clientid ='$Clientid' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);


    $resultattendancesave = "INSERT IGNORE INTO indsys1030empdailyattendancedetail (Clientid,Employeeid,Attendencedate,Title,Firstname,lastname,Userid,Addormodifydatetime,Workingdays,OT_HRS,Intime,Outtime,Workinghours,AttenStatus,Permissionfromtime,Permissionyesorno,Intimewithdate,Outtimewithdate,Department,Designation,Permissionouttime,Permissionhours,Actualworkinghours,ActualOt_HRS,Manualattendence,Regsisterattendence,Allowotyesorno,OTIntime,OTOuttime,ActualIntime,ActualOuttime,Breakhours,Attentypestatus,Editotin,Editotout,Editintime,Editouttime,Lophrs,Editedattenstatus,ActualOTIntime,ActualOTOuttime)
    values('$Clientid','$Employeeid','$AttendanceDate','$Title','$Firstname','$Lastname','$user_id','$date','$Workingdays','00:00:00','$Intime','$Outtime','08:00','$AttenStatus','00:00:00','N','$Indate','$Outdate','$Department','$Designation','00:00:00','00:00:00',0,0,0,0,'$Allowotyesorno','$OTIntime','$OTOuttime','$ActualIntime','$ActualOuttime',0,'$AttenStatus','No','No','No','No',0,'No','00:00:00','00:00:00')";

    $resultsave = mysqli_query($conn,$resultattendancesave);
     
    OutimeandOTfetchfromserver($conn,$msconn,$Clientid,$AttendanceDate,$Employeeid,$user_id);
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
     
    OutimeandOTfetchfromserver($conn,$msconn,$Clientid,$AttendanceDate,$Employeeid,$user_id);
    
 }



 }





 $Message ="OKAY";


 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}

////////////////////////////////////////
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
  // $OTOuttime ="00:00:00";
  // $OTIntime ="00:00:00";
  // $Outtime ="00:00:00";
  // $ActualIntime ="00:00:00";
  // $ActualOuttime="00:00:00";
  // $ActualOTIntime ="00:00:00";
  // $ActualOTOuttime ="00:00:00";
  }
}

Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime,$user_id,$ActualOTIntime,$ActualOTOuttime);


 }

  }
  catch(Exception $e)
  {

  }

}




///////////////////////////////////////
if($MethodGet == 'FetchDate')
{

    try
    { 
  

      $date=date("Y-m-d");

    
$Message ="No";

      
      $resultExistsnew = "SELECT Attendencedate FROM indsys1029empdailyattendancemaster WHERE Attendencedate = '$date' AND Clientid = '$Clientid' LIMIT 1";
      $resultExists01new = $conn->query($resultExistsnew);

      if (mysqli_fetch_row($resultExists01new))
      {

        $Message ="Yes";
       
      }
      else
      {
        $Message ="No";
      }
   
 
    
    $Display=array(
      'date'=>  $date,
      'Message' =>$Message
      
   
     
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
   
 }


 function EmpNotInList( $conn,$Clientid,$AttendanceDate,$msconn,$user_id,$date )
 {
  $Attendancemonth = date('n', strtotime($AttendanceDate));
  $Attendanceyear = date('Y', strtotime($AttendanceDate));
  $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active'  AND DATE(Date_Of_Joing) <='$AttendanceDate' AND Employeeid NOT IN ( SELECT Employeeid FROM indsys1030empdailyattendancedetail WHERE Clientid='$Clientid' AND Attendencedate='$AttendanceDate' AND Employeeid IS NOT NULL)";
	
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

$AttenStatus ="A";
$Workingdays ="0";

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
$ActualOuttime =$Outtime;
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
     
    OutimeandOTfetchfromserver($conn,$msconn,$Clientid,$AttendanceDate,$Employeeid,$user_id);
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
     
    OutimeandOTfetchfromserver($conn,$msconn,$Clientid,$AttendanceDate,$Employeeid,$user_id);
    
 }



 }
 }
 ///////////////////////////////////
 if($MethodGet == 'DISPATT')
{
    $AttendanceDate =$form_data['AttendanceDate'];
    $data01 =[];
   $GetState = "SELECT * FROM vwdailyattancewithresthrs where Attendencedate='$AttendanceDate' AND Clientid='$Clientid'   ORDER BY Employeeid";
   
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
 }
 ////////////////////////////////

 if($MethodGet == 'DISPATT01')
 {
     $AttendanceDate =$form_data['AttendanceDate'];
     $Employeeid =$form_data['Employeeid'];
     $data01 =[];
    $GetState = "SELECT * FROM vwdailyattancewithresthrs where Attendencedate='$AttendanceDate' AND Clientid='$Clientid' AND Employeeid='$Employeeid'  ORDER BY Employeeid";
     $result_Region = $conn->query($GetState);
   
     if(mysqli_num_rows($result_Region) > 0) { 
     while($row = mysqli_fetch_array($result_Region)) {  
       $data01[] = $row;
       } 
     }        
     header('Content-Type: application/json');
     echo json_encode($data01);
  }


 /////////////////////////////////////
 if($MethodGet == 'CalculationUpdate')
{


try
{

    $Employeeid =$form_data['Employeeid'];
    $Attendencedate =$form_data['Attendencedate'];
    $AttenStatus =$form_data['AttenStatus'];
    $Intime =$form_data['Intime'];
    $Outtime =$form_data['Outtime'];
    $Permissionyesorno =$form_data['Permissionyesorno']; 
    $OTIntime = $form_data['OTIntime'];
    $OTOuttime = $form_data['OTOuttime'];
    $Manualattendence = 0;
    $Regsisterattendence = 1; 
    if($Intime="00:00")
    {
      $Intime="00:00:00";
    }
    if($Outtime="00:00")
    {
      $Outtime="00:00:00";
    }
    Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$user_id);

$Message ="Exists";



  

   
 

 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
///////////////////////////////////////////////


//////////////////////////


///////////////////////////////////////////////////////////

if($MethodGet=="MasterUpdate")
{
  try
  {
   
  $AttendanceDate =$form_data['AttendanceDate'];
  $Atendancestatus =$form_data['Atendancestatus'];
  $Presents = "Select count(Attentypestatus) as testPresent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='P'  ORDER BY Employeeid ASC";
  
  $NoofPresents01 =mysqli_query($conn,$Presents);
  $testPresents = mysqli_fetch_assoc($NoofPresents01);
  $NoofPresent =$testPresents['testPresent'];
  

  $Absents = "Select count(Attentypestatus) as testAbsent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='A'  ORDER BY Employeeid ASC";
  $NoofAbsent01 =mysqli_query($conn,$Absents);
  $testAbsent = mysqli_fetch_assoc($NoofAbsent01);
  $NoofAbsents =$testAbsent['testAbsent'];


  $Leave = "Select count(Attentypestatus) as testLeave from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='L'  ORDER BY Employeeid ASC";
  $Noofleave01 =mysqli_query($conn,$Leave);
  $testleave = mysqli_fetch_assoc($Noofleave01);
  $Noofleave =$testleave['testLeave'];
 
  $Empcount ="Select count(Employeeid) as NoofEmp from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'    ORDER BY Employeeid ASC";
  $NoofEmployee01 = mysqli_query($conn,$Empcount);
  $testNoofEmp = mysqli_fetch_assoc($NoofEmployee01);
  $NoofEmployee = $testNoofEmp['NoofEmp'];

 
 // if(empty($AttenStatus))
 // {
 //  $Atendancestatus="Open";
 // }
  $resultExists = "Update indsys1029empdailyattendancemaster set 

  NoofPresent ='$NoofPresent',
  NoofAbsents='$NoofAbsents',
  Noofleave ='$Noofleave',
  NoofEmployee ='$NoofEmployee',
Addormodifydatetime ='$date',
Userid ='$user_id'
   WHERE   Attendencedate='$AttendanceDate' AND Clientid='$Clientid'  ";
$resultExists01 = $conn->query($resultExists);
//$Message ="Exists";



///////////////////
$logemp = "SELECT * FROM indsys1003departmentmaster WHERE Clientid='$Clientid'     ORDER BY Department ASC";
	
//echo $logemp;
$logempall = mysqli_query($conn, $logemp);
while($row = mysqli_fetch_array($logempall)) {
    $NoofDeptPresent =0;
    $NoofDeptAbsents =0;
    $NoofDeptleave =0;
    $NoofDeptEmployee =0;


$Department =$row['Department'];


  $Presents = "Select count(Attentypestatus) as testPresent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='P' AND Department='$Department'  ORDER BY Employeeid ASC";
  
  $NoofPresents01 =mysqli_query($conn,$Presents);
  $testPresents = mysqli_fetch_assoc($NoofPresents01);
  $NoofDeptPresent =$testPresents['testPresent'];
  

  $Absents = "Select count(Attentypestatus) as testAbsent from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='A' AND Department='$Department' ORDER BY Employeeid ASC";
  $NoofAbsent01 =mysqli_query($conn,$Absents);
  $testAbsent = mysqli_fetch_assoc($NoofAbsent01);
  $NoofDeptAbsents =$testAbsent['testAbsent'];


  $Leave = "Select count(Attentypestatus) as testLeave from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate'  and Attentypestatus='L' AND Department='$Department' ORDER BY Employeeid ASC";
  $Noofleave01 =mysqli_query($conn,$Leave);
  $testleave = mysqli_fetch_assoc($Noofleave01);
  $NoofDeptleave =$testleave['testLeave'];
 
  $Empcount ="Select count(Employeeid) as NoofEmp from indsys1030empdailyattendancedetail  WHERE Clientid='$Clientid' and Attendencedate='$AttendanceDate' AND Department='$Department'   ORDER BY Employeeid ASC";
  $NoofEmployee01 = mysqli_query($conn,$Empcount);
  $testNoofEmp = mysqli_fetch_assoc($NoofEmployee01);
  $NoofDeptEmployee = $testNoofEmp['NoofEmp'];

  $resultExists = "SELECT * FROM indsys1029empdailyattendancedeptmaster  WHERE   Attendencedate='$AttendanceDate' AND Clientid='$Clientid' AND Department='$Department' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $resultExists = "Update indsys1029empdailyattendancedeptmaster set 

    NoofPresent ='$NoofDeptPresent',
    NoofAbsents='$NoofDeptAbsents',
    Noofleave ='$NoofDeptleave',
    NoofEmployee ='$NoofDeptEmployee',
  Addormodifydatetime ='$date',
  Userid ='$user_id'
     WHERE   Attendencedate='$AttendanceDate' AND Clientid='$Clientid' AND Department='$Department' ";
  $resultExists01 = $conn->query($resultExists);
//  $Message ="Exists";
 
 
  }

  else
  {

    $sqlsave = "INSERT IGNORE INTO indsys1029empdailyattendancedeptmaster (Clientid,Attendencedate,NoofPresent,NoofAbsents,Noofleave,Addormodifydatetime,NoofEmployee,Userid,Attendencemonth,Attendenceyear,Noofpermission,Department)
    values('$Clientid','$AttendanceDate','$NoofDeptPresent','$NoofDeptAbsents','$NoofDeptleave','$date','$NoofDeptEmployee','$user_id','$Attendancemonth','$Attendanceyear',0,'$Department')";

    $resultsave = mysqli_query($conn,$sqlsave);
     

    
 }
 

}
/////////////////////////////////////////
$Display=array('Message' =>$Message);

$str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
}
///////////////////////////////
if($MethodGet == 'FetchMaster')
{

    try
    { 
  

      $AttendanceDate =$form_data['AttendanceDate'];
     $Empattendencestatus ="Open";
      $NoofPresent =0;
      $NoofAbsents =0;
      $Noofleave = 0;
      $NoofEmployee =0;
   
      $Adminapproval = "";
   
    $GetChapter = "SELECT * FROM indsys1029empdailyattendancemaster where Clientid ='$Clientid' and Attendencedate = '$AttendanceDate'  ORDER BY Attendencedate";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
      $NoofPresent =$row['NoofPresent'];
      $NoofAbsents =$row['NoofAbsents'];
      $Noofleave = $row['Noofleave'];
      $NoofEmployee =$row['NoofEmployee'];
      $Empattendencestatus = $row['Empattendencestatus'];
      $Adminapproval = $row['Adminapproval'];
      $msconn = connect_msdb();
      EmpNotInList( $conn,$Clientid,$AttendanceDate,$msconn,$user_id,$date);
      
      } 
    }

    $Display=array(
      'NoofPresent'=>  $NoofPresent,
      'NoofAbsents'=> $NoofAbsents,
      'Noofleave'=>  $Noofleave,
      'NoofEmployee'=> $NoofEmployee,  
       'Empattendencestatus' =>$Empattendencestatus,
       'Adminapproval' =>$Adminapproval
   
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
 

   
 }

 if($MethodGet == 'EditDetail')
 {
 
     try
     { 
   
 
       $Employeeid =$form_data['Employeeid'];
       $Attendencedate =$form_data['Attendencedate'];
    
     $GetChapter = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Attendencedate = '$Attendencedate' And Employeeid='$Employeeid'  ORDER BY Employeeid";
     $result_Chapter = $conn->query($GetChapter );
     if(mysqli_num_rows($result_Chapter) > 0) { 
 
       
     while($row = mysqli_fetch_array($result_Chapter)) {  
       $Title =$row['Title'];
       $Firstname =$row['Firstname'];
       $lastname = $row['lastname'];
       $Fullname ="$Title $Firstname $lastname";
       $Workingdays =$row['Workingdays'];
       $OT_HRS = $row['OT_HRS'];
       $Intime =$row['Intime'];
       $Outtime = $row['Outtime'];
       $Workinghours =$row['Workinghours'];
       $AttenStatus =$row['AttenStatus'];
       $Actualworkinghours = $row['Actualworkinghours'];
       $ActualOt_HRS =$row['ActualOt_HRS'];
       $OTIntime = $row['OTIntime'];
       $OTOuttime = $row['OTOuttime'];
       $Allowotyesorno =$row['Allowotyesorno'];
       $Permissionyesorno = $row['Permissionyesorno'];
       $Manualattendence = $row['Manualattendence'];
       $Mismatchedattendence=$row['Mismatchedattendence'];
     
       
       } 
     }
 
     $Display=array(
      'Title'=>$Title,
      'Firstname'=>$Firstname,
      'lastname'=>$lastname,
       'Fullname'=>  $Fullname,
       'Workingdays'=> $Workingdays,
       'OT_HRS'=>  $OT_HRS,
       'Intime'=> $Intime,  
       'Outtime'=>  $Outtime,
       'Workinghours'=> $Workinghours,
       'AttenStatus'=>  $AttenStatus,
       'Actualworkinghours'=> $Actualworkinghours,
       'ActualOt_HRS'=> $ActualOt_HRS,
       'OTIntime'=>  $OTIntime,
       'OTOuttime'=> $OTOuttime,
       'Allowotyesorno'=> $Allowotyesorno,
       'Permissionyesorno' =>$Permissionyesorno,
       'Manualattendence' =>$Manualattendence,
       'Mismatchedattendence' =>$Mismatchedattendence
    
    
   
   );
    
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
  
 
    
  }


  if($MethodGet == 'CalculateManually')
{


try
{

    $Employeeid =$form_data['Employeeid'];
    $Attendencedate =$form_data['Attendencedate'];
    $AttenStatus =$form_data['AttenStatus'];
    $Intime =$form_data['Intime'];
    $Outtime =$form_data['Outtime'];
    $Permissionyesorno =$form_data['Permissionyesorno']; 
    $OTIntime = $form_data['OTIntime'];
    $OTOuttime = $form_data['OTOuttime'];
    $Manualattendence = 0;
    $Regsisterattendence = 1; 
    $Editedvalues = $form_data['Editedvalues'];
    if($Intime=="00:00")
    {
      $Intime="00:00:00";
    }
    if($Outtime=="00:00")
    {
      $Outtime="00:00:00";
    }

    if($OTIntime=="00:00")
    {
      $OTIntime="00:00:00";
    }
    if($OTOuttime=="00:00")
    {
      $OTOuttime="00:00:00";
    }
    

    if($Editedvalues==0)
{
  $resultExists = "Update indsys1030empdailyattendancedetail set 
  Editedattenstatus ='Yes',  
      
    Addormodifydatetime ='$date',
    Userid ='$user_id'
       WHERE   Attendencedate='$Attendencedate' AND Clientid='$Clientid' and Employeeid='$Employeeid' ";
    $resultExists01 = $conn->query($resultExists);

}
//     $GetChapter = "SELECT * FROM indsys1029empdailyattendancemaster where Clientid ='$Clientid' and Attendencedate = '$Attendencedate'  ORDER BY Attendencedate";
//     $result_Chapter = $conn->query($GetChapter );
//     if(mysqli_num_rows($result_Chapter) > 0) { 

      
//     while($row = mysqli_fetch_array($result_Chapter)) {  
   
//       $Adminapproval = $row['Adminapproval'];
      
//       } 
//     }

// if($Adminapproval =='Yes')
 
// {
//     $attandancedate = $Attendencedate;

// $datecon = (new DateTime($attandancedate))->getTimestamp();
// $new_date = date("Y-m-d H:i:s", strtotime('+46 hours', $datecon));


// $dt=$new_date;
//         $dt1 = strtotime($dt);
//         $dt2 = date("l", $dt1);
//         $dt3 = strtolower($dt2);
//     if( ($dt3 == "sunday"))
// 		{
//             $datecon = (new DateTime($new_date))->getTimestamp();
//             $new_date = date("Y-m-d H:i:s", strtotime('+24 hours', $datecon ));
//         } 
//     else
// 		{
            
//         }



  

// $Currentdate = date("Y-m-d H:i:s" );
// if ($new_date > $Currentdate)
// {


//   $logemp = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Clientid='$Clientid' and Attendencedate='$Attendencedate' and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";
	
   
//   $logempall = mysqli_query($conn, $logemp);
//   while($row = mysqli_fetch_array($logempall)) {
   
    
//  $ActualIntime =$row['ActualIntime']; ;
//  $ActualOuttime =$row['ActualOuttime'];;
//   }
//   $test= Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime,$user_id);
// }
// else
// {
//   $Message ="AdminPermission";
//   $Display=array('Message' =>$Message);

//   $str = json_encode($Display);
// echo trim($str, '"');
// return; 
// }
// }
// else
// {
//   $logemp = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Clientid='$Clientid' and Attendencedate='$Attendencedate' and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";
	
   
//   $logempall = mysqli_query($conn, $logemp);
//   while($row = mysqli_fetch_array($logempall)) {
   
    
//  $ActualIntime =$row['ActualIntime']; ;
//  $ActualOuttime =$row['ActualOuttime'];;
// $ActualOTIntime =$row['ActualOTIntime']; 
// $ActualOTOuttime =$row['ActualOTOuttime'];
//   }
//   $test= Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime,$user_id, $ActualOTIntime,$ActualOTOuttime);

// }




$logemp = "SELECT * FROM indsys1030empdailyattendancedetail WHERE Clientid='$Clientid' and Attendencedate='$Attendencedate' and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";
	
   
  $logempall = mysqli_query($conn, $logemp);
  while($row = mysqli_fetch_array($logempall)) {
   
    
 $ActualIntime =$row['ActualIntime']; ;
 $ActualOuttime =$row['ActualOuttime'];;
 $ActualOTIntime =$row['ActualOTIntime']; 
$ActualOTOuttime =$row['ActualOTOuttime'];
  }
  $test= Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime,$user_id, $ActualOTIntime,$ActualOTOuttime);

if($test=="Success")
{
if($Editedvalues==1)
{
  $resultExists = "Update indsys1030empdailyattendancedetail set 
  Editintime ='Yes',  
      
    Addormodifydatetime ='$date',
    Userid ='$user_id'
       WHERE   Attendencedate='$Attendencedate' AND Clientid='$Clientid' and Employeeid='$Employeeid' ";
    $resultExists01 = $conn->query($resultExists);

}
if($Editedvalues==2)
{
  $resultExists = "Update indsys1030empdailyattendancedetail set 
  Editouttime ='Yes',  
      
    Addormodifydatetime ='$date',
    Userid ='$user_id'
       WHERE   Attendencedate='$Attendencedate' AND Clientid='$Clientid' and Employeeid='$Employeeid' ";
    $resultExists01 = $conn->query($resultExists);
}
if($Editedvalues==3)
{
  $resultExists = "Update indsys1030empdailyattendancedetail set 
  Editotin ='Yes',  
      
    Addormodifydatetime ='$date',
    Userid ='$user_id'
       WHERE   Attendencedate='$Attendencedate' AND Clientid='$Clientid' and Employeeid='$Employeeid' ";
    $resultExists01 = $conn->query($resultExists);
}
if($Editedvalues==4)
{
  $resultExists = "Update indsys1030empdailyattendancedetail set 
  Editotout ='Yes',  
      
    Addormodifydatetime ='$date',
    Userid ='$user_id'
       WHERE   Attendencedate='$Attendencedate' AND Clientid='$Clientid' and Employeeid='$Employeeid' ";
    $resultExists01 = $conn->query($resultExists);
}
}
  





$Message=$test;

   
 

 $Display=array('Message' =>$Message,'test' =>$test);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}

if($MethodGet=="CloseAttendence")
{
  try
  {
    $AttendanceDate =$form_data['AttendanceDate'];
   


    
    if (mysqli_connect_errno()){
      $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
    }
    $resultExists = "SELECT  Clientid, Attendencedate FROM  indsys1030empdailyattendancedetail where Mismatchedattendence='Yes' AND Attendencedate='$AttendanceDate' AND Clientid='$Clientid'

    GROUP BY Clientid, Attendencedate,Mismatchedattendence";
  

 
    $resultExists01 = $conn->query($resultExists);



  
   
   if(mysqli_fetch_row($resultExists01))
    {
      
      $Message ="Attendence";
      $Display=array('Message' =>$Message);
    
      $str = json_encode($Display);
      echo trim($str, '"');
      return;
   
    }

    else
    {
      $resultExists = "Update indsys1029empdailyattendancemaster set 
      Empattendencestatus ='Close',  
      
    Addormodifydatetime ='$date',
    Userid ='$user_id'
       WHERE   Attendencedate='$AttendanceDate' AND Clientid='$Clientid'  ";
    $resultExists01 = $conn->query($resultExists);
    $Message ="Exists";
    $Display=array('Message' =>$Message);
    
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
    }
}
catch(Exception $e)
{

}
}


if($MethodGet=="MAILTOADMIN")
{
  try
  {
    $AttendanceDate =$form_data['AttendanceDate'];


   if(empty($AttendanceDate))
   {
    $Message ="AttendanceDT";
    $Display=array('Message' =>$Message);
  
    $str = json_encode($Display);
  echo trim($str, '"');
  return; 
   }

    
    $GetChapter = "SELECT * FROM indsys1029empdailyattendancemaster where Clientid ='$Clientid' and Attendencedate = '$AttendanceDate'  ORDER BY Attendencedate";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
   
      $Adminapproval = $row['Adminapproval'];
      
      } 
    }

if($Adminapproval =='No')
 
{
    $attandancedate = $AttendanceDate;

$datecon = (new DateTime($attandancedate))->getTimestamp();
$new_date = date("Y-m-d H:i:s", strtotime('+36 hours', $datecon));


$dt=$new_date;
        $dt1 = strtotime($dt);
        $dt2 = date("l", $dt1);
        $dt3 = strtolower($dt2);
if( ($dt3 == "sunday"))
		{
            $datecon = (new DateTime($new_date))->getTimestamp();
            $new_date = date("Y-m-d H:i:s", strtotime('+24 hours', $datecon ));
        } 
    else
		{
            
}



  

$Currentdate = date("Y-m-d H:i:s" );
if ($new_date > $Currentdate)
{
  $Message ="No Need";
  $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
return; 
}
else
{
  


  $GetSuperusermail = "SELECT * FROM indsys1000useradmin where  Authorizedtype = 'ADMIN' AND Clientid='$Clientid' ";
  $result_Supermail = $conn->query($GetSuperusermail );
  if(mysqli_num_rows($result_Supermail) > 0) { 
  
    
  while($row = $result_Supermail->fetch_assoc()) {  
    $Usermailid =$row['Emailid'];
    
    $MailTo .= "$Usermailid,";
    } 
  }
  
  if ($MailTo == "")
  
  {
  
  }
  
  else
  
  {
  
  
  
      $MailTo = substr($MailTo, 0, -1);
  
  }
  $AttendanceDTFORMAT = date('d-M-Y', strtotime($AttendanceDate));
  $mail = new PHPMailer(false); 
  $mail->IsSMTP();
    $Mailcontent ="<!doctype html>
  <html>
    <head>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
      <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
      <title>Email</title>
      <style>
      
        body {
          background-color: #f6f6f6;
          font-family: sans-serif;
          -webkit-font-smoothing: antialiased;
          font-size: 14px;
          line-height: 1.4;
          margin: 0;
          padding: 0;
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%; 
        }
  
        table {
          border-collapse: separate;
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          width: 100%; }
          table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top; 
        }
  
  
        .body {
          background-color: #f6f6f6;
          width: 100%; 
        }
  
        .container {
          display: block;
          margin: 0 auto !important;
          max-width: 800px;
          padding: 10px;
          width: 800px; 
        }
  
        .content {
          box-sizing: border-box;
          display: block;
          margin: 0 auto;
          max-width: 800px;
          padding: 10px; 
        }
  
  
        .main {
          background: #ffffff;
          border-radius: 3px;
          width: 100%; 
        }
  
        .wrapper {
          box-sizing: border-box;
          padding: 20px; 
        }
  
        .content-block {
          padding-bottom: 10px;
          padding-top: 10px;
        }
  
        .footer {
          clear: both;
          margin-top: 10px;
          text-align: center;
          width: 100%; 
        }
          .footer td,
          .footer p,
          .footer span,
          .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center; 
        }
  
      
  
        p,
        ul,
        ol {
          font-family: sans-serif;
          font-size: 18px;
          font-weight: normal;
          line-height: 1.5;
          margin: 0;
          margin-bottom: 15px; 
        }
          p li,
          ul li,
          ol li {
            list-style-position: inside;
            margin-left: 5px; 
        }
  
        a {
          color: #3498db;
          text-decoration: underline; 
        }
  
   
  
        @media only screen and (max-width: 620px) {
          table.body h1 {
            font-size: 28px !important;
            margin-bottom: 10px !important; 
          }
          table.body p,
          table.body ul,
          table.body ol,
          table.body td,
          table.body span,
          table.body a {
            font-size: 16px !important; 
          }
          table.body .wrapper,
          table.body .article {
            padding: 10px !important; 
          }
          table.body .content {
            padding: 0 !important; 
          }
          table.body .container {
            padding: 0 !important;
            width: 100% !important; 
          }
          table.body .main {
            border-left-width: 0 !important;
            border-radius: 0 !important;
            border-right-width: 0 !important; 
          }
          table.body .btn table {
            width: 100% !important; 
          }
          table.body .btn a {
            width: 100% !important; 
          }
          table.body .img-responsive {
            height: auto !important;
            max-width: 100% !important;
            width: auto !important; 
          }
        }
  
      </style>
    </head>
    <body>
      <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body'>
        <tr>
          <td>&nbsp;</td>
          <td class='container'>
            <div class='content'>
  
              <!-- START CENTERED WHITE CONTAINER -->
              <table role='presentation' class='main'>
  
                <!-- START MAIN CONTENT AREA -->
                <tr>
                  <td class='wrapper'>
                    <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td>
                          <p>Dear Sir,</p>
                          <p>Kindly Approve the attendance editable request .
  
</p>
  
  
  
  <tr>
  <td>Click<a target='_blank' href='$domain/HRM16/EditApprovedMD.php?AttendanceDate=$AttendanceDate&Clientid=$Clientid'> Here </a>For Approval</td>
  </tr>

  
  
  
                   
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
  
              <!-- END MAIN CONTENT AREA -->
              </table>
              <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
              <tr>
                <td align='center' class='content-block'><br/>
                <small><span class='apple-link'>SAINMARKS INDUSTRIES (INDIA) Pvt Ltd</span></small>
                </td>
              </tr>
              <tr>
                <td align='center' class='content-block powered-by'>
                 <small> Developed by <a target='_blank' href='https://www.indsystech.com/'>Indsys</a>.</small>
                </td>
              </tr>
            </table>
  
             
  
            </div>
          </td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </body>
  </html>
  ";
  
  
  try
  {
    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
    $mail->isSMTP();
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = "indsystesting@gmail.com"; // GMAIL username
    $mail->Password = "mdpswobfoltlloza"; // GMAIL password
    
    // $to = str_replace(";",",",$to);
    $Toaddress= $MailTo;
  
    $SubjectMail="Waiting For Attendance Approval - $AttendanceDTFORMAT ";
  
  $email_array = explode(',', $Toaddress);
  for ($i = 0;$i < count($email_array);$i++)
  {
  $mail->AddAddress($email_array[$i]);
  }
  $mail->SetFrom('indsystesting@gmail.com', 'SAINMARKS');
  $mail->AddReplyTo('indsystesting@gmail.com', 'SAINMARKS');
  $mail->Subject = $SubjectMail ;
  // $mail->Body = $tstbody;
  $mail->MsgHTML($Mailcontent);
  // optional - MsgHTML will create an alternate automatically
  
  
  // attachment
  $mail->Send();

 
}
catch(Exception $E)
{
  
}
$Message = "Mail Sent";
$Display=array('Message' =>$Message);

$str = json_encode($Display);
echo trim($str, '"');
return;

}
}

$Message = "No Need";
$Display=array('Message' =>$Message);

$str = json_encode($Display);
echo trim($str, '"');
    
}
catch(Exception $e)
{

}
}
if($MethodGet == 'PageSession')
{

    $Message =$Sessionid;

    






 
    $Display=array(
        'Message'=>  $Message,
      
    );
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}
if($MethodGet == 'DAILYATTENSTATUSLIST')
{
 
    $data01 =[];
   $GetState = "SELECT * FROM indsys1030dailyattenstatus   ORDER BY AttenStatus";
   
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
    header('Content-Type: application/json');
    echo json_encode($data01);
 }
 /////////////////////////

?>