<?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>


<!---------Updating Paid and Unpaid-------->
<?php

	if(empty($_POST)) {
		$done = "";
		$undone = "";
	}
	
	if(!empty($_POST)) {
		
		$flag = $_POST["flag"];
		
		if($flag == "done") {
			$idPaid = $_POST["idPaid"];
			$done = $_POST["done"];
			if($done == "done") {
				//echo $idPaid;
				$insert = "UPDATE TAKES_SERVICE SET STATUS='done' WHERE WORKER_NID='{$idPaid}'";
				$resultInsert = oci_parse($c,$insert);
				oci_execute($resultInsert);	
			}  //----------if($done == "done")-----------
		
		}  //------------if($flag == "done")------------
		
		if($flag == "undone") {
			$idPaid = $_POST["idPaid"];
			$undone = $_POST["undone"];
			if($undone == "undone") {
				//echo $idPaid;
				$insert = "UPDATE TAKES_SERVICE SET STATUS='undone' WHERE WORKER_NID='{$idPaid}'";
				$resultInsert = oci_parse($c,$insert);
				oci_execute($resultInsert);	
			}  //-------if($undone == "undone")---------
			
		}  //----------if($flag == "undone") -------
		
		if($flag == "delete") {
			$idPaid = $_POST["idPaid"];
			$idPaid1 = $_POST["idPaid1"];
			$insert = "DELETE FROM TAKES_SERVICE WHERE WORKER_NID='{$idPaid}' AND CUSTOMER_ID='{$idPaid1}'";
			$resultInsert = oci_parse($c,$insert);
			oci_execute($resultInsert);	
			
		}  //----------if($flag == "delete") -------		
		
	}  //--------if(!empty($_POST))---------
	

?>


<?php

	$selectSalary = "SELECT * FROM CUSTOMER_service_VIEW JOIN takes_service USING(WORKER_NID) WHERE SERVICE_TYPE='Home Assistance'";
	
	$resultSalary = oci_parse($c,$selectSalary);
	oci_execute($resultSalary);		
?>
	
<?php	
	while($row = oci_fetch_assoc($resultSalary)) {
?>

<div style="width:325px; float:left; height:380px; border: 2px solid black; margin-right:30px; margin-bottom:20px; padding:20px 20px 20px 40px;">

	<!---------Worker Gets Salary Information--------->
	<?php
			echo "<strong>Customer Name: ".$row["CUST_NAME"]."</strong><br/>";
			echo "<strong>Customer NID: </strong>".$row["CUST_NID"]."<br/>";
			echo "<strong>Customer Email: </strong>".$row["CUST_EMAIL"]."<br/>";
			echo "<strong>Customer Phone Number: </strong>".$row["CUST_PHONE"]."<br/>";
            echo "<strong>Worker Name: ".$row["WORKER_NAME"]."</strong><br/>";
            echo "<strong>Worker NID: ".$row["WORKER_NID"]."</strong><br/>";
			echo "<strong>Worker Phone Number: </strong>".$row["WORKER_PHONE"]."<br/>";
			echo "<strong>Worker Email: </strong>".$row["WORKER_EMAIL"]."<br/>";
			echo "<strong>Worker Experience: </strong>".$row["WORKER_EXP"]."<br/>";
			echo "<strong>Service Date: </strong>".$row["SER_DATE"]."<br/>";
	?>
	
    <?php		
	//------------Done Button-------------		
			if($row["STATUS"] == "undone") {
	?>
	
    			<form action="managerCustomerTookHa.php" method="post">
					<strong>Service Status: </strong>Make it <input class="btn btn-md btn-success" type="submit" name="done" value="done">
                    <input type="hidden" name="idPaid" value="<?php echo $row["WORKER_NID"]; ?>">
                    <input type="hidden" name="flag" value="done">
				</form>
    <?php	
			}
    ?>
    
    <!-----------Undone Button----------->
    <?php
			if($row["STATUS"] == "done") {
	?>
				<form action="managerCustomerTookHa.php" method="post">
					<strong>Service Status: </strong>Make it <input class="btn btn-md btn-danger" type="submit" name="undone" value="undone">
                    <input type="hidden" name="idPaid" value="<?php echo $row["WORKER_NID"]; ?>">
                    <input type="hidden" name="flag" value="undone">
				</form>
    <?php
			}
	?>
    			<form action="managerCustomerTookHa.php" method="post">
					<input class="btn btn-md btn-warning" type="submit" name="done" value="delete">
                    <input type="hidden" name="idPaid" value="<?php echo $row["WORKER_NID"]; ?>">
                    <input type="hidden" name="idPaid1" value="<?php echo $row["CUST_ID"]; ?>">
                    <input type="hidden" name="flag" value="delete">
				</form>
</div>	

<?php
	} //----------while loop---------

?>

<script src="Assets/js/jquery-1.12.0.min.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>

</body>
</html>
