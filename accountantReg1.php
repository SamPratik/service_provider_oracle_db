<?php include_once("dbConnector.php"); ?>

<?php
	if(isset($_POST["submit"])) {
		$name = $_POST["name"];
		$e_nid = $_POST["e_nid"];
		$e_add = $_POST["e_add"];
		$e_salary = $_POST["e_salary"];
		
		$insertEmployee = "INSERT INTO EMPLOYEE2 (EMP_NID,EMP_NAME,EMP_ADDRESS,EMP_SALARY)";
		$insertEmployee .= " VALUES ({$e_nid},'{$name}','{$e_add}','{$e_salary}')";
		
		$resultEmployeeInsert = oci_parse($c, $insertEmployee);
		oci_execute($resultEmployeeInsert);

	
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

<form action="accountantReg2.php" method="post">
  
   <h2 style="margin-left:150px; margin-bottom:30px">WORKER REGISTRATION</h2>
   
  <div class="form-group">
     <label class="col-sm-2">Employee NID :</label>
     
    <div class="col-sm-10">
      <input type="text" name="e_nid" class="form-control" placeholder="Your NID" style="width:400px" id="a" >
      <p id="345" style="display:none; color:#F81216">HINTS: You must put your National ID Name.</p>
    </div>
    
  </div></div><br/><br/>  

  <div class="form-group">
     <label class="col-sm-2" style="margin-left:365px;">Accountant Type :</label>
     
    <div class="col-sm-10">
      <input type="text" name="a_type" class="form-control" placeholder="Manager Responsibility" style="width:400px;margin-left: 554px;margin-top: -34px;" id="a" >
      <p id="345" style="display:none; color:#F81216;">HINTS: You must put your National ID Name.</p>
    </div>
    
   <input type="submit" name="submit1" value="submit" />
  
 </form>
</div> <!--................................................................................>>>>>>>>>> container-->

<?php //include_once("workerTableSelect.php"); ?>

	
</body>
</html>
