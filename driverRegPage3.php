<?php include_once("dbConnector.php"); ?>

<?php
			
			if(isset($_POST["submit2"])) {
				$nid = $_POST["nid"];
				$phone = $_POST["phone"];
			
			
				$insertPhone = "INSERT INTO PHONE (WORKER_NID,PHONE_NUMBER) VALUES ";
				$insertPhone .= "('{$nid}','{$phone}')";	
			
				$resultPhoneInsert = oci_parse($c,$insertPhone);
				oci_execute($resultPhoneInsert);
			
			}
			
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<h1>You have registered successfully</h1>

</body>
</html>