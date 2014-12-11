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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/r8favicon.jpg">

  <title>Lot Buddy</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap theme -->
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/theme.css" rel="stylesheet">

  <!-- My styles for this page-->
  <link href="css/main.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="js/ie-emulation-modes-warning.js"></script>

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="js/ie10-viewport-bug-workaround.js"></script>

</head>

<body role="document">


  <!-- Fixed navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li id="l1"><a href="index.html">Home</a></li>
          <li id="l2"><a href="choose_operation.php?operation=enroll_child">Enroll</a></li>
          <li id="l3"><a href="choose_operation.php?operation=assign_child">Assign</a></li>
          <li id="l4"><a href="choose_operation.php?operation=list_children">List</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</div>

<div class="container theme-showcase" role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">

    <?php
    $operation = $_GET['operation'];

    if($operation=='enroll_child'){
      echo "<script>document.getElementById('l2').className = 'active';</script>";
      echo "Please enter information of the child that will be enrolled:";
      echo '<form method=get action=enroll_child.php>
      Child\'s First Name<input input=text size="30" name=child_fname value="" style="margin-left:54px"><br>
      Child\'s Last Name<input input=text size="30" name=child_lname value=""  style="margin-left:55px"><br>
      Custodian Name<input input=text size="30" name=custodian_name  value=""  style="margin-left:65px"><br>
      Phone<input input=text size="30" name=phone value=""  style="margin-left:130px"><br>
      Address<input input=text size="30" name=address value="" style="margin-left:119px"><br>
      Child DOB (YYYY/MM/DD)<input input=text size="30" name=dob value="" style="margin-left:3px"><br>
      <input type=submit>';
    }elseif($operation=='assign_child'){
      echo "<script>document.getElementById('l3').className = 'active';</script>";
      echo "Please enter information of the child that will be assigned:";
      echo '<form method=get action=assign_child.php>
      Child\'s First Name<input input=text name=child_fname value="" style="margin-left:8px"><br>
      Child\'s Last Name<input input=text name=child_lname value="" style="margin-left:8px"><br>
      Child Age/Class ID<input input=text name=class_id value="" style="margin-left:5px"><br>
      Child ID<input input=text name=child_id value="" style="margin-left:73px"><br>
      <input type=submit>';
    }elseif($operation=='list_children'){
      echo "<script>document.getElementById('l4').className = 'active';</script>";
      echo "Please enter information of the class you want to list the children for:";
      echo '<form method=get action=list_children.php>
      Class ID/Age Group:<input input=text name=class_id value="" style="margin-left:3px"><br>
      <input type=submit>';
    }

    ?>

<div class="footer">
  <div class="container">
    <p class="text-muted"><a href="./index.html">Home</a></p>
  </div>
</div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/docs.min.js"></script>
</body>
</html>
