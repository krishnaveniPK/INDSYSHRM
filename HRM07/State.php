<?php
include '../config.php';
include '../session.php';



session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Country";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];

  $Country = '';
  if(isset($form_data['Country']))
  {
$Country=$form_data['Country'];
  }
  $data01 = array();
  
if($MethodGet == 'Save')
{


$State = $form_data['State'];
  if(empty($Country))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  if(empty($State))
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
  $resultExists = "SELECT * FROM indsys1011statemaster WHERE Country = '$Country' and State='$State' AND Clientid = '$Clientid' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

 
 if(mysqli_fetch_row($resultExists01))
  {
    
    $Message ="Exists";
 
  }

  else
  {
      
    $sqlsave = "INSERT IGNORE INTO indsys1011statemaster (Clientid,Country,Userid,Addormodifydatetime,State) VALUES ('".$Clientid."','".$Country."','".$user_id."','".$date."','".$State."')";
    $resultsave = mysqli_query($conn,$sqlsave);
    $Message ="Data Saved";
 
 }



 $GetRegion = "SELECT * FROM indsys1011statemaster WHERE Clientid = '$Clientid' ORDER BY Country";
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
   $GetRegion = "SELECT * FROM indsys1011statemaster WHERE Clientid = '$Clientid' AND Country Like '%".$Country."%'  ORDER BY Country";
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
   $GetState = "SELECT * FROM indsys1011statemaster WHERE Clientid = '$Clientid'  ORDER BY Country";
    $result_Region = $conn->query($GetState);
   
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    

    header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}

if($MethodGet == 'Country')
{
   $GetState = "SELECT Country FROM indsys1010countrymaster WHERE Clientid = '$Clientid'  ORDER BY Country";
    $result_Region = $conn->query($GetState);
  
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



  if(empty($Country))
  {

$Message = "Empty";

    $Display=array('Message' =>$Message);
 
    $str = json_encode($Display);
   echo trim($str, '"');
   return;
  }
  $State=$form_data['State'];

  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1011statemaster WHERE Country = '$Country' and State ='$State' AND Clientid = '$Clientid'";
  $resultExists01 = $conn->query($resultExists);

    
    $Message ="Delete";
 
 

 



 $GetRegion = "SELECT * FROM indsys1011statemaster WHERE Clientid = '$Clientid' ORDER BY Country";
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

?>