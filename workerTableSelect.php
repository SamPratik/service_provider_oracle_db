<!----------------Table Select------------->

<?php

if(isset($_POST["submit"])) {
	if(isset($_POST["electrician"])) {
		$name = $_POST["name"];
		$f_name = $_POST["f_name"];
		$add = $_POST["add"];
		$n_id = $_POST["n_id"];
		$e_id = $_POST["e_id"];
		$pass = $_POST["pass"];
		
		$insertElectrician = "INSERT INTO ELECTRICIAN (WORKER_ID,WORKER_NAME,W_FATHER_NAME,ADDRESS,EMAIL_ID,PASSWORD) ";
		$insertElectrician .= " VALUES ('{$n_id}','{$name}','{$f_name}','{$add}','{$e_id}','{$pass}')";	
	
		$resultElectricianInsert = oci_parse($c, $insertElectrician);
		oci_execute($resultElectricianInsert);
	}
	
	if(isset($_POST["painter"])) {
		$name = $_POST["name"];
		$f_name = $_POST["f_name"];
		$add = $_POST["add"];
		$n_id = $_POST["n_id"];
		$e_id = $_POST["e_id"];
		$pass = $_POST["pass"];
		
		$insertPainter = "INSERT INTO PAINTER (WORKER_ID,WORKER_NAME,W_FATHER_NAME,ADDRESS,EMAIL_ID,PASSWORD) ";
		$insertPainter .= " VALUES ('{$n_id}','{$name}','{$f_name}','{$add}','{$e_id}','{$pass}')";	
	
		$resultPainterInsert = oci_parse($c, $insertPainter);
		oci_execute($resultPainterInsert);
	}
	
	if(isset($_POST["ha"])) {
		$name = $_POST["name"];
		$f_name = $_POST["f_name"];
		$add = $_POST["add"];
		$n_id = $_POST["n_id"];
		$e_id = $_POST["e_id"];
		$pass = $_POST["pass"];
		
		$insertha = "INSERT INTO HOME_ASSISTANCE (WORKER_ID,WORKER_NAME,W_FATHER_NAME,ADDRESS,EMAIL_ID,PASSWORD) ";
		$insertha .= " VALUES ('{$n_id}','{$name}','{$f_name}','{$add}','{$e_id}','{$pass}')";	
	
		$resultHaInsert = oci_parse($c, $insertha);
		oci_execute($resultHaInsert);
	}
	
	if(isset($_POST["driver"])) {
		$name = $_POST["name"];
		$f_name = $_POST["f_name"];
		$add = $_POST["add"];
		$n_id = $_POST["n_id"];
		$e_id = $_POST["e_id"];
		$pass = $_POST["pass"];
		
		$insertDriver = "INSERT INTO DRIVER (WORKER_ID,WORKER_NAME,W_FATHER_NAME,ADDRESS,EMAIL_ID,PASSWORD) ";
		$insertDriver .= " VALUES ('{$n_id}','{$name}','{$f_name}','{$add}','{$e_id}','{$pass}')";	
	
		$resultDriverInsert = oci_parse($c, $insertDriver);
		oci_execute($resultDriverInsert);
	}
	
	if(isset($_POST["sg"])) {
		$name = $_POST["name"];
		$f_name = $_POST["f_name"];
		$add = $_POST["add"];
		$n_id = $_POST["n_id"];
		$e_id = $_POST["e_id"];
		$pass = $_POST["pass"];
		
		$insertSg = "INSERT INTO SECURITY_GUARD (WORKER_ID,WORKER_NAME,W_FATHER_NAME,ADDRESS,EMAIL_ID,PASSWORD) ";
		$insertSg .= " VALUES ('{$n_id}','{$name}','{$f_name}','{$add}','{$e_id}','{$pass}')";	
	
		$resultSgInsert = oci_parse($c, $insertSg);
		oci_execute($resultSgInsert);
	}
	
	if(isset($_POST["hd"])) {
		$name = $_POST["name"];
		$f_name = $_POST["f_name"];
		$add = $_POST["add"];
		$n_id = $_POST["n_id"];
		$e_id = $_POST["e_id"];
		$pass = $_POST["pass"];
		
		$insertHd = "INSERT INTO HOME_DECORATOR (WORKER_ID,WORKER_NAME,W_FATHER_NAME,ADDRESS,EMAIL_ID,PASSWORD) ";
		$insertHd .= " VALUES ('{$n_id}','{$name}','{$f_name}','{$add}','{$e_id}','{$pass}')";	
	
		$resultHdInsert = oci_parse($c, $insertHd);
		oci_execute($resultHdInsert);
	}
	
	if(isset($_POST["network"])) {
		$name = $_POST["name"];
		$f_name = $_POST["f_name"];
		$add = $_POST["add"];
		$n_id = $_POST["n_id"];
		$e_id = $_POST["e_id"];
		$pass = $_POST["pass"];
		
		$insertNetwork = "INSERT INTO NETWORK (WORKER_ID,WORKER_NAME,W_FATHER_NAME,ADDRESS,EMAIL_ID,PASSWORD) ";
		$insertNetwork .= " VALUES ('{$n_id}','{$name}','{$f_name}','{$add}','{$e_id}','{$pass}')";	
	
		$resultNetworkInsert = oci_parse($c, $insertNetwork);
		oci_execute($resultNetworkInsert);
	}
}

?>