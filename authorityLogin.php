<!--------SESSION Start-------->
<?php session_start(); ?>

<?php include_once("dbConnector.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Login</title>
<link href="bootstrap.min.css" rel="stylesheet" type="text/css" >
<link href="bootstrap-theme.min.css" rel="stylesheet" type="text/css">
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

<form action="authorityLogin.php" method="post" onSubmit="return check()">
  
   <h2 style="margin-left:150px; margin-bottom:30px">TAKE SERVICES</h2>
  <div class="form-group">
     <label class="col-sm-2">Email ID :</label>
     
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" placeholder="Enter Your Email Address" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>
   
   <div class="form-group">
    <label class="col-sm-2" >Password: </label>
    
    <div class="col-sm-10" >
      <input name="pass" type="password" class="form-control"  style="width:400px" id="d">
    </div>
   </div>

   <input type="submit" name="submit" value="Login" />
  
 </form>
</div> <!--................................................................................>>>>>>>>>> container-->


<?php

	if(isset($_POST["submit"])) {
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		
		$loginQuery = "SELECT EMAIL,PASSWORD,NAME FROM AUTHORITY";
		
		$resultLogin = oci_parse($c,$loginQuery);
		oci_execute($resultLogin);
		
		while($row = oci_fetch_assoc($resultLogin)) {
			if($email == $row["EMAIL"] && $pass == $row["PASSWORD"]) {
				
				$_SESSION["username"] = $row["NAME"];;
				header("location: authorityView.php");
				exit;	
			} //---------if($name == $row["CUST_NAME"] && $pass == $row["CUST_PASS"])-------
			
		} //--------while($row = oci_fetch_assoc($resultLogin))--------
		
	} //-------if(isset($_POST["submit"]))---------

?>

<script src="Service pro 2/js/jquery-2.2.1.min.js"></script>
<script src="Service pro 2/js/f2script.js"></script>
<script src="Service pro 2/js/bootstrap.min.js"></script>
</body>
</html>
