<?php
include '../config.php';
include '../session.php';



session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Sessionid = $_SESSION["SESSIONID"];
   
      $_SESSION["Tittle"] ="Department";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];

  $Department = '';
  if(isset($form_data['Department']))
  {
$Department=$form_data['Department'];
  }
  $data01 = array();
  
if($MethodGet == 'Save')
{



  if(empty($Department))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
 
  }
  $resultExists = "SELECT Department FROM indsys1003departmentmaster WHERE Department = '$Department' AND Clientid = '$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
      
    $sqlsave = "INSERT IGNORE INTO indsys1003departmentmaster (Clientid,Department,Userid,Addormodifydatetime) VALUES ('".$Clientid."','".$Department."','".$user_id."','".$date."')";
    $resultsave = mysqli_query($conn,$sqlsave);
    $Message ="Data Saved";
 
 }



 $GetRegion = "SELECT Department FROM indsys1003departmentmaster WHERE Clientid = '$Clientid'  ORDER BY Department";
 $result_Region = $conn->query($GetRegion);
 if(mysqli_num_rows($result_Region) > 0) { 
 while($row = mysqli_fetch_array($result_Region)) {  
   $data01[] = $row;  
   } 
 }

$mytbl["mytbl"] =$data01;
 $Display=array('mytbl' => $mytbl["mytbl"],'Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}

if($MethodGet == 'Change')
{
   $GetRegion = "SELECT * FROM indsys1003departmentmaster WHERE Department Like '%".$Department."%' AND Clientid = '$Clientid'  ORDER BY Department";
    $result_Region = $conn->query($GetRegion);
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;  
      } 
    }
        header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}
if($MethodGet == 'ALL')
{
   $GetRegion = "SELECT Department FROM indsys1003departmentmaster WHERE Clientid = '$Clientid'   ORDER BY Department";
    $result_Region = $conn->query($GetRegion);
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}





if($MethodGet == 'Delete')
{



  if(empty($Department))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1003departmentmaster WHERE Department = '$Department' AND Clientid = '$Clientid' ";
  $resultExists01 = $conn->query($resultExists);

    
    $Message ="Delete";
 
 

 



 $GetRegion = "SELECT Department FROM indsys1003departmentmaster  WHERE Clientid = '$Clientid' ORDER BY Department";
 $result_Region = $conn->query($GetRegion);
 if(mysqli_num_rows($result_Region) > 0) { 
 while($row = mysqli_fetch_array($result_Region)) {  
   $data01[] = $row;  
   } 
 }

$mytbl["mytbl"] =$data01;
 $Display=array('mytbl' => $mytbl["mytbl"],'Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
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

?>




        
