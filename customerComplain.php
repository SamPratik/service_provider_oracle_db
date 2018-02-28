<?php include_once("dbConnector.php"); ?>
<?php include_once("header.php"); ?>

<?php

if(isset($_POST["submit"])) {
	$nid = $_POST["nid"];
	$complain = $_POST["complain"];
	$cust_id = $_SESSION["cust_id"];
	
	$insertSalary = "INSERT INTO COMPLAIN (CUSTOMER_ID,WORKER_NID,COMPLAIN_ID,COMPLAIN_DETAILS,COMPLAIN_STATUS) ";
	$insertSalary .= "VALUES ('{$cust_id}','{$nid}',complain_id_seq.NEXTVAL,'{$complain}','customer')";
	$resultSalary = oci_parse($c,$insertSalary);
	oci_execute($resultSalary);
	
	echo "<strong style='color:red;'>Your complain has been received and we will take necessary actions</strong>";
	
}

?>


<div class="col-lg-12 col-lg-offset-4" style="float:left;">

    <form action="customerComplain.php" method="post">
      
       <h2 style=" margin-bottom:30px">Customer Complain</h2>
      <div class="form-group">
         <label>Worker NID :</label>
         
        <div>
          <input type="text" name="nid" class="form-control" placeholder="Worker National ID" style="width:400px" id="a" >
          <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
        </div>
        
      	</div>
      
        <div class="form-group">
            <label>Your Complian:</label>
            <div>
              <textarea name="complain" class="form-control"  placeholder="You Complain" style="width:400px; height:105px" id="b"></textarea>
            </div>
        </div>
        
       <input class="btn btm-md btn-primary" style="margin-bottom:20px;" type="submit" name="submit" value="Submit" />
      
     </form>
 
 </div>
 
<script src="Assets/js/jquery-1.12.0.min.js"></script>
<script src="Assets/js/bootstrap.min.js"></script>

	
</body>
</html>