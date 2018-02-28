<?php
require_once('phpscripts/config.php');
  // confirm_logged_in();
  if(isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = criptpass();
    $email = trim($_POST['email']);
    $lvlist = trim($_POST['lvlist']);
    if(empty($lvlist)) {
      $message = "Please select user level";

    }else{
      $result = createUser($fname, $username, $email, $password, $lvlist);
      $sendMail = submitMessage($fname, $username, $email, $password);
      $message= $result;
    }
  }
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<title>Create User</title>
</head>
<body>
  <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 formDiv">
      <h2>Create User</h2>
  <?php if (!empty($message)){echo $message; } ?>
  <form action="admin_create_user.php" method="post">
    <label>First name: </label>
    <input type="text" name="fname" value="">
    <label>Username: </label>
    <input type="text" name="username" value="">
    <!-- <label class="hidden">Password</label>
    <input class="hidden" type="text" name="password" value="<?php  ?>"> -->
    <label>Email: </label>
    <input type="text" name="email" value="">
    <select  name="lvlist">
      <option value="">Select user level</option>
      <option value="2">Web Admin</option>
      <option value="1">Web Master</option>
    </select>

    <input id="submit" type="submit" name="submit" value="Create">

  </form>
</body>
</html>
