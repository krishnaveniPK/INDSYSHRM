<?php

function Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno, $Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime,$user_id,$ActualOTIntime,$ActualOTOuttime) {
  
    try
     {
        $Lmtdm = date("Y-m-d H:i:s");
        $Workingdays = 0;
        $calculatedworkinghrs = 0;
        $Missmatchedintime = 0;
        $Missmatchedouttime = 0;
        $Missmatchedotintime = 0;
        $Missmatchedotouttime = 0;
        $missmatchedrecordfound = "No";
        $WorkingHours = 0;
        $OT_HRS = 0;
        $Lophrs = 0;
        $Editedattenstatus="";

        $fetchstatus = "Select * from indsys1030dailyattenstatus where AttenStatus='$AttenStatus' ";
        $fetchstatusresult = mysqli_query($conn, $fetchstatus);
        while ($row = mysqli_fetch_array($fetchstatusresult)) {
            $Attentypestatus = $row["Attentypestatus"];
        }

        //OT Alterations/////////////////////////////
        $GetOT = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Attendencedate='$Attendencedate'";
        $result_OT = $conn->query($GetOT);

        if (mysqli_num_rows($result_OT) > 0) {
            while ($rownew = mysqli_fetch_array($result_OT)) {
          
                $Breakhours = $rownew["Breakhours"];
                $Editedattenstatus = $rownew["Editedattenstatus"];
            }
        }
        if (empty($Breakhours)) {
            $Breakhours = 0;
        }

        $breakMIn = 0;

        $logempbreakhrs = "SELECT * FROM indsys1030empdailybreaktimedetail WHERE   Employeeid='$Employeeid' and Attendencedate='$Attendencedate' ORDER BY Employeeid ASC";

        $logempbreakhrsexe = mysqli_query($conn, $logempbreakhrs);
        while ($row = mysqli_fetch_array($logempbreakhrsexe)) {
            $BreakIntime = $row["Intimewithdate"];
            $BreakOuttime = $row["Outtimewithdate"];

            $breakMIn += getIntervalMinutes($BreakOuttime, $BreakIntime);
        }

        $logemp = "SELECT * FROM indsys1017employeemaster WHERE  EmpActive='Active' And Employeeid='$Employeeid' AND Clientid='$Clientid'  ";

        $logempall = mysqli_query($conn, $logemp);
        while ($row = mysqli_fetch_array($logempall)) {
            $Allow_OT = $row["Allow_OT"];
            $Category = $row["Type_Of_Posistion"];
        }

        if ($Attentypestatus == "P") {
            $Intimecheck = "00:00:00";
            $OuttimeCheck = "00:00:00";
            $OTIntimecheck = "00:00:00";
            $OTOuttimecheck = "00:00:00";

            /////////Calculate Working hours and Working days
            if ($Intime != "00:00:00") {
                $Missmatchedintime = 1;
                if ($Category == "Category 3") {
                  $st_Intime    =   strtotime($Intime);
                  $cur_time   =   strtotime('08:25:00');
                  if($st_Intime <= $cur_time )
                  {
                    $randminutes = rand(25, 40);
                  
                    $str_Intimetime = $Intime;

                    $str_Intimetime = preg_replace(
                        "/^([\d]{1,2})\:([\d]{2})$/",
                        "00:$1:$2",
                        $str_Intimetime
                    );

                    sscanf(
                        $str_Intimetime,
                        "%d:%d:%d",
                        $hours,
                        $minutes,
                        $seconds
                    );

                    if (strlen($seconds) == 1) {
                        $seconds = "0$seconds";
                    }
                    $Intime = "08:$randminutes:$seconds";
                  }
                }
            }
            if ($Outtime != "00:00:00") {
                $Missmatchedouttime = 1;
                if ($Category == "Category 3") {
                    $time_in_24_hour_formatout = date(
                        "H:i:s",
                        strtotime($Outtime)
                    );
                    $Outimebw1 ="17:40:00";
                           $Outimebw2 ="18:00:00 ";


                         $st_Outtime    =   strtotime($Outimebw1);
                        $st_endtime   =   strtotime($Outimebw2);

                   $Empouttime = strtotime($Outtime);

                if ($Empouttime >= $st_Outtime && $Empouttime <= $st_endtime)
                     {
                        $str_Outtime = $Outtime;
                        $randminutes = rand(30, 40);
                        $str_Outtime = preg_replace(
                            "/^([\d]{1,2})\:([\d]{2})$/",
                            "00:$1:$2",
                            $str_Outtime
                        );

                        sscanf(
                            $str_Outtime,
                            "%d:%d:%d",
                            $hours,
                            $minutes,
                            $seconds
                        );
                        if(strlen($seconds)==1)
                        {
                          $seconds = "0$seconds";
                        }

                        $Outtime = "17:$randminutes:$seconds";
                    }
                }
            }
            if ($Missmatchedintime == 1 && $Missmatchedouttime == 1) {




                if ($Category == "Category 3") {
                  $st_Intime    =   strtotime($Intime);
                  $cur_time   =   strtotime('08:25:00');
                  if($st_Intime <= $cur_time )
                  {
                    $randminutes = rand(25, 40);
                    
                    $str_Intimetime = $Intime;

                    $str_Intimetime = preg_replace( "/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_Intimetime);

                    sscanf($str_Intimetime, "%d:%d:%d", $hours,$minutes,$seconds);

                    if (strlen($seconds) == 1) {
                        $seconds = "0$seconds";
                    }
                    $Intime = "08:$randminutes:$seconds";
                  }
                  $Outimebw1 ="17:40:00";
                  $Outimebw2 ="18:00:00 ";


                $st_Outtime    =   strtotime($Outimebw1);
               $st_endtime   =   strtotime($Outimebw2);

          $Empouttime = strtotime($Outtime);

       if ($Empouttime >= $st_Outtime && $Empouttime <= $st_endtime)

            {
               $str_Outtime = $Outtime;
               $randminutes = rand(30, 40);
               $str_Outtime = preg_replace("/^([\d]{1,2})\:([\d]{2})$/","00:$1:$2",$str_Outtime);

               sscanf($str_Outtime,"%d:%d:%d",$hours,$minutes,$seconds);
               if(strlen($seconds)==1)
               {
                 $seconds = "0$seconds";
               }

               $Outtime = "17:$randminutes:$seconds";
            }
                }

                $Intimecheck = strtotime($Intime);
                $OuttimeCheck = strtotime($Outtime);
                $missmatchedrecordfound = "No";

                $WorkingHours = $OuttimeCheck - $Intimecheck;
                $WorkingHours = gmdate("H:i:s", $WorkingHours);

                $Checkworkinghrs = substr(str_replace(":", ".", $WorkingHours),0,5);


                if ($Editedattenstatus != "Yes") {
                  $attendencehr = $Checkworkinghrs-1;
                    if ($attendencehr < 6) {
                    
                        $AttenStatus = "HD";
                        $Attentypestatus = "P";
                    } else {
                        $AttenStatus = "P";
                        $Attentypestatus = "P";
                    }
                }
              
            }
            if ($Missmatchedintime == 0 && $Missmatchedouttime == 1) {
                $missmatchedrecordfound = "Yes";
                $calculatedworkinghrs =0;
            }
            if ($Missmatchedintime == 1 && $Missmatchedouttime == 0) {
                $missmatchedrecordfound = "Yes";
                $calculatedworkinghrs =0;
            }

            $WorkingHours = $OuttimeCheck - $Intimecheck;
            $WorkingHours = gmdate("H:i:s", $WorkingHours);

            if ($breakMIn == 0) {
                
            } 
            else {
                $workingMin = 0;
                $workingMinLOP = 0;
                $time_in_24_hour_format = date("H:i:s", strtotime($Intime));
                $time_in_24_hour_format = substr(str_replace(":", ".", $time_in_24_hour_format), 0, 5);
                $Inhr = floor($time_in_24_hour_format);
                $Inminute = substr($time_in_24_hour_format, -2);
                $IntimeChk = "$Inhr.$Inminute";
                $secondShiftTime = "20";
                if ($IntimeChk <= $secondShiftTime) {
                    $IntimewithDate = "$Attendencedate $Intime";
                    $OuttimeWithDate = "$Attendencedate $Outtime";
                    $workingMin = getIntervalMinutes($IntimewithDate, $OuttimeWithDate);
                   
                } else {
                    $AddOUTTime = date("Y-m-d",strtotime($Attendencedate . " + 1 days"));
                    $IntimewithDate = "$Attendencedate $Intime";
                    $OuttimeWithDate = "$AddOUTTime $Outtime";
                    $workingMin = getIntervalMinutes($IntimewithDate,$OuttimeWithDate);
                   
                }

                $actualWorkMIn = $workingMin - $breakMIn;

                $actualWorkHrs = getHoursAndMins($actualWorkMIn);

                $Checkworkinghrs = substr(str_replace(":", ".", $actualWorkHrs),0,5);
            }

           
            $Workinghrs = $Checkworkinghrs - 1;
          
            $OT_HRS = "0.00";
          
          if($Outtime =="00:00:00")
          {
            $calculatedworkinghrs =0;
            $Workinghrs=0;
          }



         
            // return $Lophrs;

            /////////// Half Day check

            //////////// Calculate OThours and identifying missmatched record
         
          
          

            $Workingdays = 1;
        }

        if ($Attentypestatus == "L") {
            $Workinghrs = "0.00";
            $Workingdays = "0.00";
            $OT_HRS = "0.00";
            $missmatchedrecordfound = "No";
            $Lophrs = "0.00";
            $Workingdays = 0;
        }
        if ($Attentypestatus == "A") {
            $Workinghrs = "0.00";
            $Workingdays = "0.00";
            $OT_HRS = "0.00";
            $missmatchedrecordfound = "No";
            $Lophrs = "0.00";
            $Workingdays = 0;
        }

     
       if($Workinghrs<0)
       {
       	$Workinghrs="0.00";
       }

       
       


            $resultExists = "Update indsys1030empdailyattendancedetail set 
 

 
   Workinghours ='$Workinghrs',
   AttenStatus='$AttenStatus',
   Intime ='$Intime',
  Outtime='$Outtime',
  Attentypestatus='$Attentypestatus', 
  OTIntime ='$OTIntime',
  OTOuttime='$OTOuttime',
  Regsisterattendence ='$Regsisterattendence',
  Allowotyesorno='$Allow_OT',
  Mismatchedattendence ='$missmatchedrecordfound',
  Workingdays ='$Workingdays',
  Actualworkinghours='$calculatedworkinghrs',
  ActualIntime ='$ActualIntime',
  ActualOuttime='$ActualOuttime',
  Userid='$user_id',
  Addormodifydatetime='$Lmtdm',
  Manualattendence='$Manualattendence'
  
 
     WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";


   
            $resultExists01 = $conn->query($resultExists);

            if ($resultExists01 === true) {
                ActualAuditLopCalculation($conn,$Clientid,$Employeeid,$Attendencedate);
                if ($Category == "Category 3")
                {
                ActualAuditOTCalculation($conn,$Clientid,$Employeeid,$Attendencedate);
                }
                CalculateActualInandOut($conn,$Clientid,$Employeeid,$Attendencedate,$AttenStatus,$ActualIntime,$ActualOuttime,$ActualOTIntime,$ActualOTOuttime);

                $Message = "Success";
            } else {
                $Message = "Fail";
            }
            return $Message;
      

        //$Message ="Exists";
        //return $Outtime;
    } catch (Exception $E) {
        echo $E;
    }
}


function ActualAuditLopCalculation($conn,$Clientid,$Employeeid,$Attendencedate)
{
try
{
    $GetOT = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Attendencedate='$Attendencedate'";
    $result_OT = $conn->query($GetOT);

    if (mysqli_num_rows($result_OT) > 0) {
        while ($rownew = mysqli_fetch_array($result_OT)) {
      
        $Intime = $rownew['Intime'];
         $Outtime=$rownew['Outtime'];
         $AttenStatus = $rownew['AttenStatus'];
          
            $Attentypestatus = $rownew['Attentypestatus'];
        }
    }
    if($Attentypestatus=="P")
    {
        if ($Intime != "00:00:00") {
            $Missmatchedintime = 1;
          
        }
        if ($Outtime != "00:00:00") {
            $Missmatchedouttime = 1;
         
        }
        if ($Missmatchedintime == 1 && $Missmatchedouttime == 1) {


            $time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
            $time_in_24_hour_format = substr(str_replace(":", ".", $time_in_24_hour_format), 0, 5);
            $Inhr = floor($time_in_24_hour_format);
           $Inminute = substr($time_in_24_hour_format, -2);
            $IntimeChk = "$Inhr.$Inminute";
           
            $secondShiftTime = "20";
           
            if($IntimeChk<=$secondShiftTime )
            {
            
                $IntimewithDate = "$Attendencedate $Intime";
                $OuttimeWithDate = "$Attendencedate $Outtime";
                $workingMinLOP = getIntervalMinutes($IntimewithDate, $OuttimeWithDate) - 60;

                $lopMin = 480 - $workingMinLOP;
             if($AttenStatus=="HD")
                {
                    $lopMin = 240 - $workingMinLOP;
                }
    
                $Lophrs = getHoursAndMins($lopMin);
    
                $Lophrs = substr(str_replace(":", ".", $Lophrs), 0, 5);
              
            }
            else
            {
                $AddOUTTime = date('Y-m-d', strtotime($Attendencedate. ' + 1 days'));

                 
                $IntimewithDate = "$Attendencedate $Intime";
                $OuttimeWithDate = "$AddOUTTime $Outtime";
               
                $workingMinLOP = getIntervalMinutes($IntimewithDate, $OuttimeWithDate) - 60;
              
                $lopMin = 480 - $workingMinLOP;
                if($AttenStatus=="HD")
                {
                    $lopMin = 240 - $workingMinLOP;
                }
    
                $Lophrs = getHoursAndMins($lopMin);
           
    
                $Lophrs = substr(str_replace(":", ".", $Lophrs), 0, 5);
            }       
          

        }

        if (empty($Lophrs)) {
            $Lophrs = "0.00";
        }

        if ($Outtime == "00:00:00") {
            $Lophrs = "0.00";
        }

        $Lateintime1="08:30:00";
        $Lateintime2="09:30:00";


        $LTIntime1    =   strtotime($Lateintime1);
        $LTIntime2   =   strtotime($Lateintime2);
        $Lopgracetime = "0.10";
        $EmpintimeLT = strtotime($Intime);

    if ($EmpintimeLT >= $LTIntime1 && $EmpintimeLT <= $LTIntime2)

     {
        if($Lophrs >=$Lopgracetime)
        {
            $Loptest = $Lophrs-$Lopgracetime;
            $Lophrs=   number_format((float) $Loptest, 2, ".", "");
            //echo "If $Loptest<br>";
        }
        else
        {
            $Lophrs = "0.00";
            
        }

     }
        $Lophrs=  number_format((float) $Lophrs, 2);

    }
    else
    {
       $Lophrs="0.00";
    }



    $resultExists = "Update indsys1030empdailyattendancedetail set   
Lophrs ='$Lophrs' 
WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
;
$resultExists01 = $conn->query($resultExists);


    if ($resultExists01 === true) {
        $Message = "Success";
    } else {
        $Message = "Fail";
    }

}
catch(Exception $e)
{

}
}


function ActualAuditOTCalculation($conn,$Clientid,$Employeeid,$Attendencedate)
{
try
{
    $GetOT = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Attendencedate='$Attendencedate'";
    $result_OT = $conn->query($GetOT);

    if (mysqli_num_rows($result_OT) > 0) {
        while ($rownew = mysqli_fetch_array($result_OT)) {
      
   
         $OTIntime = $rownew['OTIntime'];
         $OTOuttime=$rownew['OTOuttime'];

          
            $Attentypestatus = $rownew['Attentypestatus'];
        }
    }


    $logemp = "SELECT * FROM indsys1017employeemaster WHERE  EmpActive='Active' And Employeeid='$Employeeid' AND Clientid='$Clientid'  ";

    $logempall = mysqli_query($conn, $logemp);
    while ($row = mysqli_fetch_array($logempall)) {
        $Allow_OT = $row["Allow_OT"];
        $Category = $row["Type_Of_Posistion"];
    }
    if($Attentypestatus=="P")
    {
        $ActualOt_HRS ="0.00";
         $OT_HRS2 ="0.00";
        
        if ($Allow_OT == "Yes") {
            if ($OTIntime != "00:00:00") {
                $Missmatchedotintime = 1;
            }
            if ($OTOuttime != "00:00:00") {
                $Missmatchedotouttime = 1;
            }
            if ($Missmatchedotintime == 1 && $Missmatchedotouttime == 1) {
                $OTIntimecheck = strtotime($OTIntime);
                $OTOuttimecheck = strtotime($OTOuttime);
                $OT_HRS01 = "0.00";
                 $IntimewithOT = "$Attendencedate $OTIntime";
                        $OuttimeWithOT = "$Attendencedate $OTOuttime";
                        $WorkingOTHours = getIntervalMinutes($IntimewithOT, $OuttimeWithOT);
                        
            
                        $OT_HRS = getHoursAndMins($WorkingOTHours);
                   
            
                        $OT_HRS = substr(str_replace(":", ".", $OT_HRS), 0, 5);
                // $OT_HRS = $OT_HRS + $OT_HRS01;


                if (empty($OT_HRS)) {
                    $OT_HRS = "0.00";
                }
    
                if ($OTOuttime == "00:00:00") {
                    $OT_HRS = "0.00";
                }
                $ActualOt_HRS = $OT_HRS;

                $OT_HRS = number_format((float) $OT_HRS, 2, ".", "");
        
                $ot_hours = floor($OT_HRS);
                $ot_hours_minutes = substr($OT_HRS, -2);
        
                $gettime = "";
                $ot_hours_final = $ot_hours;
        
                $GetNextno = "SELECT * FROM indsys1032timecheck where Timeno ='$ot_hours_minutes'  ";
        
                $result_Nextno = $conn->query($GetNextno);
                if (mysqli_num_rows($result_Nextno) > 0) {
                    while ($row = mysqli_fetch_array($result_Nextno)) {
                        $gettime = $row["Timevalue"];
                        $ot_hours_minutes = $gettime;
                        $ot_hours_final = $ot_hours;
                    }
                }
        
                $GetNextnonew = "SELECT * FROM indsys1032timemaster where Timemasterno ='$ot_hours_minutes'  ";
        
                $result_Nextnonew = $conn->query($GetNextnonew);
                if (mysqli_num_rows($result_Nextnonew) > 0) {
                    while ($row = mysqli_fetch_array($result_Nextnonew)) {
                        $gettimenew = $row["Timevalue"];
                        $ot_hours_minutes = "$gettimenew";
        
                        $ot_hours_final = 1 + $ot_hours;
                        //$ot_hours_final = $ot_hours;
                    }
                }
        
              
        
                $OT_HRS2 = "$ot_hours_final.$ot_hours_minutes";
                $missmatchedrecordfound = "No";
            }
            if ($Missmatchedotintime == 0 && $Missmatchedotouttime == 1) {
                $ActualOt_HRS ="0.00";
                $OT_HRS2 ="0.00";
                $missmatchedrecordfound = "Yes";
            }
            if ($Missmatchedotintime == 1 && $Missmatchedotouttime == 0) {
                 $ActualOt_HRS ="0.00";
                $OT_HRS2 ="0.00";
                $missmatchedrecordfound = "Yes";
            }

          
        }
       
       
     

    

    }
    else
    {
        $ActualOt_HRS ="0.00";
        $OT_HRS2 ="0.00";
    }



    $resultExists = "Update indsys1030empdailyattendancedetail set   
    OT_HRS ='$OT_HRS2' ,
    Mismatchedattendence ='$missmatchedrecordfound',
    ActualOt_HRS ='$ActualOt_HRS'
WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";
;
$resultExists01 = $conn->query($resultExists);


    if ($resultExists01 === true) {
        $Message = "Success";
    } else {
        $Message = "Fail";
    }

}
catch(Exception $e)
{

}
}


function getHoursAndMins($time, $format = "%02d:%02d")
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = $time % 60;
    return sprintf($format, $hours, $minutes);
}

function getIntervalMinutes($Intime, $OutTime)
{
    $dateTimeObject1 = date_create($Intime);
    $dateTimeObject2 = date_create($OutTime);
    $interval = date_diff($dateTimeObject1, $dateTimeObject2);

    $minutes = $interval->days * 24 * 60;
    $minutes += $interval->h * 60;
    return $minutes += $interval->i;
}


function CalculateActualInandOut(
    $conn,
    $Clientid,
    $Employeeid,
    $Attendencedate,
    $AttenStatus,  
    $ActualIntime,
    $ActualOuttime,
  
    $ActualOTIntime,$ActualOTOuttime
) {
    try {
    
        $Lmtdm = date("Y-m-d H:i:s");
        $Workingdays = 0;
        $calculatedworkinghrs = 0;
        $Missmatchedintime = 0;
        $Missmatchedouttime = 0;
        $Missmatchedotintime = 0;
        $Missmatchedotouttime = 0;
        $missmatchedrecordfound = "No";
        $WorkingHours = 0;
        $OT_HRS = 0;
        $Lophrs = 0;
        $Editedattenstatus="";

        $fetchstatus = "Select * from indsys1030dailyattenstatus where AttenStatus='$AttenStatus' ";
        $fetchstatusresult = mysqli_query($conn, $fetchstatus);
        while ($row = mysqli_fetch_array($fetchstatusresult)) {
            $Attentypestatus = $row["Attentypestatus"];
        }

        //OT Alterations/////////////////////////////
        $GetOT = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Employeeid = '$Employeeid' and Attendencedate='$Attendencedate'";
        $result_OT = $conn->query($GetOT);

        if (mysqli_num_rows($result_OT) > 0) {
            while ($rownew = mysqli_fetch_array($result_OT)) {
                $OTIntimeold = $rownew["OTIntime"];
                $OTOuttimeold = $rownew["OTOuttime"];
            $Intime = $rownew['Intime'];
             $Outtime=$rownew['Outtime'];

                $Editedattenstatus = $rownew["Editedattenstatus"];
            }
        }
      
        // if($ActualIntime=="00:00:00")
        // {
        //     $ActualIntime = $Intime;
        // }

        // if($ActualOuttime=="00:00:00")
        // {
        //     $ActualOuttime = $Outtime;
        // }


        // if($ActualOTIntime=="00:00:00")
        // {
        //     $ActualOTIntime = $OTIntimeold;
        // }

        // if($ActualOTOuttime=="00:00:00")
        // {
        //     $ActualOTOuttime = $OTOuttimeold;
        // }
        $breakMIn = 0;



        $logemp = "SELECT * FROM indsys1017employeemaster WHERE  EmpActive='Active' And Employeeid='$Employeeid' AND Clientid='$Clientid'  ";

        $logempall = mysqli_query($conn, $logemp);
        while ($row = mysqli_fetch_array($logempall)) {
            $Allow_OT = $row["Allow_OT"];
            $Category = $row["Type_Of_Posistion"];
        }

     


        if ($Attentypestatus == "P") {
            $Intimecheck = "00:00:00";
            $OuttimeCheck = "00:00:00";
            $OTIntimecheck = "00:00:00";
            $OTOuttimecheck = "00:00:00";

            /////////Calculate Working hours and Working days
            if ($ActualIntime != "00:00:00") {
                $Missmatchedintime = 1;
              
            }
            if ($ActualOuttime != "00:00:00") {
                $Missmatchedouttime = 1;
             
            }
            if ($Missmatchedintime == 1 && $Missmatchedouttime == 1) {

                $Intimecheck = strtotime($ActualIntime);
                $OuttimeCheck = strtotime($ActualOuttime);
                $missmatchedrecordfound = "No";

                $WorkingHours = $OuttimeCheck - $Intimecheck;
                $WorkingHours = gmdate("H:i:s", $WorkingHours);

                $Checkworkinghrs = substr(str_replace(":", ".", $WorkingHours),0,5);   
               
                $time_in_24_hour_format  = date("H:i:s", strtotime($Intime));
                $time_in_24_hour_format = substr(str_replace(":", ".", $time_in_24_hour_format), 0, 5);
                $Inhr = floor($time_in_24_hour_format);
               $Inminute = substr($time_in_24_hour_format, -2);
                $IntimeChk = "$Inhr.$Inminute";
               
                $secondShiftTime = "20";
               
                if($IntimeChk<=$secondShiftTime )
                {
                   
                    $IntimewithDate = "$Attendencedate $ActualIntime";
                    $OuttimeWithDate = "$Attendencedate $ActualOuttime";
                    $workingMinLOP = getIntervalMinutes($IntimewithDate, $OuttimeWithDate) - 60;
                    $lopMin = 480 - $workingMinLOP;
                    if($AttenStatus=="HD")
                    {
                        $lopMin = 240 - $workingMinLOP;
                    }
        
                    $Lophrs = getHoursAndMins($lopMin);
        
                    $Lophrs = substr(str_replace(":", ".", $Lophrs), 0, 5);
                  
                }
                else
                {
                    $AddOUTTime = date('Y-m-d', strtotime($Attendencedate. ' + 1 days'));

                     
                    $IntimewithDate = "$Attendencedate $ActualIntime";
                    $OuttimeWithDate = "$AddOUTTime $ActualOuttime";
                   
                    $workingMinLOP = getIntervalMinutes($IntimewithDate, $OuttimeWithDate) - 60;
                  
                    $lopMin = 480 - $workingMinLOP;
                    if($AttenStatus=="HD")
                    {
                        $lopMin = 240 - $workingMinLOP;
                    }
                    $Lophrs = getHoursAndMins($lopMin);
               
        
                    $Lophrs = substr(str_replace(":", ".", $Lophrs), 0, 5);
                }       
              
            }
            if ($Missmatchedintime == 0 && $Missmatchedouttime == 1) {
                $missmatchedrecordfound = "Yes";
            }
            if ($Missmatchedintime == 1 && $Missmatchedouttime == 0) {
                $missmatchedrecordfound = "Yes";
            }

          

       
      
            //$workingMin = getIntervalMinutes($Outtime,$Intime);
            $Workinghrs = $Checkworkinghrs - 1;
         
            $OT_HRS = "0.00";
     
            if (empty($Lophrs)) {
                $Lophrs = "0.00";
            }

            if ($ActualOuttime == "00:00:00") {
                $Lophrs = "0.00";
            }


            
            if ($Allow_OT == "Yes") {
                
                if ($ActualOTIntime != "00:00:00") {
                    $Missmatchedotintime = 1;
                }
                if ($ActualOTOuttime != "00:00:00") {
                    $Missmatchedotouttime = 1;
                }
                if ($Missmatchedotintime == 1 && $Missmatchedotouttime == 1) {
                    $OTIntimecheck = strtotime($ActualOTIntime);
                    $OTOuttimecheck = strtotime($ActualOTOuttime);
                    $missmatchedrecordfound = "No";




                       
                }
                if ($Missmatchedotintime == 0 && $Missmatchedotouttime == 1) {
                    $missmatchedrecordfound = "Yes";
                }
                if ($Missmatchedotintime == 1 && $Missmatchedotouttime == 0) {
                    $missmatchedrecordfound = "Yes";
                }

             
                 $OT_HRS01 = "0.00";
                 $IntimewithOT = "$Attendencedate $ActualOTIntime";
                        $OuttimeWithOT = "$Attendencedate $ActualOTOuttime";
                        $WorkingOTHours = getIntervalMinutes($IntimewithOT, $OuttimeWithOT);
                        
            
                        $OT_HRS = getHoursAndMins($WorkingOTHours);
                   
            
                        $OT_HRS = substr(str_replace(":", ".", $OT_HRS), 0, 5);
                // $OT_HRS = $OT_HRS + $OT_HRS01;


                if (empty($OT_HRS)) {
                    $OT_HRS = "0.00";
                }
                if ($ActualOTIntime == "00:00:00") {
                    $OT_HRS = "0.00";
                }
                if ($ActualOTOuttime == "00:00:00") {
                    $OT_HRS = "0.00";
                }
    
            }
           
        }

        if ($Attentypestatus == "L") {
            $Workinghrs = "0.00";
            $Workingdays = "0.00";
            $OT_HRS = "0.00";
            $missmatchedrecordfound = "No";
            $Lophrs = "0.00";
        }
        if ($Attentypestatus == "A") {
            $Workinghrs = "0.00";
            $Workingdays = "0.00";
            $OT_HRS = "0.00";
            $missmatchedrecordfound = "No";
            $Lophrs = "0.00";
        }

       

        $ActualOt_HRS = $OT_HRS;

      



        if ($Workinghrs < 0) {
            $Workinghrs = "0.00";
        }

        if ($Workingdays < 0) {
            $Workingdays = 0;
        }

        if ($calculatedworkinghrs < 0) {
            $calculatedworkinghrs = "0.00";
        }

    
        $Workinghrs=  number_format((float) $Workinghrs, 2);
        $Lophrs=  number_format((float) $Lophrs, 2);
        $ActualOt_HRS=  number_format((float) $ActualOt_HRS, 2);
        


            $resultExists = "Update indsys1030empdailyattendancedetail set 

            ActualIntime ='$ActualIntime',
  ActualOTIntime ='$ActualOTIntime ',
  ActualOTOuttime='$ActualOTOuttime',
  ActualOuttime ='$ActualOuttime',
  ActualOt_HRSNew='$ActualOt_HRS',
  Actualaudithrs='$Workinghrs',
  Auctualaditlop ='$Lophrs' 
 
     WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendencedate' AND Clientid='$Clientid'  ";

     $resultExists01 = $conn->query($resultExists);

      
            if ($resultExists01 === true) {
                $Message = "Success";
            } else {
                $Message = "Fail";
            }
            return $Message;
        

        //$Message ="Exists";
        //return $Outtime;
    } catch (Exception $E) {
        echo $E;
    }
}



function isThisDayAWeekend($date) {

    $timestamp = strtotime($date);

    $weekday= date("l", $timestamp );

    if ( $weekday =="Sunday") { return true; } 
    else {return false; }

}
?>
