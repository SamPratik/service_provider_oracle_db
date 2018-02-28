<?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>

<script src="Assets/js/jquery-1.12.0.min.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>


<?php

	$selectSalary = "SELECT CUSTOMER_NAME,CUSTOMER_NATIONAL_ID,CUSTOMER_EMAIL,CUSTOMER_PHONE_NUMBER FROM CUSTOMER";
	
	$resultSalary = oci_parse($c,$selectSalary);
	oci_execute($resultSalary);		
?>
	
<?php	
	while($row = oci_fetch_assoc($resultSalary)) {
?>

<div style="width:325px; float:left; height:160px; border: 2px solid black; margin-right:30px; margin-bottom:20px; padding:20px 20px 20px 40px;">

	<!---------Worker Gets Salary Information--------->
	<?php
			echo "<strong>Customer Name: ".$row["CUSTOMER_NAME"]."</strong><br/>";
			echo "<strong>Customer NID: </strong>".$row["CUSTOMER_NATIONAL_ID"]."<br/>";
			echo "<strong>Customer Email: </strong>".$row["CUSTOMER_EMAIL"]."<br/>";
			echo "<strong>Customer Phone Number: </strong>".$row["CUSTOMER_PHONE_NUMBER"]."<br/>";
	?>
</div>	

<?php
	} //----------while loop---------

?>

</body>
</html>
