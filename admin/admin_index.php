<?php
require_once('phpscripts/connect.php');
  require_once('phpscripts/config.php');
  // confirm_logged_in();
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<title>Welcome</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 welcome">
        <h1><?php date_default_timezone_set("Canada/Saskatchewan");
                  $dateT = date('G');
                  if($dateT >= 1 && $dateT <= 11){
                    $timeMsg = "Good Mythical Morning!";
                  }else if($dateT >= 12 && $dateT <= 18 ){
                    $timeMsg = "Magical Afternoon, right?";
                  }else if($dateT >= 19 || $dateT <= 24){
                    $timeMsg = "Good Evening...";
                  }
                  echo "$timeMsg It's " . date("h:i");
                  ?>
        </h1>
        <h2>What's up <?php echo $_SESSION['user_name']; ?>?</h2>
        <img src="images/hi.png" alt="Hello">
        <p>Last time active <?php echo $_SESSION['user_date'];  ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <a href="admin_create_user.php">Create User</a>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <a href="admin_edituser.php">Edit User</a>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <a href="admin_deleteuser.php">delete User</a>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
      </div>
    </div>
  </div>
</body>
</html>
