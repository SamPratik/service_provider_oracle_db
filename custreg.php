
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="Service pro 2/css/bootstrap.min.css" rel="stylesheet" type="text/css" >
<link href="Service pro 2/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
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
		
		if( z.value== "" || x.value=="" || w.value== ""||o.value==""||n.value==""){
			
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

<body style="background:#D4CFCF">
<div class="container" style="margin-left:350px; margin-top:5px;">

<form action="custreg.php" method="post" onSubmit="return check()">
  
   <h2 style="margin-left:150px; margin-bottom:30px; color:#08036F; font-family: Impact, Haettenschweiler, 'Franklin Gothic Bold', 'Arial Black', sans-serif; font-size:36px">CUSTOMER REGISTRATION</h2>
  <div class="form-group">
     <label class="col-sm-2">Your Name :</label>
     
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Your Name" style="width:400px" id="a" name="cust_name" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>
  
  
  <div class="form-group">
    <label class="col-sm-2" >National ID</label>
    
    <div class="col-sm-10" >
      <input type="text" class="form-control"  style="width:400px" id="d" name="nid">
    </div>
   </div>
 
  <div class="form-group">
     <label  class="col-sm-2">House No:</label>
    <div class="col-sm-10">
      <textarea class="form-control" placeholder="House NO:" name="hn" rows="2" style="width:400px" id="c"></textarea>
       <p id="346" style="display:none; color:#F81216">HINTS: Your present address.</p>
    </div>
  </div>
  
  <div class="form-group">
     <label  class="col-sm-2">Street No:</label>
    <div class="col-sm-10">
      <textarea class="form-control" placeholder="Street NO:" name="street" rows="2" style="width:400px" id="c"></textarea>
       <p id="346" style="display:none; color:#F81216">HINTS: Your present address.</p>
    </div>
  </div>
  
  <div class="form-group">
     <label  class="col-sm-2">Village:</label>
    <div class="col-sm-10">
      <textarea class="form-control" placeholder="Village: " name="village" rows="2" style="width:400px" id="c"></textarea>
       <p id="346" style="display:none; color:#F81216">HINTS: Your present address.</p>
    </div>
  </div>
  
  <div class="form-group">
     <label  class="col-sm-2">Thana:</label>
    <div class="col-sm-10">
      <textarea class="form-control" placeholder="Thana: " name="thana" rows="2" style="width:400px" id="c"></textarea>
       <p id="346" style="display:none; color:#F81216">HINTS: Your present address.</p>
    </div>
  </div>
  
  <div class="form-group">
     <label  class="col-sm-2">District:</label>
    <div class="col-sm-10">
      <textarea class="form-control" placeholder="District: " name="district" rows="2" style="width:400px" id="c"></textarea>
       <p id="346" style="display:none; color:#F81216">HINTS: Your present address.</p>
    </div>
  </div>
  
  <div class="form-group">
     <label class="col-sm-2">Your Phone No.:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Your Phone No." style="width:400px" id="l" name="phone">
    </div>
  </div>
  
  <div class="form-group">
     <label class="col-sm-2">Your Email id:</label>
    <div class="col-sm-10">
      <input name="e_id" type="email" class="form-control" placeholder="Your Email" style="width:400px" id="l">
    </div>
  </div>
  
  <div class="form-group">
    <label  class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  placeholder="Password" style="width:400px" id="m" name="pass">
    </div>
  </div>

   <input type="submit" class="btn btn-group-lg" value="Submit" name="submit" style="margin-left:300px; margin-top:20px" />
  
 </form>
 
 
 
</div> <!--................................................................................>>>>>>>>>> container-->

<h3><center>You have to be a registered customer to take our services. !!!</center></h3>

<?php include_once("dbConnector.php"); ?>

<?php  

if(isset($_POST["submit"])) {
	$nid = $_POST["nid"];
	$hn = $_POST["hn"];
	$street = $_POST["street"];
	$village = $_POST["village"];
	$thana = $_POST["thana"];
	$district = $_POST["district"];
	$e_id = $_POST["e_id"];
	$phone = $_POST["phone"];
	$pass = $_POST["pass"];
	$cust_name = $_POST["cust_name"];
	$cust_pass = $_POST["pass"];
	
	$insertCustomer = "INSERT INTO CUSTOMER (CUSTOMER_ID,CUSTOMER_NATIONAL_ID,CUSTOMER_NAME,CUSTOMER_EMAIL,ADDRESS,CUSTOMER_PHONE_NUMBER,PASSWORD) VALUES";
	$insertCustomer .= "(Customer_id_seq.NEXTVAL,'{$nid}','{$cust_name}','{$e_id}',ADDR('{$hn}','{$street}','{$village}','{$thana}','{$district}'),'{$phone}','{$cust_pass}')";	
	
	$resultCustomerInsert = oci_parse($c, $insertCustomer);
	oci_execute($resultCustomerInsert);
	
	echo "<strong style='color:red;'>You have registered successfully as a CUSTOMER</strong>";
}

?>



</body>
</html>
