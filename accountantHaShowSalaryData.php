<?php include_once("dbConnector.php"); ?>
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
				$insert = "UPDATE SALARY SET STATUS='paid' WHERE SALARY_NO='{$idPaid}'";
				$resultInsert = oci_parse($c,$insert);
				oci_execute($resultInsert);	
			}  //----------if($paid == "paid")-----------
		
		}  //------------if($flag == "paid")------------
		
		if($flag == "unpaid") {
			$idPaid = $_POST["idPaid"];
			$unpaid = $_POST["unpaid"];
			if($unpaid == "unpaid") {
				//echo $idPaid;
				$insert = "UPDATE SALARY SET STATUS='unpaid' WHERE SALARY_NO='{$idPaid}'";
				$resultInsert = oci_parse($c,$insert);
				oci_execute($resultInsert);	
			}  //-------if($unpaid == "unpaid")---------
			
		}  //----------if($flag == "unpaid") -------
		
		if($flag == "salary_date") {
			$idDate = $_POST["idDate"];
			$sal_date = $_POST["sal_date"];
			$updateDate = "UPDATE SALARY SET SALARY_DATE = TO_DATE('{$sal_date}','DD/MM/YYYY') WHERE SALARY_NO = {$idDate}";
			
			$resultDate = oci_parse($c,$updateDate);
			oci_execute($resultDate);
		}
		
	}  //--------if(!empty($_POST))---------
	

?>

<?php

	$selectSalary = "SELECT WORKER_NID,NAME,GENDER,AMOUNT,SALARY_DATE,STATUS,PHONE_NUMBER,SALARY_NO FROM";
	$selectSalary .= " WORKER NATURAL JOIN home_assistance NATURAL JOIN PHONE NATURAL JOIN GETS NATURAL JOIN SALARY";
	
	$resultSalary = oci_parse($c,$selectSalary);
	oci_execute($resultSalary);		
?>
	
<?php	
	while($row = oci_fetch_assoc($resultSalary)) {
?>

<div style="width:325px; float:left; height:320px; border: 2px solid black; margin-right:30px; padding:20px 20px 20px 40px;">

	<!---------Worker Gets Salary Information--------->
	<?php
            echo "<h3>Worker Name: <br/>".$row["NAME"]."</h3><br/>";
            echo "<strong>Worker NID: ".$row["WORKER_NID"]."</strong><br/>";
			echo "<strong>Phone Number: </strong>".$row["PHONE_NUMBER"]."<br/>";
            echo "<strong>License: </strong>".$row["GENDER"]."<br/>";
            echo "<strong>Salary Amount: </strong>".$row["AMOUNT"]."<br/>";
            echo "<strong>Salary Date: </strong>".$row["SALARY_DATE"]."<br/>";
	?>
    
    <!----------Salary Date Form----------->
    
    <form style="margin-bottom:5px;" action="accountantHaShowSalaryData.php" method="post">
        <input style="width:154px;" type="text" name="sal_date" value="" placeholder="DD/MM/YYYY">
        <input class="btn btn-primary btn-sm" type="submit" name="dateSubmit" value="submit"><br/>
        <input type="hidden" name="idDate" value="<?php echo $row["SALARY_NO"]; ?>">
        <input type="hidden" name="flag" value="salary_date">
    </form>
    
    <?php
            /*echo "<strong>Status: </strong>".*/$row["STATUS"]/*."<br/>"*/;
			$row["SALARY_NO"];
			
	//-----------Paid BUtton--------------
			if($row["STATUS"] == "unpaid") {
	?>
    			<form action="accountantHaShowSalaryData.php" method="post">
					<strong>Salary Status: </strong>Make it <input class="btn btn-md btn-success" type="submit" name="paid" value="paid">
                    <input type="hidden" name="idPaid" value="<?php echo $row["SALARY_NO"]; ?>">
                    <input type="hidden" name="flag" value="paid">
				</form>
    <?php	
			}
    ?>
    
    <!-----------Unpaid Button----------->
    <?php
			if($row["STATUS"] == "paid") {
	?>
				<form action="accountantHaShowSalaryData.php" method="post">
					<strong>Salary Status: </strong>Make it <input class="btn btn-md btn-danger" type="submit" name="unpaid" value="unpaid">
                    <input type="hidden" name="idPaid" value="<?php echo $row["SALARY_NO"]; ?>">
                    <input type="hidden" name="flag" value="unpaid">
				</form>
    <?php
			}
	?>		
</div>	

<?php
	} //----------while loop---------

?>
