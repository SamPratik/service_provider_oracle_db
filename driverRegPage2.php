<?php include_once("dbConnector.php"); ?>

<?php
			/*$insertPhone = "INSERT INTO PHONE (WORKER_NID,PHONE_NUMBER) VALUES ";
			$insertPhone .= "('{$nid}','{$phone}')";	
			
			$resultPhoneInsert = oci_parse($c,$insertPhone);
			oci_execute($resultPhoneInsert);*/
			
			if($_POST["submit1"]) {
				$nid = $_POST["nid"];
				$license = $_POST["license"];
			
			
				$insertDriver = "INSERT INTO DRIVER (WORKER_NID,LICENSE) VALUES ";
				$insertDriver .= "('{$nid}','{$license}')";	
			
				$resultDriverInsert = oci_parse($c,$insertDriver);
				oci_execute($resultDriverInsert);
			
			}
			
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<form action="driverRegPage3.php" method="post">
	<!-----------National ID---------->
	<div class="form-group">
     	<label  class="col-sm-2">National ID:</label>
        <div class="col-sm-10">
          <input type="text" name="nid" class="form-control"  placeholder="National ID" style="width:400px" id="b">
        </div>
  	</div>
    
   <div class="form-group" id="types" >
    <label class="col-sm-2" >Phone Number: </label>
    
    <div class="col-sm-10" >
      <input name="phone" type="text" class="form-control"  style="width:400px" id="d">
    </div>
   </div>
    
    <input type="submit" name="submit2" value="Submit" />

</form>


</body>
</html>