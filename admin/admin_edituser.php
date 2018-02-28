<?php
  require_once('phpscripts/config.php');
  // confirm_logged_in();

$id = $_SESSION['user_id'];
$tbl = "tbl_user";
$col = "user_id";
$popform = getSingle($tbl, $col, $id);
$info = mysqli_fetch_array($popform);
// echo $info;

  if(isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $result = edituser($id, $fname, $username, $password, $email);
      $message = $result;
    }
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>edit user</title>
</head>
<body>
  <h2>edit user</h2>
  <?php if (!empty($message)){echo $message; } ?>
  <form action="admin_edituser.php" method="post"> <!-- change the action to current one -->
    <label>First name: </label>
    <input type="text" name="fname" value="<?php echo $info['user_fname']; ?>">
    <label>Username: </label>
    <input type="text" name="username" value="<?php echo $info['user_name']; ?>">
    <label>Password</label>
    <input type="text" name="password" value="<?php echo $info['user_pass']; ?>">
    <label>Email: </label>
    <input type="text" name="email" value="<?php echo $info['user_email']; ?>">
    <input type="submit" name="submit" value="edit accoubr">

  </form>
</body>
</html>
