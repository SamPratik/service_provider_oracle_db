<?php
$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=xe)))"; 
 $conn=oci_connect('jannatul', 'Piu77147685',$db);
 if(!$conn)
 {
 $e=oci_error();
 trigger_error(htmlentities($e['message'],ENT_QUOTES), E_USER_ERROR);
 }

 ?> 
 <?php
 $CUSTOMER_VOTER_ID=$_POST['CUSTOMER_VOTER_ID'];
 $CUSTOMER_NAME=$_POST['CUSTOMER_NAME'];
  $CUST_PHONE_NUMBER=$_POST['CUST_PHONE_NUMBER'];
 $CUST_ADRESS=$_POST['CUST_ADRESS'];

 
 $query1 = "INSERT INTO UtilityUser(CUSTOMER_VOTER_ID ,CUSTOMER_NAME,CUST_PHONE_NUMBER,CUST_ADRESS) VALUES
 ('$CUSTOMER_VOTER_ID','$CUSTOMER_NAME','$CUST_PHONE_NUMBER','$CUST_ADRESS') ";

   $insert = oci_parse($conn,$query1);
   
    oci_execute($insert);
	
$array = oci_parse($conn, "SELECT *FROM CUSTOMER");
oci_execute($array);

print "<table border = '1'>\n";

while ($row = oci_fetch_array($array, OCI_ASSOC + OCI_RETURN_NULLS)) {
    print "<tr>\n";
    foreach ($row as $item) {
        print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    print "</tr>\n";
}
print "</table>\n";
 ?>
 