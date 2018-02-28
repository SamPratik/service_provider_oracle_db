<?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>


<?php

	$selectSalary = "SELECT WORKER_NID,NAME,LICENSE,AMOUNT,SALARY_DATE,STATUS,PHONE_NUMBER,SALARY_NO FROM";
	$selectSalary .= " WORKER NATURAL JOIN DRIVER NATURAL JOIN PHONE NATURAL JOIN GETS NATURAL JOIN SALARY";
	
	$resultSalary = oci_parse($c,$selectSalary);
	oci_execute($resultSalary);		
?>
	
<?php	
	while($row = oci_fetch_assoc($resultSalary)) {
?>

<div style="width:325px; float:left; height:250px; border: 2px solid black; margin-right:30px; margin-bottom:20px; padding:20px 20px 20px 40px;">

	<!---------Worker Gets Salary Information--------->
	<?php
            echo "<h3>Worker Name: <br/>".$row["NAME"]."</h3><br/>";
            echo "<strong>Worker NID: ".$row["WORKER_NID"]."</strong><br/>";
			echo "<strong>Phone Number: </strong>".$row["PHONE_NUMBER"]."<br/>";
            echo "<strong>License: </strong>".$row["LICENSE"]."<br/>";
            echo "<strong>Salary Amount: </strong>".$row["AMOUNT"]."<br/>";
            echo "<strong>Salary Date: </strong>".$row["SALARY_DATE"]."<br/>";
	?>
</div>	

<?php
	} //----------while loop---------

?>
