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

if ( strlen($child_fname) == 0 ){
  echo 'Please provide the first name for the child.';
  //echo "<script type='text/javascript'>alert('Please provide the first name for the child.');</script>";
  echo '<br/><a href="./choose_operation.php?operation=enroll_child">Go back!</a>';
} elseif ( strlen($child_lname) == 0 ){
echo 'Please provide the last name for the child.';
echo '<br/><a href="./choose_operation.php?operation=enroll_child">Go back!</a>';
} elseif ( strlen($custodian_name) == 0 ){
echo 'Please provide the custodian name.';
echo '<br/><a href="./choose_operation.php?operation=enroll_child">Go back!</a>';
} elseif ( strlen($phone) == 0 ){
echo 'Please provide a phone number.';
echo '<br/><a href="./choose_operation.php?operation=enroll_child">Go back!</a>';
} elseif ( strlen($address) == 0 ){
echo 'Please provide an address.';
echo '<br/><a href="./choose_operation.php?operation=enroll_child">Go back!</a>';
} elseif ( strlen($dob) == 0 ){
echo 'Please provide the date of birth for the child.';
echo '<br/><a href="./choose_operation.php?operation=enroll_child">Go back!</a>';
}

echo '
<form action="enroll_chld.php" method="post">
Are you sure you want to insert this child to the roster? <br/>'
.$child_fname.'<br/>'
.$child_lname.'<br/>'
.$custodian_name.'<br/>'
.$phone.'<br/>'
.$address.'<br/>'
.$dob.'<br/>'

.'<input type="hidden" name="child_fname" value="' ."$child_fname" .'">'
.'<input type="hidden" name="child_lname" value="' ."$child_lname" .'">'
.'<input type="hidden" name="custodian_name" value="' ."$custodian_name" .'">'
.'<input type="hidden" name="phone" value="' ."$phone" .'">'
.'<input type="hidden" name="address" value="' ."$address" .'">'
.'<input type="hidden" name="dob" value="' ."$dob" .'">'
.'<input type=submit name=confirm value="Yes">
<input type=submit name=confirm value="No">
</form> ';


/*
$ins_stmt = "INSERT INTO CHILD (child_fname, child_lname, custodian_name, phone, address, dob)
VALUES('$child_fname', '$child_lname', '$custodian_name', '$phone', '$address', '$dob')";

$ins = mysql_query($ins_stmt);

if ($ins){echo 'Successfully inserted '.$child_fname .' in the school roster.';}
else{echo 'Error inserting'.mysql_error();}*/

?>

</html>
