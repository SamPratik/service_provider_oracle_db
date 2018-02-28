<?php
$db = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA = (SID=xe)))" ;

$c = OCILogon("jannatul", "Piu77147685", $db);
$r = oci_parse($c, "DELETE FROM CUSTOMER WHERE Customer_voter_id= 'C00000000002'");

oci_execute($r);
if($r)
{
	echo "One row deleted";
}



?>
