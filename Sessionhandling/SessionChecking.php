<?php 

include '../config.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];

if($MethodGet == 'SessionCheck')
{

    $Message = "SessionYes";
    $Url = "";
    


    if (!isset($_SESSION['Userid'])) {
        session_destroy();
        $Message ="SessionNo";
        $Url = "$domain/Sessionexpiredpage.php";

         
        }


    else
    {
        $Message = "SessionYes";

    }




 
    $Display=array(
        'Message'=>  $Message,
        'Url'=>  $Url
    );
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}


if($MethodGet =='CurrentSession')
{
$SessionID= $form_data['PageSession'];
$Sessioncurrentvaraible =  $_SESSION["SESSIONID"];

    $Message = "SessionYes";
    $Url = "";


    if($SessionID==$Sessioncurrentvaraible)
    {
        $Message = "SessionYes";

    }

    if($SessionID !=null)
    {
    if($SessionID!=$Sessioncurrentvaraible)
    {
        $Message ="SessionNo";
        $Url = "$domain/Sessionexpiredpage.php";

    }
}


    // if (!isset($_SESSION['Userid'])) {
    //     session_destroy();
    //     $Message ="SessionNo";
    //     $Url = "$domain/Sessionexpiredpage.php";

         
    //     }






 
    $Display=array(
        'Message'=>  $Message,
        'Url'=>  $Url
    );
    $str = json_encode($Display);
    echo trim($str, '"');
    return;
}



?>