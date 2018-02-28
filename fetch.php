<?php
include_once("dbConnector.php");

$query = "SELECT * FROM CUSTOMER";
$array = oci_parse($c, $query);
oci_execute($array);

echo "<table border = '1'>\n";

while ($row = oci_fetch_assoc($array)) {
    echo $row["CUST_ID"]." - ".$row["CUST_NAME"]."<br/>";
}
echo "</table>\n";

?>
