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
          <li><a href="choose_operation.php?operation=assign_child">Assign</a></li>
          <li class="active"><a href="choose_operation.php?operation=list_children">List</a></li>
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
    echo "<br/>";
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

    <div class="footer">
      <div class="container">
        <p class="text-muted"><a href="./index.html">Home</a></p>
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
