<?php include_once("dbConnector.php"); ?>

<?php

	if(!empty($_POST)) {
		if($_POST["flag"] == "ha") {
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
			$gen = $_POST["gender"];
			$phone = $_POST["phone"];
			
			$insertWorker = "INSERT INTO WORKER (WORKER_NID,NAME,DOB,EXPERIENCE,EMAIL_ID,PASSWORD) VALUES 
			('$nid','$name',TO_DATE('{$dob}','MM/DD/YYYY'),'$exp','{$e_id}','{$pass}')";	
			
			$resultWorkerInsert = oci_parse($c,$insertWorker);
			oci_execute($resultWorkerInsert);
			
			$insertHa = "INSERT INTO HOME_ASSISTANCE (WORKER_NID,GENDER) VALUES ('{$nid}','{$gen}')";
			
			$resultHaInsert = oci_parse($c,$insertHa);
			oci_execute($resultHaInsert);
			
			$insertPhone = "INSERT INTO PHONE (WORKER_NID,PHONE_NUMBER) VALUES ('{$nid}','{$phone}')";
			
			$resultPhoneInsert = oci_parse($c,$insertPhone);
			oci_execute($resultPhoneInsert);
		}
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

<form action="haReg.php" method="post" onSubmit="return check()">
  
   <h2 style="margin-left:150px; margin-bottom:30px">Home Assistance Registration</h2>
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
     <label  class="col-sm-2">Address:</label>
    <div class="col-sm-10">
      <textarea class="form-control" placeholder="House NO: ,Village: ,Thana: ,District: " name="add" rows="2" style="width:400px" id="c"></textarea>
       <p id="346" style="display:none; color:#F81216">HINTS: Your present address.</p>
    </div>
  </div>-->
  <div class="form-group">
    <label class="col-sm-2" >Date of Birth</label>
    
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
    <label class="col-sm-2" >Phone: </label>
    
    <div class="col-sm-10" >
      <input name="phone" type="text" class="form-control"  style="width:400px" id="d">
    </div>
   </div>
   
   
  

   <div class="form-group" id="types" style="float:left;" >
    <label class="col-sm-2" >Gender: </label>
    
    <div class="col-sm-10" >
      <input name="gender" value="Male" type="radio" id="d" style="margin-left: 131px;">Male
      <input name="gender" value="Female" type="radio" id="d">Female
    </div>
   </div><br/>
 
 <div class="form-group" style="float:left;    margin-top: 34px;margin-left: -350px;">
     <label class="col-sm-2">Email:</label>
    <div class="col-sm-10">
      <input class="form-control" name="e_id" type="email" placeholder="Your Email" style="width:400px;margin-left: 82px;" id="l">
    </div>
  </div><br/>
  
  
  
  <div class="form-group" style="float:left;">
    <label  class="col-sm-2 control-label" style="margin-top:5px;">Password: </label>
    <div class="col-sm-10">
      <input class="form-control" name="pass" type="password"  placeholder="Password" style="width:400px; margin-left:87px;" id="m">
    </div>
  </div>

   <input type="submit" name="submit" value="Submit" style="float:left;margin-top: 46px; margin-left: -73px;" /><br/>
   <input type="hidden" name="flag" value="ha">
  
 </form>
</div> <!--................................................................................>>>>>>>>>> container-->

<?php //include_once("workerTableSelect.php"); ?>

>

</body>
</html>
