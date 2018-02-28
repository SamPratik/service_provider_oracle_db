<?php include_once("dbConnector.php"); ?>
<?php
	
		if(isset($_POST["submit"])) {
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
			
			$insertWorker = "INSERT INTO WORKER (WORKER_NID,NAME,DOB,EXPERIENCE,EMAIL_ID,PASSWORD) VALUES 
			('$nid','$name',TO_DATE('$dob','MM/DD/YYYY'),'$exp','{$e_id}','{$pass}')";	
			
			$resultWorkerInsert = oci_parse($c,$insertWorker);
			oci_execute($resultWorkerInsert);
			
		}
		
		/*
		CREATE TABLE WORKER (
		WORKER_NID VARCHAR2(50) NOT NULL,
		NAME VARCHAR2(50) NOT NULL,
		ADDRESS ADDR1 NOT NULL,
		DOB DATE,
		EXPERIENCE VARCHAR2(10),
		CONSTRAINT WORKER_AGE_ck CHECK(DOB<TO_DATE('01-01-1997','DD-MM-YYYY')),----add KORTESE NA TABLE ALTER KORE-----
		CONSTRAINT WORKER_WORKER_NID_pk PRIMARY KEY(WORKER_NID)
		);
		
		-----------DRIVER TABLE-------------------
		CREATE TABLE DRIVER (
		WORKER_NID VARCHAR2(50) NOT NULL,
		LICENSE VARCHAR2(30),
		CONSTRAINT DRIVER_WORKER_NID_pk PRIMARY KEY(WORKER_NID),
		CONSTRAINT DRIVER_WORKER_NID_fk FOREIGN KEY (WORKER_NID) REFERENCES WORKER ON DELETE CASCADE
		);
		
		--------PHONE------------------
		CREATE TABLE PHONE(
		WORKER_NID VARCHAR2(50) NOT NULL,
		PHONE_NUMBER NUMBER(30),
		CONSTRAINT WORKER_PHONE_pk PRIMARY KEY(WORKER_NID,PHONE_NUMBER),
		CONSTRAINT PHONE_WORKER_NID_fk FOREIGN KEY(WORKER_NID) REFERENCES WORKER ON DELETE CASCADE
		);

		
		*/
	
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<form action="driverRegPage2.php" method="post">

	<!-----------National ID---------->
	<div class="form-group">
     	<label  class="col-sm-2">National ID:</label>
        <div class="col-sm-10">
          <input type="text" name="nid" class="form-control"  placeholder="National ID" style="width:400px" id="b">
        </div>
  	</div>

	<!---------license------------->
	<div class="form-group" id="types" >
    	<label class="col-sm-2" >License Number: </label>
    
        <div class="col-sm-10" >
          <input name="license" type="text" class="form-control"  style="width:400px" id="d">
        </div>
   </div>
   
   <input type="submit" name="submit1" value="Next" />
   
</form>



</body>
</html>