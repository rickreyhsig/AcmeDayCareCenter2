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
$class_id = $_POST['class_id'];
$child_id = $_POST['child_id'];

$ins_stmt = "INSERT INTO ENROLL (class_id, child_id, enroll_date)
VALUES('$class_id', '$child_id', NOW())";

$ins = mysql_query($ins_stmt);

if ($ins){echo 'Successfully enrolled '.$child_fname .' '.$child_lname .' for class age ' .$class_id .'.';}
else{echo 'Error inserting'.mysql_error();}
echo '<br/><a href="./index.html">Home</a>';

?>
</html>
