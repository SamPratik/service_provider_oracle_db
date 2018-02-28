<?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>

<div class="col-lg-12 col-lg-offset-4" style="float:left;">

<form action="accountantInsertCustData.php" method="post">
  
   <h2 style="margin-left:150px; margin-bottom:30px">Customer Bill</h2>
  <div class="form-group">
     <label>Customer ID :</label>
     
    <div>
      <input type="text" name="cust_id" class="form-control" placeholder="Customer ID" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>
  
	<div class="form-group">
     	<label>Bill Amount:</label>
        <div>
          <input type="number" name="amount" class="form-control"  placeholder="Amount" style="width:400px" id="b">
        </div>
  	</div>
    
  <div class="form-group">
     <label>Bill No :</label>
     
    <div>
      <input type="text" name="bill_no" class="form-control" placeholder="Salary No" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>

  <div class="form-group">
     <label>Month-Year :</label>
     
    <div>
      <input type="text" name="mon_year" class="form-control" placeholder="MON-YYYY" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>
    
    

   <input class="btn btm-md btn-primary" style="margin-bottom:20px;" type="submit" name="submit" value="Submit" />
  
 </form>
</div> <!--................................................................................>>>>>>>>>> container-->

<?php //include_once("workerTableSelect.php"); ?>


<?php

if(isset($_POST["submit"])) {
	$cust_id = $_POST["cust_id"];
	$amount = $_POST["amount"];
	$bill_no = $_POST["bill_no"];
	$mon_year = $_POST["mon_year"];
	
	$insertSalary = "INSERT INTO BILL (AMOUNT,BILL_NO,MON_YEAR,STATUS) VALUES ('{$amount}','{$bill_no}','{$mon_year}','unpaid')";
	$resultSalary = oci_parse($c,$insertSalary);
	oci_execute($resultSalary);
	
	$insertWorkerNid = "INSERT INTO PAYS (CUSTOMER_ID,BILL_NO) VALUES ('$cust_id','$bill_no')";
	$resultWorkerNid = oci_parse($c,$insertWorkerNid);
	oci_execute($resultWorkerNid);	
	
	$insertHandles = "INSERT INTO Handles_Billof2 (EMP_NID,CUSTOMER_ID) VALUES (201414011,'{$cust_id}')";
	$resultHandles = oci_parse($c,$insertHandles);
	oci_execute($resultHandles);
}

?>


<div class="row" style="background: #524A4A; color:#FBF8F8; height:200px; float:left; width:1097px;">
<div class="col-lg-6">
<h1 style="font-size: 19px;"><center>ABOUT US</center></h1>
<h2 style="font-size:19px;"><center>Contact:</center> </h2>
</div>
<div class="col-lg-6">
<h2 style="font-size: 19px;"><center>WHY SERVICE PROVIDER IS BEST ?</center></h2>
<h2 style="font-size:19px;"><center>Hotline: </center></h2>
</div>


</div>







<script src="Assets/js/jquery-1.12.0.min.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>

	
</body>
</html>
