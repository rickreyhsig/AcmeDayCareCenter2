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

      //echo $sel_stmt;

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
