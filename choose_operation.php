<?php

/********AUTHENTICATION*********/
$con =  mysql_connect("localhost", "root", "");
if ($con){/*echo "Successfully connected to the database."."<br/>";*/}
if (!$con)
{ die("Could not connect:" . mysql_error()); }
$sel = mysql_select_db("CMAP282FinalProject", $con);
if (!$sel) { die('could not select:'.mysql_error());}

//echo $_SERVER['PHP_AUTH_USER'];
//echo $_SERVER['PHP_AUTH_PW'];
$user = $_SERVER['PHP_AUTH_USER'];
$auth = false;

$sel_stmt = "
SELECT administrators.emailAddress, administrators.password
FROM administrators
WHERE administrators.emailAddress = '$user'";

$sel = mysql_query($sel_stmt) or die($sel_stmt."<br/><br/>".mysql_error());

while ($row = mysql_fetch_assoc($sel)) {
  //print_r($row);
  if ($_SERVER['PHP_AUTH_USER'] == $row['emailAddress'] && $_SERVER['PHP_AUTH_PW'] == $row['password']){
    //echo "Success";
    $auth = true;
  }else{
    //echo "Fail";
  }
}

if (!isset($_SERVER['PHP_AUTH_USER'])) {
  header("WWW-Authenticate: Basic realm=\"Private Area\"");
  header("HTTP/1.0 401 Unauthorized");
  print "Sorry - you need valid credentials to be granted access!\n";
  exit;
} else {
    if ($auth) {
    //print "Welcome to the private area!";
  } else {
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 401 Unauthorized");
    print "Sorry - you need valid credentials to be granted access!\n";
    exit;
  }
}
/********AUTHENTICATION*********/
?>

<html>
<?php
$operation = $_GET['operation'];

if($operation=='enroll_child'){
  echo "Please enter information of the child that will be enrolled:";
  echo '<form method=get action=enroll_child.php>
  Child\'s First Name<input input=text size="30" name=child_fname value="" style="margin-left:76px"><br>
  Child\'s Last Name<input input=text size="30" name=child_lname value=""  style="margin-left:79px"><br>
  Custodian Name<input input=text size="30" name=custodian_name  value=""  style="margin-left:90px"><br>
  Phone<input input=text size="30" name=phone value=""  style="margin-left:157px"><br>
  Address<input input=text size="30" name=address value="" style="margin-left:145px"><br>
  Child DOB (YYYY/MM/DD)<input input=text size="30" name=dob value="" style="margin-left:3px"><br>
  <input type=submit>';
  echo '<br/><a href="./index.html">Home</a>';
}elseif($operation=='assign_child'){
  echo "Please enter information of the child that will be assigned:";
  echo '<form method=get action=assign_child.php>
  Child\'s First Name<input input=text name=child_fname value="" style="margin-left:9px"><br>
  Child\'s Last Name<input input=text name=child_lname value="" style="margin-left:11px"><br>
  Child Age/Class ID<input input=text name=class_id value="" style="margin-left:3px"><br>
  Child ID<input input=text name=child_id value="" style="margin-left:73px"><br>
  <input type=submit>';
  echo '<br/><a href="./index.html">Home</a>';
}elseif($operation=='list_children'){
  echo "Please enter information of the class you want to list the children for:";
  echo '<form method=get action=list_children.php>
  Class ID/Age Group<input input=text name=class_id value="" style="margin-left:3px"><br>
  <input type=submit>';
  echo '<br/><a href="./index.html">Home</a>';
}

?>
</html>
