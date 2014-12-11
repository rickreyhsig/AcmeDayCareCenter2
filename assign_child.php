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
$class_id = $_GET['class_id'];
$child_id = $_GET['child_id'];

if ($class_id != 3 && $class_id != 4 && $class_id != 5 && $class_id != 6){
  echo "The only available class ages are 3, 4, 5 or 6!";
  echo '<br/><a href="./choose_operation.php?operation=assign_child">Back</a>';
  exit();
} elseif ( strlen($child_fname) == 0 && strlen($child_lname) == 0 && strlen($child_id) == 0 ){
  echo 'Please provide either first and last name OR the id of the child so we can locate him/her.';
  echo '<br/><a href="./choose_operation.php?operation=assign_child">Back</a>';
  exit();
} elseif ( strlen($class_id) == 0 ){
  echo 'Please provide the age of the child or the class id.';
  echo '<br/><a href="./choose_operation.php?operation=assign_child">Back</a>';
  exit();
}

//Need to have $child_id
if (strlen($child_id) == 0){
  $sel_stmt = "
  SELECT CHILD.child_id
  FROM CHILD
  WHERE CHILD.child_fname ='$child_fname'
  AND CHILD.child_lname ='$child_lname'";

  echo $sel_stmt;

  $sel = mysql_query($sel_stmt);
  while ($row = mysql_fetch_assoc($sel)) {
    //print_r($row);
    //echo $row['child_id']."<br/>";
    $child_id = $row['child_id'];
  }
}

//If no first or last name given, obtain them!
if (strlen($child_fname) == 0  || strlen($child_lname) == 0){
  $sel_stmt = "
  SELECT CHILD.child_fname, CHILD.child_lname
  FROM CHILD
  WHERE CHILD.child_id = '$child_id'";

  //echo $sel_stmt;

  $sel = mysql_query($sel_stmt);
  while ($row = mysql_fetch_assoc($sel)) {
    //print_r($row);
    //echo $row['child_fname']."<br/>".$row['child_lname']."<br/>";
    $child_fname = $row['child_fname'];
    $child_lname = $row['child_lname'];
  }
}

//Don't let users assign a child to a class if they are already assigned to a class
$sel_stmt = "
SELECT COUNT(ENROLL.child_id)
FROM ENROLL
WHERE ENROLL.child_id = '$child_id'";

//echo $sel_stmt;

$sel = mysql_query($sel_stmt);
while ($row = mysql_fetch_assoc($sel)) {
  if ($row['COUNT(ENROLL.child_id)'] >= 1){
    echo "This child cannot be enrolled in two or more classes!";
    echo '<br/><a href="./choose_operation.php?operation=assign_child">Back</a>';
    exit();
  }
  //print_r($row);
}

echo '
<form action="assign_chld.php" method="post">
Are you sure you want to make the following enrollment? <br/> <br/>'
."First Name: ".$child_fname.'<br/>'
."Last Name: ".$child_lname.'<br/>'
."Class ID: ".$class_id.'<br/>'
."Child ID: ".$child_id.'<br/> <br/>'

.'<input type="hidden" name="child_fname" value="' ."$child_fname" .'">'
.'<input type="hidden" name="child_lname" value="' ."$child_lname" .'">'
.'<input type="hidden" name="class_id" value="' ."$class_id" .'">'
.'<input type="hidden" name="child_id" value="' ."$child_id" .'">'
.'<input type=submit name=confirm value="Yes">
<input type=submit name=confirm value="No">
</form> ';
?>

</html>
