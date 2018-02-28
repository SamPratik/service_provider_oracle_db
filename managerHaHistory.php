<?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>

<?php

	$selectSalary = "SELECT CUSTOMER_NAME,CUSTOMER_NATIONAL_ID,CUSTOMER_EMAIL,CUSTOMER_PHONE_NUMBER,NAME,";
	$selectSalary .= "WORKER_NID,PHONE_NUMBER,EMAIL_ID,EXPERIENCE,SERVICE_DATE FROM ";
	$selectSalary .= "Takes_Service_HISTORY JOIN CUSTOMER USING(CUSTOMER_ID) JOIN WORKER USING(WORKER_NID) JOIN ";
	$selectSalary .= "HOME_ASSISTANCE USING(WORKER_NID) JOIN PHONE USING(WORKER_NID) WHERE SERVICE_TYPE='Home Assistance'";
	
	$resultSalary = oci_parse($c,$selectSalary);
	oci_execute($resultSalary);		
?>
	
<?php	
	while($row = oci_fetch_assoc($resultSalary)) {
?>

<div style="width:325px; float:left; height:340px; border: 2px solid black; margin-right:30px; margin-bottom:20px; padding:20px 20px 20px 40px;">

	<!---------Worker Gets Salary Information--------->
	<?php
			echo "<strong>Customer Name: ".$row["CUSTOMER_NAME"]."</strong><br/>";
			echo "<strong>Customer NID: </strong>".$row["CUSTOMER_NATIONAL_ID"]."<br/>";
			echo "<strong>Customer Email: </strong>".$row["CUSTOMER_EMAIL"]."<br/>";
			echo "<strong>Customer Phone Number: </strong>".$row["CUSTOMER_PHONE_NUMBER"]."<br/>";
            echo "<strong>Worker Name: ".$row["NAME"]."</strong><br/>";
            echo "<strong>Worker NID: ".$row["WORKER_NID"]."</strong><br/>";
			echo "<strong>Worker Phone Number: </strong>".$row["PHONE_NUMBER"]."<br/>";
			echo "<strong>Worker Email: </strong>".$row["EMAIL_ID"]."<br/>";
			echo "<strong>Worker Experience: </strong>".$row["EXPERIENCE"]."<br/>";
			echo "<strong>Service Date: </strong>".$row["SERVICE_DATE"]."<br/>";
	?>
</div>	

<?php
	} //----------while loop---------

?>

<script src="Assets/js/jquery-1.12.0.min.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>

</body>
</html>
