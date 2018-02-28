<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Authority View</title>
</head>

<body>

<?php include_once("dbConnector.php"); ?>

<?php
	$queryView = "SELECT * FROM SERVICE";
	$resultView = oci_parse($c,$queryView);
	oci_execute($resultView);
	
	while($row = oci_fetch_assoc($resultView)) {
?>
  		<div style="float:left; border: 2px solid black;">
        	<?php
				echo "Custoemr NID: ".$row["CUST_NID"]."<br/>";
				echo "Name: ".$row["NAME"]."<br/>";
				echo "Type: ".$row["TYPE"]."<br/>";
				echo "Service Date: ".$row["SERVICE_DATE"]."<br/>";
				echo "Phone: ".$row["PHONE"]."<br/>";
			?>
        </div>
<?php	
	}
?>

</body>
</html>