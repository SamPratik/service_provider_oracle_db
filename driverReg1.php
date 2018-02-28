<?php include_once("dbConnector.php"); ?>
<?php
	
	if(!empty($_POST))
		if($_POST["flag"] == "driver") {
			$nid = $_POST["nid"];
			$name = $_POST["name"];
			/*$hn = $_POST["hn"];
			$village = $_POST["village"];
			$thana = $_POST["thana"];
			$district = $_POST["district"];*/
			$dob = $_POST["dob"];
			$exp = $_POST["exp"];
			$e_id = $_POST["e_id"];
			$pass = $_POST["pass"];
			//$salary = $_POST["salary"];
			//$phone = $_POST["phone"];
			$license = $_POST["license"];
			$phone = $_POST["phone"];
			
			$insertWorker = "INSERT INTO WORKER (WORKER_NID,NAME,DOB,EXPERIENCE,EMAIL_ID,PASSWORD) VALUES 
			('$nid','$name',TO_DATE('$dob','MM/DD/YYYY'),'$exp','{$e_id}','{$pass}')";	
			
			$resultWorkerInsert = oci_parse($c,$insertWorker);
			oci_execute($resultWorkerInsert);
			
			$insertDriver = "INSERT INTO DRIVER (WORKER_NID,LICENSE) VALUES ";
			$insertDriver .= "('{$nid}','{$license}')";	
			
			$resultDriverInsert = oci_parse($c,$insertDriver);
			oci_execute($resultDriverInsert);
			
				
			$insertPhone = "INSERT INTO PHONE (WORKER_NID,PHONE_NUMBER) VALUES ";
			$insertPhone .= "('{$nid}','{$phone}')";	
			
			$resultPhoneInsert = oci_parse($c,$insertPhone);
			oci_execute($resultPhoneInsert);
			
		}

?>
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

<form action="driverReg1.php" method="post">
  
   <h2 style="margin-left:150px; margin-bottom:30px">WORKER REGISTRATION</h2>
  <div class="form-group">
     <label class="col-sm-2">Your Name :</label>
     
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" placeholder="Your name" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>
  
	<div class="form-group">
     	<label  class="col-sm-2">National ID:</label>
        <div class="col-sm-10">
          <input type="text" name="nid" class="form-control"  placeholder="National ID" style="width:400px" id="b">
        </div>
  	</div>

  
  <!--<div class="form-group">
     <label  class="col-sm-2">House No:</label>
    <div class="col-sm-10">
      <textarea class="form-control" placeholder="House NO:" name="hn" rows="2" style="width:400px" id="c"></textarea>
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
  </div>-->
  
  <div class="form-group">
    <label class="col-sm-2" >Date of Birth: </label>
    
    <div class="col-sm-10" >
      <input name="dob" type="text" placeholder="MM/DD/YYYY" class="form-control"  style="width:400px" id="d">
    </div>
   </div>
   
   <div class="form-group">
    <label class="col-sm-2" >Experience: </label>
    
    <div class="col-sm-10" >
      <input name="exp" type="text" class="form-control"  style="width:400px" id="d">
    </div>
   </div>
 
 <div class="form-group">
     <label class="col-sm-2">Your Email id:</label>
    <div class="col-sm-10">
      <input name="e_id" type="email" class="form-control" placeholder="Your Email" style="width:400px" id="l">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-2 control-label">Password: </label>
    <div class="col-sm-10">
      <input name="pass" type="password" class="form-control"  placeholder="Password" style="width:400px" id="m">
    </div>
  </div>

	<!---------license------------->
	<div class="form-group" id="types" >
    	<label class="col-sm-2" >License Number: </label>
    
        <div class="col-sm-10" >
          <input name="license" type="text" class="form-control"  style="width:400px" id="d">
        </div>
   </div>
    
   <div class="form-group" id="types" >
    <label class="col-sm-2" >Phone Number: </label>
    
    <div class="col-sm-10" >
      <input name="phone" type="text" class="form-control"  style="width:400px" id="d">
    </div>
   </div>  

   <input type="submit" name="submit" value="submit" />
   <input type="hidden" name="flag" value="driver">
  
 </form>
</div> <!--................................................................................>>>>>>>>>> container-->

<?php //include_once("workerTableSelect.php"); ?>

	
</body>
</html>
