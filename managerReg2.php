<?php include_once("dbConnector.php"); ?>

<?php
	if(isset($_POST["submit1"])) {
		$m_responsibility = $_POST["m_responsibility"];
		$e_nid = $_POST["e_nid"];
		
		$insertManager = "INSERT INTO MANAGER2 (EMP_NID,MANAGER_RESPONSIBILITY)";
		$insertManager .= " VALUES ('{$e_nid}','{$m_responsibility}')";
		
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