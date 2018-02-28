<?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>

<script src="Assets/js/jquery-1.12.0.min.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>


<?php

	$selectSalary = "SELECT NAME,WORKER_NID,PHONE_NUMBER,EMAIL_ID,LICENSE,DOB,EXPERIENCE FROM ";
	$selectSalary .= "WORKER JOIN DRIVER USING(WORKER_NID) JOIN PHONE USING (WORKER_NID)";
	
	$resultSalary = oci_parse($c,$selectSalary);
	oci_execute($resultSalary);		
?>
	
<?php	
	while($row = oci_fetch_assoc($resultSalary)) {
?>

<div style="width:325px; float:left; height:200px; border: 2px solid black; margin-right:30px; margin-bottom:20px; padding:20px 20px 20px 40px;">

	<!---------Worker Gets Salary Information--------->
	<?php
			echo "<strong>Worker Name: ".$row["NAME"]."</strong><br/>";
			echo "<strong>Worker NID: </strong>".$row["WORKER_NID"]."<br/>";
			echo "<strong>Worker Phone Number: </strong>".$row["PHONE_NUMBER"]."<br/>";
			echo "<strong>Worker Email: </strong>".$row["EMAIL_ID"]."<br/>";
			echo "<strong>Worker License: </strong>".$row["LICENSE"]."<br/>";
			echo "<strong>Worker Date of Birth: </strong>".$row["DOB"]."<br/>";
			echo "<strong>Worker Experience: </strong>".$row["EXPERIENCE"]."<br/>";
	?>
</div>	

<?php
	} //----------while loop---------

?>

</body>
</html>
