<?php
function LoadLeave($conn, $Clientid, $Payrollmonth, $Payrollyear,$Employeeid,$CL,$TakenCL,$BalanceCL) 
{
    $Currentyear = $Payrollyear;
    $Previousyear = $Currentyear - 1;
    $month_num = date("m", strtotime($Payrollmonth));
   
    if ($month_num > 10) {
        $Currentyear = date("Y");
        $Currentyear = $Currentyear + 1;
        $Previousyear = $Currentyear - 1;
        $Payrollyear = $Currentyear;
    }
    $Fromdate = date("01-$month_num-$Payrollyear");
    $Todate = date("t-$month_num-$Payrollyear", strtotime($Fromdate));
    $monthof1stday = date("$Payrollyear-$month_num-01");
    $monthoflastday = date("$Payrollyear-$month_num-t", strtotime($Fromdate));
    $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active' and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";
    $logempall = mysqli_query($conn, $logemp);
    while ($rowEmployee = mysqli_fetch_array($logempall)) {
        $Performanceallowance = 0;
        $Employeeid = $rowEmployee["Employeeid"];
        $date_of_joining = $rowEmployee["Date_Of_Joing"];
        $date = strtotime($date_of_joining);
        $Empjoinmonth = date("m", $date);
        $Empjoinyear = date("Y", $date);
        $Empjoinday = date("d", $date);
        ///////////////Fetching Transaction month ////////////////
        $logEmpLeave = "Select * from indsys1034transactionmonth where TransactionMonthno='$Empjoinmonth'";
        $logEmpexecute = mysqli_query($conn, $logEmpLeave);
        while ($rowEmptransaction = mysqli_fetch_assoc($logEmpexecute)) {
            $Currentyearleave = $rowEmptransaction["Currentyear"];
            $Previousyearleave = $rowEmptransaction["Previousyear"];
            $Transactionmonthadded = $rowEmptransaction["Transactionmonthadded"];
        }
        $newjoinee = "No";
        $currentDate = date("Y-m-d");
        $joinDate = date("Y-m-d", strtotime($date_of_joining));
        $diffMonths = (date("Y", strtotime($Todate)) - date("Y", strtotime($joinDate))) * 12;
        $diffMonths+= date("m", strtotime($Todate)) - date("m", strtotime($joinDate));
        $Calculatedmonths = $Transactionmonthadded;
      
            $newjoinee = "Yes";
            $date1 = new DateTime($date_of_joining);
            /////////For payroll check the given month///////////
            $date2 = new DateTime($monthoflastday);
            $dateofjoingdays = $date2->diff($date1)->format("%a");
            $dateofjoingdays = $dateofjoingdays + 1;
            $earlier = new DateTime($monthof1stday);
            $later = new DateTime($monthoflastday);
            $abs_diff = $later->diff($earlier)->format("%a");
            $abs_diff = $abs_diff + 1;
            if ($dateofjoingdays <= $abs_diff) {
                if ($monthof1stday == $date_of_joining) {
                    $Calculatedmonths = 12 - $Transactionmonthadded;
                } else {
                    $trans = $Transactionmonthadded - 1;
                    $Calculatedmonths = 11 - $Transactionmonthadded;
                }
            } 
          
            $TotalLeaves = 1.5 * $Calculatedmonths;

            $Transactiondate="$Payrollyear-$month_num-01";
            SaveMonthLeave($conn, $Clientid, $Employeeid, $month_num,$Payrollyear, $CL,$BalanceCL,$Transactiondate);

            SaveLeaveMaster($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $TotalLeaves);
       
    }
    }
    function SaveLeaveMaster($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $TotalLeave) {
        try {
            $TotalLeaveeligable = $TotalLeave;
            $BalanceLeave = 0;
            $Takenleave = 0;
            $Fromdate = "$Previousyear-10-01";
            $Todate = "$Currentyear-09-01";
            $UpdateSum = "SELECT SUM(TakenLeave) as TakenLeave FROM indsys1035employeetransactionmonthleave WHERE Employeeid= '$Employeeid' AND Transactionmonthdate >='$Fromdate' AND Transactionmonthdate<='$Todate' ";
            $Takenleaveexecute = mysqli_query($conn, $UpdateSum);
            while ($rowOD = mysqli_fetch_array($Takenleaveexecute)) {
                $Takenleave = $rowOD['TakenLeave'];
                // $Workeddays=roundup($Workeddays);
                // $Workeddays=round($Workeddays,0);
                
            }
            $BalanceLeave = $TotalLeaveeligable - $Takenleave;
            $resultExists = "SELECT * FROM indsys1035employeetransactionyearleave WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Fromtransactionyear ='$Previousyear' AND Totransactionyear='$Currentyear' LIMIT 1";
            $resultExists01 = $conn->query($resultExists);
            if ($rowleavemas = mysqli_fetch_row($resultExists01)) {
                $TotalLeaveeligable = $rowleavemas['TotalLeaveeligable'];
                $BalanceLeave = $TotalLeaveeligable - $Takenleave;
                $Message = "Exists";
            } else {
                $SaveEmployee = "INSERT INTO indsys1035employeetransactionyearleave(Clientid,Employeeid,Fromtransactionyear,Totransactionyear,TotalLeaveeligable,TakenLeave,BalanceLeave)
    VALUES('$Clientid','$Employeeid','$Previousyear','$Currentyear','$TotalLeave','$Takenleave','$BalanceLeave')";
                $Saved = mysqli_query($conn, $SaveEmployee);
                if ($Saved === true) {
                } else {
                    echo "$SaveEmployee<br>;";
                }
            }
        }
        catch(Exception $e) {
        }
    }
    function SaveMonthLeave($conn, $Clientid, $Employeeid, $Transactionmonthno, $Transactionyear, $CL, $BalanceCL,  $Transactiondate) {
        try {
            if ($BalanceCL == '') {
                $CL = 0;
                $BalanceCL = 0;
            }
            $Takenleave = $CL - $BalanceCL;
            $resultExists = "SELECT * FROM indsys1035employeetransactionmonthleave WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Transactionmonthno ='$Transactionmonthno' AND Transactionyear='$Transactionyear' LIMIT 1";
            $resultExists01 = $conn->query($resultExists);
            if (mysqli_fetch_row($resultExists01)) {
                $Message = "Exists";
            } else {
                $SaveEmployee = "INSERT INTO indsys1035employeetransactionmonthleave(Clientid,Employeeid,Transactionmonthno,Transactionyear,TotalLeaveeligable,TakenLeave,BalanceLeave,Transactionmonthdate)
    VALUES('$Clientid','$Employeeid','$Transactionmonthno','$Transactionyear','$CL','$Takenleave','$BalanceCL','$Transactiondate')";
                $Saved = mysqli_query($conn, $SaveEmployee);
                if ($Saved === true) {
                    // echo "$SaveEmployee<br>;";
                    
                } else {
                    echo "$SaveEmployee<br>;";
                }
            }
        }
        catch(Exception $e) {
        }
    }
?>