<?php
function randompass() {
    $ranString = '_%&*$#abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = array();
    $ranStringlenght = strlen($ranString) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $ranStringlenght);
        $password[] = $ranString[$n];
    }
    return implode($password);
}

function criptpass() {
  $password = randompass();
  $criptmethod = 'AES-128-CTR';
  $criptkey = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
  $criptiv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($criptmethod));
  $criptans = openssl_encrypt($password, $criptmethod, $criptkey, 0, $criptiv) . "::" . bin2hex($criptiv);

  return $criptans;
}

function createUser($fname, $username, $email, $criptans, $lvlist) {
  include('connect.php');

  $uperstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$criptans}', '{$email}', NULL, 'no', '0', '{$lvlist}')";
  // echo $uperstring;
  $userquery = mysqli_query($link, $uperstring);
  if($userquery) {
    redirect_to('admin_index.php');
  }else{
    $message = "Something went wrong";
    return $message;
  }

  mysqli_close($link);
}

function edituser($id, $fname, $username, $password, $email) {
  include('connect.php');

  $updatestring = "UPDATE tbl_user SET user_fname = '{$fname}' AND user_pass = '{$password}' AND user_name = '{$username}' AND user_email = '{$email}' WHERE user_id={$id}";
  // echo $updatestring;
  $updatequery = mysqli_query($link, $updatestring);

  if($updatequery) {
    redirect_to("admin_index.php");
  } else {
    $message = "guess you got canned";
    return $message;
  }

  mysqli_close($link);
}

function deleteuser($id) {
  include('connect.php');
  $delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
  $delquery = mysqli_query($link, $delstring);
  if ($delquery) {
    redirect_to("../admin_index.php");

  }else{
    $message = "bye";
    return $message;
  }

  mysqli_close($link);
}
?>
