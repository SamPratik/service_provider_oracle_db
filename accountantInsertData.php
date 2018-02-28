<?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>

<div class="col-lg-12 col-lg-offset-4" style="float:left;">

<form action="accountantInsertData.php" method="post">
  
   <h2 style="margin-left:150px; margin-bottom:30px">Worker Salary</h2>
  <div class="form-group">
     <label>Worker NID :</label>
     
    <div>
      <input type="text" name="nid" class="form-control" placeholder="Worker National ID" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>
  
	<div class="form-group">
     	<label>Amount:</label>
        <div>
          <input type="number" name="amount" class="form-control"  placeholder="Amount" style="width:400px" id="b">
        </div>
  	</div>
    
  <div class="form-group">
     <label>Salary No :</label>
     
    <div>
      <input type="text" name="sal_no" class="form-control" placeholder="Salary No" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>

  <div class="form-group">
     <label>Salary Recieve Date :</label>
     
    <div>
      <input type="text" name="date" class="form-control" placeholder="DD/MM/YYYY" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>
    
    

   <input class="btn btm-md btn-primary" style="margin-bottom:20px;" type="submit" name="submit" value="Submit" />
  
 </form>
</div> <!--................................................................................>>>>>>>>>> container-->

<?php //include_once("workerTableSelect.php"); ?>


<?php

if(isset($_POST["submit"])) {
	$nid = $_POST["nid"];
	$amount = $_POST["amount"];
	$sal_no = $_POST["sal_no"];
	$date = $_POST["date"];
	
	$insertSalary = "INSERT INTO SALARY (AMOUNT,SALARY_NO,SALARY_DATE,STATUS) VALUES ('{$amount}','{$sal_no}',TO_DATE('{$date}','DD/MM/YYYY'),'paid')";
	$resultSalary = oci_parse($c,$insertSalary);
	oci_execute($resultSalary);
	
	$insertWorkerNid = "INSERT INTO GETS (WORKER_NID,SALARY_NO) VALUES ('$nid','$sal_no')";
	$resultWorkerNid = oci_parse($c,$insertWorkerNid);
	oci_execute($resultWorkerNid);	
	
	$insertHandles = "INSERT INTO HANDLES (EMP_NID,SALARY_NO) VALUES (201414011,'{$sal_no}')";
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
