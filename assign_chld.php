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
          <li><a href="index.html">Home</a></li>
          <li><a href="choose_operation.php?operation=enroll_child">Enroll</a></li>
          <li class="active"><a href="choose_operation.php?operation=assign_child">Assign</a></li>
          <li><a href="choose_operation.php?operation=list_children">List</a></li>
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
    
    <div class="footer">
      <div class="container">
        <p class="text-muted">This website helps you to enroll a child and assign them to a class based on age.  You can also View a list of children in each class.</p>
      </div>
    </div>

  </div> <!-- /container -->

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/docs.min.js"></script>
</body>
</html>
