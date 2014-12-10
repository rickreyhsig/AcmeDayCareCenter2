<html>
<?php

$operation = $_GET['operation'];

if($operation=='enroll_child'){
  echo "Please enter information of the child that will be enrolled:";
  echo "<form method=get action=enroll_child.php>
  <input input=text name=fname value='First Name'><br>
  <input input=text name=lname  value='Last Name'><br>
  <input input=text name=phone value='Phone'><br>
  <input input=text name=address value='Address'><br>
  <input input=text name=email value='Email'><br>
  <input input=text name=dob value='DOB (YYYY/MM/DD):'><br>
  <input type=submit>";
}elseif($operation=='assign_child'){
  echo "Please enter information of the child that will be assigned:";
  echo "<form method=get action=assign_child.php>
  <input input=text name=fname value='First Name'><br>
  <input input=text name=lname  value='Last Name'><br>
  <input input=text name=phone value='Phone'><br>
  <input input=text name=address value='Address'><br>
  <input input=text name=email value='Email'><br>
  <input input=text name=dob value='DOB (YYYY/MM/DD):'><br>
  <input type=submit>";
}elseif($operation=='list_children'){
  echo "Please enter information of the class you want to list the children for:";
  echo "<form method=get action=list_children.php>
  <input input=text name=book_name value='Book Name'><br>
  <input input=text name=book_category value='Book Category'><br>
  <input type=submit>";
}

?>
</html>
