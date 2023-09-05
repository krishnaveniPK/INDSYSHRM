<?php
// localhost
global $msconn;
 $serverName = "103.168.241.210"; //serverName\instanceName
$connectionInfo = array( "UID"=>"sa", "PWD"=>"$@!Nsql@2023", "Database"=>"etimetracklitenew", "ReturnDatesAsStrings"=>true,"TrustServerCertificate"=> "yes","Encrypt"=>"No");
//$msconn = sqlsrv_connect( $serverName, $connectionInfo);
$msconn = sqlsrv_connect( $serverName, $connectionInfo);
	if( $msconn ) {
		 return $msconn;
	}else{
		 die( print_r( sqlsrv_errors(), true));
	}



// // Check connection
// if ($msconn->connect_error) {
//     die("Connection failed: " . $msconn->connect_error);
// }

?>