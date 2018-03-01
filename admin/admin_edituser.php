<?php
  require_once('phpscripts/config.php');
  require_once('phpscripts/connect.php');
  // confirm_logged_in();

$id = $_SESSION['user_id'];
$tbl = "tbl_user";
$col = "user_id";
$popform = getSingle($tbl, $col, $id);
$info = mysqli_fetch_array($popform);
$infopass = $info['user_pass'];

// echo $info;

function decriptU() {
  $id = $_SESSION['user_id'];
  $tbl = "tbl_user";
  $col = "user_id";
  $popform = getSingle($tbl, $col, $id);
  $info = mysqli_fetch_array($popform);
  $infopass = $info['user_pass'];

if(preg_match("/^(.*)::(.*)$/", $infopass, $regs)) {
    // decrypt encrypted string
    list(, $infopass, $criptiv) = $regs;
    $criptmethod = 'AES-128-CTR';
    $criptkey = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
    $decrans = openssl_decrypt($infopass, $criptmethod, $criptkey, 0, hex2bin($criptiv));

    return $decrans;
  }
}

$passdcrypt = decriptU();

  if(isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    // $recript = criptpassU();
    $result = edituser($id, $fname, $username, $password, $email);
      $message = $result;
    }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <link rel="stylesheet" href="css/style.css">
 <title>Edit User</title>
 </head>
 <body>
  <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 formDiv">
  <h2>Edit User</h2>
  <?php if (!empty($message)){echo $message; } ?>
  <form action="admin_edituser.php" method="post"> <!-- change the action to current one -->
    <label>First name: </label>
    <input type="text" name="fname" value="<?php echo $info['user_fname']; ?>">
    <label>Username: </label>
    <input type="text" name="username" value="<?php echo $info['user_name']; ?>">
    <label>Password</label>
    <input type="text" name="password" value="<?php echo $passdcrypt; ?>">
    <label>Email: </label>
    <input type="text" name="email" value="<?php echo $info['user_email']; ?>">
    <input id="submit" type="submit" name="submit" value="Finish">

  </form>
</div>
</div>
</body>
</html>
