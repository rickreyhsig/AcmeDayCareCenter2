<html>
<?php

$con =  mysql_connect("localhost", "root", "");
if ($con){/*echo "Successfully connected to the database."."<br/>";*/}
if (!$con)
{ die("Could not connect:" . mysql_error()); }
$sel = mysql_select_db("CMAP282FinalProject", $con);
if (!$sel) { die('could not select:'.mysql_error());}

$child_fname = $_GET['child_fname'];
$child_lname = $_GET['child_lname'];
$custodian_name = $_GET['custodian_name'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$dob = $_GET['dob'];

$ins_stmt = "INSERT INTO CHILD (child_fname, child_lname, custodian_name, phone, address, dob)
VALUES('$child_fname', '$child_lname', '$custodian_name', '$phone', '$address', '$dob')";

$ins = mysql_query($ins_stmt);

if ($ins){echo 'Successfully inserted '.$child_fname .' in the school roster.';}
else{echo 'Error inserting'.mysql_error();}

?>

</html>
