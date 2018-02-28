<?php include_once("dbConnector.php"); ?>

<?php
	if(isset($_POST["submit1"])) {
		$a_type = $_POST["a_type"];
		$e_nid = $_POST["e_nid"];
		
		$insertManager = "INSERT INTO ACCOUNTANT2 (EMP_NID,ACCOUNT_TYPE)";
		$insertManager .= " VALUES ('{$e_nid}','{$a_type}')";
		
		$resultManagerInsert = oci_parse($c, $insertManager);
		oci_execute($resultManagerInsert);
		
		if($resultManagerInsert) {
			echo "<h1>Succesfully Registered..</h1>";	
		}
		
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manager Registration</title>
</head>

<body>

</body>
</html>