<html>
<?php

$con =  mysql_connect("localhost", "root", "");
if ($con){/*echo "Successfully connected to the database."."<br/>";*/}
if (!$con)
{ die("Could not connect:" . mysql_error()); }
$sel = mysql_select_db("CMAP282FinalProject", $con);
if (!$sel) { die('could not select:'.mysql_error());}

$child_fname = $_POST['child_fname'];
$child_lname = $_POST['child_lname'];
$custodian_name = $_POST['custodian_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$dob = $_POST['dob'];


$ins_stmt = "INSERT INTO CHILD (child_fname, child_lname, custodian_name, phone, address, dob)
VALUES('$child_fname', '$child_lname', '$custodian_name', '$phone', '$address', '$dob')";

$ins = mysql_query($ins_stmt);

if ($ins){echo 'Successfully inserted '.$child_fname .' in the school roster.';}
else{echo 'Error inserting'.mysql_error();}
echo '<br/><a href="./index.html">Home</a>';

?>
</html>
