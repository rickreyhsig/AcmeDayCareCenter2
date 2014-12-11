<html>
<?php

$con =  mysql_connect("localhost", "root", "");
if ($con){/*echo "Successfully connected to the database."."<br/>";*/}
if (!$con)
{ die("Could not connect:" . mysql_error()); }
$sel = mysql_select_db("CMAP282FinalProject", $con);
if (!$sel) { die('could not select:'.mysql_error());}

$class_id = $_GET['class_id'];

//Class id should be between 3-6
if ($class_id != 3 && $class_id != 4 && $class_id != 5 && $class_id != 6){
  echo "Class id should be 3, 4, 5 or 6!";
  echo '<br/><a href="./choose_operation.php?operation=list_children">Back</a>';
  exit();
}

//If user leaves class_id field blank
if ( strlen($class_id) == 0 ){
  echo 'Please provide the age of the child or the class id.';
  echo '<br/><a href="./choose_operation.php?operation=list_children">Back</a>';
}


//Grab a list of child_id's
  $sel_stmt = "SELECT ENROLL.child_id FROM ENROLL WHERE ENROLL.class_id ='$class_id'";

  //echo $sel_stmt.'<br/>';

  echo "List of children in the class for "; echo $class_id; echo " year olds.<br/>";
  echo "<hr>";
  echo '
  <table style="width:100%">
  <tr>
  <th>Child\'s first name</th>
  <th>Child\'s last name</th>
  <th>Custodian name</th>
  <th>Phone</th>
  <th>Address</th>
  <th>Date of birth</th>
  </tr>';

  $sel = mysql_query($sel_stmt);
  while ($row = mysql_fetch_assoc($sel)) {
    //echo $row['child_id']."<br/>";
      //echo "SELECT * FROM CHILD WHERE CHILD.child_id = ".$row['child_id'];
      $sel_stmt2 = "SELECT * FROM CHILD WHERE CHILD.child_id = ".$row['child_id'];
      $sel2 = mysql_query($sel_stmt2);
      while ($row2 = mysql_fetch_assoc($sel2)) {
        echo "<tr>";
        echo "<td>".$row2['child_fname']."</td>";
        echo "<td>".$row2['child_lname']."</td>";
        echo "<td>".$row2['custodian_name']."</td>";
        echo "<td>".$row2['phone']."</td>";
        echo "<td>".$row2['address']."</td>";
        echo "<td>".$row2['dob']."</td>";
        //echo $row2['child_fname']."\t".$row2['child_lname']."\t".$row2['custodian_name']."\t".$row2['phone']."\t".$row2['address']."\t".$row2['dob']."<br/>";
        echo "</tr>";
        //print_r($row2);
      }
    $child_id = $row['child_id'];
  }

  echo "</table>";
  echo '<br/><a href="./index.html">Home</a>';
?>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
</style>

</html>
