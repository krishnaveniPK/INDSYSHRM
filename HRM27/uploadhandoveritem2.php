<?php
include('../config.php');
error_reporting(0);

session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"]; 
$Clientid =$_SESSION["Clientid"];      
$Employeeid =$_SESSION["Employeeid"] ;;
$Message ='';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );
$Sno = $_POST['HandoveritemNextno'];
$Particulars = $_POST['Handoveritem'];
$Qtyitem = $_POST['Qtyitem'];
$Distributeddate = $_POST['Distributeddate'];
$Handoverdate = $_POST['Handoverdate'];
$Notes = $_POST['Notes'];
$StoredPlace = $_POST['StoredPlace'];
$ConcernName = $_POST['ConcernName'];

if(empty($Distributeddate))
{
  $Distributeddate ="0000-00-00";
}

if(empty($Handoverdate))
{
  $Handoverdate ="0000-00-00";
}

if (isset($_FILES['files']) && !empty($_FILES['files'])) {




    $directory3 = "../EMPHANDITEM2/";
    $directory2 = "../EMPHANDITEM2/$Employeeid/";


    $directory = "../EMPHANDITEM2/$Employeeid/$Sno/";
    if(!is_dir($directory3)){mkdir($directory3, 0777);}
    if(!is_dir($directory2)){mkdir($directory2, 0777);}
    if(!is_dir($directory)){mkdir($directory, 0777);}
   
      
      $chk ="";
      //$files = null;
      if(!is_dir($directory)){
     
      }
      else
      {
        foreach (new DirectoryIterator($directory) as $fileInfo) {
          if(!$fileInfo->isDot()) {
              unlink($fileInfo->getPathname());
          }
        
      }
      }
   
        if(!is_dir($directory)){
        mkdir($directory, 0777, true);
                }

    $no_files = count($_FILES["files"]['name']);
    for ($i = 0; $i < $no_files; $i++) {
        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        } else {
            if (file_exists($directory . $_FILES["files"]["name"][$i])) {
                echo 'File already exists : '.$directory . $_FILES["files"]["name"][$i];
            } else {
                $uniquesavename=time().uniqid(rand());
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory .  $uniquesavename);
               
$HandoverImage = $directory . $uniquesavename;




// $GetChapter = "SELECT * FROM indsys1034handoveritems where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Sno='$Sno' ORDER BY Employeeid";
//     $result_Chapter = $conn->query($GetChapter );
//     if(mysqli_num_rows($result_Chapter) > 0) { 


//     while($row = mysqli_fetch_array($result_Chapter)) {  
      
     

//       $Propertychecklistitemimage =$row['Propertychecklistitemimage'];
   
     
     
     
//       } 
//     }
$resultExists = "SELECT * FROM indsys1034handoveritems WHERE Employeeid = '$Employeeid' AND Sno='$Sno' AND Clientid ='$Clientid'  LIMIT 1";
$resultExists01 = $conn->query($resultExists);



  if (mysqli_fetch_row($resultExists01))
  {

      $resultExistsss = "Update indsys1034handoveritems set 
      Particulars ='$Particulars',   
      Qtyitem ='$Qtyitem',   
      Distributeddate ='$Distributeddate',   
      Handoverdate ='$Handoverdate',     
      Notes ='$Notes',   
      StoredPlace ='$StoredPlace',   
      ConcernName ='$ConcernName',   
      HandoverImage ='$HandoverImage',   
      Addormodifydatetime ='$date',
   
      Userid ='$user_id'
   
     
  WHERE Employeeid = '$Employeeid'  and Sno='$Sno'

  AND Clientid ='$Clientid'  ";
      $resultExists0New = $conn->query($resultExistsss);
      $Message = "Exists";

  }

  else
  {
    $sqlsave = "INSERT IGNORE INTO indsys1034handoveritems (Clientid,Employeeid,Sno,Particulars,Userid,Addormodifydatetime,Qtyitem,Distributeddate,Handoverdate, Notes, StoredPlace,ConcernName,HandoverImage)
    VALUES ('$Clientid','$Employeeid','$Sno','$Particulars','$user_id','$date','$Qtyitem','$Distributeddate','$Handoverdate','$Notes','$StoredPlace','$ConcernName','$HandoverImage')";
       $resultsave = mysqli_query($conn, $sqlsave);

      $Message = "Exists";

      $Message = "Exists";
  }
              //  $Message ="Exists";
                echo 'File successfully uploaded : ' .$directory. $_FILES["files"]["name"][$i] . ' ';
            }
        }
    }
} else {
    echo 'Please choose at least one file';
}



   


 

?>




        