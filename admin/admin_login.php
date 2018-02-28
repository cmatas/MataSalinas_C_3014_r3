<?php
  require_once('phpscripts/config.php');
  $ip = $_SERVER['REMOTE_ADDR'];// if asked, you can make sure that the only place where you can access the info is IN THE OFFICE
  // echo $ip;
  if(isset($_POST['submit'])){
    // echo "works";
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if($username !== "" && $password !== ""){ // == not identical to
      $result = logIn($username, $password, $ip);
      $message = $result;
    }else{
      $message = "Please fill out the required (ALL) fields";
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<title>welcome to the admin panel login</title>
</head>
<body>
  <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 formDiv">
      <h2>Please Sign In</h2>
      <?php if(!empty($message)){ echo $message; } ?>
      <form action="admin_login.php" method="post">
        <label for="">User:</label><br>
        <input type="text" name="username" value=""><br><br>
        <label for="">Password:</label><br>
        <input type="password" name="password" value=""><br><br>
      <input type="submit" name="submit" id="submit" value="Sign In">
    </form>
    </div>
  </div>
</body>
</html>
