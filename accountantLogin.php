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

<form action="accountantLogin.php" method="post">
  
   <h2 style="margin-left:150px; margin-bottom:30px">Accountant Login</h2>
  <div class="form-group">
     <label class="col-sm-2">Email ID :</label>
     
    <div class="col-sm-10">
      <input type="text" name="e_id" class="form-control" placeholder="Email ID" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div>
  
	<div class="form-group">
     	<label  class="col-sm-2">Password:</label>
        <div class="col-sm-10">
          <input type="password" name="pass" class="form-control"  placeholder="Password" style="width:400px" id="b">
        </div>
  	</div>
  
  

   <input type="submit" name="submit" value="Login" />
  
 </form>
</div> <!--................................................................................>>>>>>>>>> container-->

<?php //include_once("workerTableSelect.php"); ?>

<?php

	if(isset($_POST["submit"])) {
		
		$e_id = $_POST["e_id"];
		$pass = $_POST["pass"];
		
		$selectAccountant = "SELECT EMAIL_ID,PASSWORD FROM EMPLOYEE2 NATURAL JOIN ACCOUNTANT2 WHERE EMP_NID = 201414011";
		$resultAccountant = oci_parse($c,$selectAccountant);
		oci_execute($resultAccountant);
		
		while($row = oci_fetch_assoc($resultAccountant)) {
			if($e_id == $row["EMAIL_ID"] && $pass == $row["PASSWORD"]) {
				$_SESSION["flag"] = "accountant";
				$_SESSION["acc_e_id"] = $e_id;
				header("location: accountantLoggedin.php");
			}
		}
		
	}

?>

	
</body>
</html>
