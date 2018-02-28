<?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>

<?php 	$cust_id = $_SESSION["cust_id"]; ?>

<?php

	if(!empty($_POST)) {
		if($_POST["flag"] == "editName") {
			$name = $_POST["name"];
			$queryUpdateName = "UPDATE CUSTOMER SET CUSTOMER_NAME = '{$name}' WHERE CUSTOMER_ID = '{$cust_id}'";
			
			$resultUpdate = oci_parse($c,$queryUpdateName);
			oci_execute($resultUpdate);
		}
		
		if($_POST["flag"] == "editPhone") {
			$phone = $_POST["phone"];
			$queryUpdateName = "UPDATE CUSTOMER SET CUSTOMER_PHONE_NUMBER = '{$phone}' WHERE CUSTOMER_ID = '{$cust_id}'";
			
			$resultUpdate = oci_parse($c,$queryUpdateName);
			oci_execute($resultUpdate);
		}
	}

?>

<?php

	$queryCustomer = "SELECT CUSTOMER_NAME,CUSTOMER_ID,CUSTOMER_NATIONAL_ID,CUSTOMER_EMAIL,";
	$queryCustomer .= "CUSTOMER_PHONE_NUMBER FROM CUSTOMER WHERE CUSTOMER_ID='{$cust_id}'";
	$resultCustomer = oci_parse($c,$queryCustomer);
	oci_execute($resultCustomer);
?>

<div style="float:left; margin-left:375px;">
<?php

	while($row = oci_fetch_assoc($resultCustomer)) {
		echo "<strong>Your Name: </strong>".$row["CUSTOMER_NAME"]."<br/><br/>";
?>
		
		<form action="customerProfile.php" method="post">
        	<strong>Update Your Name: </strong><br/><input style="width:245px;" type="text" name="name" value="" placeholder="Update your Name">
        	<input class="btn btn-xs btn-success" type="submit" name="editName" value="edit"><br/><br/>
            <input type="hidden" name="flag" value="editName">
        </form>
        
<?php		
		echo "<strong>Your ID: </strong>".$row["CUSTOMER_ID"]."<br/><br/>";
		echo "<strong>Your NID: </strong>".$row["CUSTOMER_NATIONAL_ID"]."<br/><br/>";
		echo "<strong>Your EMAIL ID: </strong>".$row["CUSTOMER_EMAIL"]."<br/><br/>";
		echo "<strong>Your Phone Number: </strong>".$row["CUSTOMER_PHONE_NUMBER"]."<br/><br/>";
	}

?>

		<form action="customerProfile.php" method="post">
        	<strong>Update Your Phone Number: </strong><br/>
            <input style="width:245px;" type="text" name="phone" value="" placeholder="Update your phone number">
        	<input class="btn btn-xs btn-success" type="submit" name="editPhone" value="edit"><br/><br/>
            <input type="hidden" name="flag" value="editPhone">
        </form>
</div>

<script src="Assets/js/jquery-1.12.0.min.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>


</body>
</html>
