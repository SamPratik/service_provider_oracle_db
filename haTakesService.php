<?php session_start(); ?>
<?php include_once("dbConnector.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" >
<link href="Assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
//............... Javascript function to varify that all the option in the form is filled properly......................
 function check(){
	 var z= document.getElementById('a');
	  var y= document.getElementById('b');
	   var x= document.getElementById('c');
	    var w= document.getElementById('d');
		 var v= document.getElementById('e');
		  var u= document.getElementById('f');
		   var t= document.getElementById('g');
		    var s= document.getElementById('h');
			 var r= document.getElementById('i');
			  var q= document.getElementById('j');
			   var p= document.getElementById('k');
			    var o= document.getElementById('l');
				 var n= document.getElementById('m');
		
		if( (z.value== "" || y.value== "" || x.value=="" || w.value== ""||o.value==""||n.value=="")|| (v.checked==false&& u.checked==false &&t.checked== false&& s.checked==false&& r.checked==false&& q.checked==false&& p.checked==false)){
			
			alert('Please fill al the form');
			return false;
		 	}
			else{
			return true;	
			}
 }
 //....................................................................................................................
</script>
</head>

<body style="background:#D4CACB">
<div class="container" style="margin-left:350px">


<?php if(!empty($_SESSION)) { ?>

<form action="haTakesService.php" method="post">
  
   <h2 style="margin-left:150px; margin-bottom:30px">WORKER REGISTRATION</h2>
  <!--<div class="form-group">
     <label class="col-sm-2">Service Time :</label>
     
    <div class="col-sm-10">
      <input type="text" name="service_t" class="form-control" placeholder="hh : mi" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>-->
  
	<div class="form-group">
     	<label  class="col-sm-2">Service Date :</label>
        <div class="col-sm-10">
          <input type="text" name="service_d" class="form-control"  placeholder="dd/mm/yyyy" style="width:400px" id="b">
        </div>
  	</div>

  
  <!--<div class="form-group">
     <label  class="col-sm-2">Customer ID:</label>
    <div class="col-sm-10">
      <textarea class="form-control" placeholder="Customer ID" name="c_id" rows="2" style="width:400px" id="c"></textarea>
       <p id="346" style="display:none; color:#F81216">HINTS: Your present address.</p>
    </div>
  </div>-->
  
  <div class="form-group">
     <label  class="col-sm-2">Worker National ID:</label>
    <div class="col-sm-10">
      <textarea class="form-control" placeholder="Wroker National ID" name="w_nid" rows="2" style="width:400px" id="c"></textarea>
       <p id="346" style="display:none; color:#F81216">HINTS: Your present address.</p>
    </div>
  </div>  
  
   <input type="submit" name="submit" value="Submit" />
  
 </form>
 
 
<?php } ?>
 
</div> <!--................................................................................>>>>>>>>>> container-->

<?php //include_once("workerTableSelect.php"); ?>

<?php
	if(isset($_POST["submit"])) {
		$service_d = $_POST["service_d"];
		$w_nid = $_POST["w_nid"];
		/*Create table Takes_Service (
Service_Time DATE,
Service_Date DATE,
Service_Type VARCHAR2(30),
Customer_id  VARCHAR(30),
Worker_NID  VARCHAR(30),
CONSTRAINT FKCustomer1 FOREIGN KEY (Customer_id) REFERENCES Customer,
CONSTRAINT FKWorker1 FOREIGN KEY (Worker_NID) REFERENCES Worker
);*/
		
		
		$insertTakes_Service = "INSERT INTO TAKES_SERVICE (SERVICE_DATE,SERVICE_TYPE,CUSTOMER_ID,WORKER_NID,STATUS) ";
		$insertTakes_Service .= "VALUES (TO_DATE('{$service_d}','dd/mm/yyyy'),'Home Assistance','{$_SESSION['cust_id']}','{$w_nid}',";
		$insertTakes_Service .= "'undone') ";
		
		$resultTakes_Service = oci_parse($c,$insertTakes_Service);
		oci_execute($resultTakes_Service);
		
		if($resultTakes_Service) {
			$meassage = "<strong style='color:red;'>Your request of taking services has been granted</strong>";	
			echo $meassage."<br/>";
		}
		
	}
?>

<?php
	$querySelect = "SELECT WORKER_NID,NAME,";
	$querySelect .= "DOB,EXPERIENCE,EMAIL_ID,";
	$querySelect .= "GENDER,PHONE_NUMBER FROM WORKER NATURAL JOIN HOME_ASSISTANCE ";
	$querySelect .= "NATURAL JOIN PHONE";
	$resultSelect = oci_parse($c,$querySelect);
	oci_execute($resultSelect);
	while($row = oci_fetch_assoc($resultSelect)) {
?>

<div style="float:left; border:2px solid black; margin-right:5px;">
<?php
		echo "<strong>Worker National ID: </strong>".$row["WORKER_NID"]."<br/>";
		echo "<strong>Worker Name: </strong>".$row["NAME"]."<br/>";
		echo "<strong>Date of Birth: </strong>".$row["DOB"]."<br/>";
		echo "<strong>Experience: </strong>".$row["EXPERIENCE"]."<br/>";
		echo "<strong>Email ID: </strong>".$row["EMAIL_ID"]."<br/>";
		echo "<strong>License: </strong>".$row["GENDER"]."<br/>";
		echo "<strong>Phone Number: </strong>".$row["PHONE_NUMBER"]."<br/>";
?>
</div>

<?php
		
	}
?>

	
</body>
</html>
