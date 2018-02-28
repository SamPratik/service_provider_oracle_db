<?php
$db = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA = (SID=xe)))" ;

$c = OCILogon("jannatul", "Piu77147685", $db);
$r = oci_parse($c, "insert into CUSTOMER values ('201414048','Himel','0192452370','Rangpur')");

oci_execute($r);
if($r)
{
	echo "One row inserted";
}



?>
