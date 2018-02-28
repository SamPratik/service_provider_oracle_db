<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html><?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>

<!---------Updating Paid and Unpaid-------->
<?php

	if(empty($_POST)) {
		$paid = "";
		$unpaid = "";
	}
	
	if(!empty($_POST)) {
		
		$flag = $_POST["flag"];
		
		if($flag == "paid") {
			$idPaid = $_POST["idPaid"];
			$paid = $_POST["paid"];
			if($paid == "paid") {
				//echo $idPaid;
				$insert = "UPDATE BILL SET STATUS='paid' WHERE BILL_NO='{$idPaid}'";
				$resultInsert = oci_parse($c,$insert);
				oci_execute($resultInsert);	
			}  //----------if($paid == "paid")-----------
		
		}  //------------if($flag == "paid")------------
		
		if($flag == "unpaid") {
			$idPaid = $_POST["idPaid"];
			$unpaid = $_POST["unpaid"];
			if($unpaid == "unpaid") {
				//echo $idPaid;
				$insert = "UPDATE BILL SET STATUS='unpaid' WHERE BILL_NO='{$idPaid}'";
				$resultInsert = oci_parse($c,$insert);
				oci_execute($resultInsert);	
			}  //-------if($unpaid == "unpaid")---------
			
		}  //----------if($flag == "unpaid") -------
		
		if($flag == "salary_date") {
			$idDate = $_POST["idDate"];
			$sal_date = $_POST["sal_date"];
			$updateDate = "UPDATE BILL SET PAY_DATE = TO_DATE('{$sal_date}','DD/MM/YYYY') WHERE BILL_NO = {$idDate}";
			
			$resultDate = oci_parse($c,$updateDate);
			oci_execute($resultDate);
		}
		
	}  //--------if(!empty($_POST))---------
	

?>

<?php

	$selectSalary = "SELECT CUSTOMER_NAME,CUSTOMER_NATIONAL_ID,BILL_NO,CUSTOMER_EMAIL,CUSTOMER_PHONE_NUMBER,AMOUNT,MON_YEAR,B.STATUS,PAY_DATE ";
	$selectSalary .= "FROM CUSTOMER JOIN PAYS USING(CUSTOMER_ID) JOIN BILL B USING(BILL_NO) ";
	$selectSalary .= "JOIN TAKES_SERVICE USING(CUSTOMER_ID) JOIN DRIVER USING(WORKER_NID)";
	
	$resultSalary = oci_parse($c,$selectSalary);
	oci_execute($resultSalary);		
?>
	
<?php	
	while($row = oci_fetch_assoc($resultSalary)) {
?>

<div style="width:325px; float:left; height:415px; border: 2px solid black; margin-right:30px; padding:20px 20px 20px 40px;">

	<!---------Worker Gets Salary Information--------->
	<?php
            echo "<h3>Customer Name: <br/>".$row["CUSTOMER_NAME"]."</h3><br/>";
            echo "<strong>Customer NID: ".$row["CUSTOMER_NATIONAL_ID"]."</strong><br/>";
            echo "<strong>Customer Phone Number: </strong>".$row["CUSTOMER_PHONE_NUMBER"]."<br/>";
            echo "<strong>Customer Email: </strong>".$row["CUSTOMER_EMAIL"]."<br/>";
			echo "<strong>Bill No: </strong>".$row["BILL_NO"]."<br/>";
            echo "<strong>Bill Amount: </strong>".$row["AMOUNT"]."<br/>";
			echo "<strong>Bill Month: </strong>".$row["MON_YEAR"]."<br/>";
			echo "<strong>Bill Pay Date: </strong>".$row["PAY_DATE"]."<br/>";
	?>
    
    <!----------Salary Date Form----------->
    
    <form style="margin-bottom:5px;" action="accountantDriverShowBillData.php" method="post">
        <input style="width:154px;" type="text" name="sal_date" value="" placeholder="DD/MM/YYYY">
        <input class="btn btn-primary btn-sm" type="submit" name="dateSubmit" value="submit"><br/>
        <input type="hidden" name="idDate" value="<?php echo $row["BILL_NO"]; ?>">
        <input type="hidden" name="flag" value="salary_date">
    </form>
    
    <?php
            /*echo "<strong>Status: </strong>".*/$row["STATUS"]/*."<br/>"*/;
			$row["BILL_NO"];
			
	//-----------Paid BUtton--------------
			if($row["STATUS"] == "unpaid") {
	?>
    			<form action="accountantDriverShowBillData.php" method="post">
					<strong>Bill Status: </strong>Make it <input class="btn btn-md btn-success" type="submit" name="paid" value="paid">
                    <input type="hidden" name="idPaid" value="<?php echo $row["BILL_NO"]; ?>">
                    <input type="hidden" name="flag" value="paid">
				</form>
    <?php	
			}
    ?>
    
    <!-----------Unpaid Button----------->
    <?php
			if($row["STATUS"] == "paid") {
	?>
				<form action="accountantDriverShowBillData.php" method="post">
					<strong>Bill Status: </strong>Make it <input class="btn btn-md btn-danger" type="submit" name="unpaid" value="unpaid">
                    <input type="hidden" name="idPaid" value="<?php echo $row["BILL_NO"]; ?>">
                    <input type="hidden" name="flag" value="unpaid">
				</form>
    <?php
			}
	?>		
</div>	

<?php
	} //----------while loop---------

?>
