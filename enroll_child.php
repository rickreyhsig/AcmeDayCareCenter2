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
          <li class="active"><a href="choose_operation.php?operation=enroll_child">Enroll</a></li>
          <li><a href="choose_operation.php?operation=assign_child">Assign</a></li>
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
    $custodian_name = $_GET['custodian_name'];
    $phone = $_GET['phone'];
    $address = $_GET['address'];
    $dob = $_GET['dob'];

    if ( strlen($child_fname) == 0 ){
      echo 'Please provide the first name for the child.';
      //echo "<script type='text/javascript'>alert('Please provide the first name for the child.');</script>";
      echo '<br/><a href="./choose_operation.php?operation=enroll_child">Back</a>';
      exit();
    } elseif ( strlen($child_lname) == 0 ){
      echo 'Please provide the last name for the child.';
      echo '<br/><a href="./choose_operation.php?operation=enroll_child">Back</a>';
      exit();
    } elseif ( strlen($custodian_name) == 0 ){
      echo 'Please provide the custodian name.';
      echo '<br/><a href="./choose_operation.php?operation=enroll_child">Back</a>';
      exit();
    } elseif ( strlen($phone) == 0 ){
      echo 'Please provide a phone number.';
      echo '<br/><a href="./choose_operation.php?operation=enroll_child">Back</a>';
      exit();
    } elseif ( strlen($address) == 0 ){
      echo 'Please provide an address.';
      echo '<br/><a href="./choose_operation.php?operation=enroll_child">Back</a>';
      exit();
    } elseif ( strlen($dob) == 0 ){
      echo 'Please provide the date of birth for the child.';
      echo '<br/><a href="./choose_operation.php?operation=enroll_child">Back</a>';
      exit();
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
