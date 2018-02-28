<?php include_once("dbConnector.php"); ?>

<?php  

if(isset($_POST["submit"])) {
	$nid = $_POST["nid"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$pass = $_POST["pass"];
	$cust_name = $_POST["cust_name"];
	
	$insertCustomer = "INSERT INTO CUSTOMER (CUST_ID,CUST_NAME,CUST_ADD,CUST_PHONE,CUST_PASS) ";
	$insertCustomer .= " VALUES ('{$nid}','{$cust_name}','{$address}','{$phone}','{$pass}')";	
	
	$resultCustomerInsert = oci_parse($c, $insertCustomer);
	oci_execute($resultCustomerInsert);
}

?> 