<?php 
$time_in_24_hour_format  = date("H:i", strtotime("17:50"));
//echo $time_in_24_hour_format;
$ot_hours = floor($time_in_24_hour_format);
$ot_hours_minutes = substr($time_in_24_hour_format, -2);
$condec = "$ot_hours.$ot_hours_minutes";
$greater ="17.40";
$greater2 = "17.50";

if($condec>=$greater && $condec<=$greater2  )
{
    echo "IF";
}



//echo $ot_hours;
//echo $ot_hours_minutes;
echo $greater;




?>