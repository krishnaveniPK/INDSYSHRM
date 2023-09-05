<?php
date_default_timezone_set('Asia/Kolkata');
$date   = new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d-H-i-s');
echo $result . "<br>";
$krr    = explode('-', $result);
$result = implode("", $krr);
echo $result;
?>