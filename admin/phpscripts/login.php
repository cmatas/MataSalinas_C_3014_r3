<?php
  function logIn($username, $password, $ip) {
    require_once('connect.php');
    $username = mysqli_real_escape_string($link, $username); //sqli_real_escape_string stops sql inyections
    $password = mysqli_real_escape_string($link, $password);
    $loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}'";// AND user_pass='{$password}'";
    // echo $loginstring;
    $user_set = mysqli_query($link, $loginstring);
    $usergel = "SELECT * FROM tbl_user WHERE user_name='{$username}'";
    $userel = mysqli_query($link, $usergel);
    // echo mysqli_num_rows();
    if(mysqli_num_rows($user_set)){
      $line = mysqli_fetch_array($user_set);
      $pass = $line['user_pass'];

      $founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
      $id = $founduser['user_id'];
      // echo $id;
      $_SESSION['user_id'] = $id;
      $_SESSION['user_name'] = $founduser['user_fname'];
      $_SESSION['user_date'] = $founduser['user_date'];
      $_SESSION['user_attempts'] = $founduser['user_attempts'];
      //

      if(preg_match("/^(.*)::(.*)$/", $pass, $regs)) {
          // decrypt encrypted string
          list(, $pass, $criptiv) = $regs;
          $criptmethod = 'AES-128-CTR';
          $criptkey = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
          $decrans = openssl_decrypt($pass, $criptmethod, $criptkey, 0, hex2bin($criptiv));
          // unset($pass, $criptmethod, $criptkey, $criptiv, $regs);

          // return $decrans;
          // echo $decrans;
          if ($decrans == $password) {
            $loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}'";// AND user_pass='{$password}'";
            $user_set = mysqli_query($link, $loginstring);

            $founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
            $id = $founduser['user_id'];
            // echo $id;
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $founduser['user_fname'];
            $_SESSION['user_date'] = $founduser['user_date'];
            $_SESSION['user_attempts'] = $founduser['user_attempts'];
            $_SESSION['user_log'] = $founduser['user_log'];
            $_SESSION['user_newt'] = $founduser['user_newt'];

      if(mysqli_query($link, $loginstring)){

        $userlog = $founduser['user_log'];
        $userat = $founduser['user_attempts'];
        $usernew = $founduser['user_newt'];
        if ($userat < 3) {
          $_SESSION['user_name'] = $founduser['user_fname'];
          $_SESSION['user_log'] = $founduser['user_log'];
          $_SESSION['user_log'] += 1;
          $log = $_SESSION['user_log'];

          $logQ = "UPDATE tbl_user SET user_log = '{$log}' WHERE user_name = '{$username}'";
          $logans = mysqli_query($link, $logQ);

          $update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
          $updatequery = mysqli_query($link, $update);

          $time = "UPDATE tbl_user SET user_date = CURRENT_TIMESTAMP WHERE user_id = {$id}";
          $timeupdate = mysqli_query($link, $time);

          $attemptsquery =  "UPDATE tbl_user SET user_attempts = '0' WHERE user_name = '{$username}'";
          $attempts =  mysqli_query($link, $attemptsquery);
          $_SESSION['user_attempts'] =0;
          // redirect_to("admin_index.php");
          if ($userlog < 1 && time() - $usernew > 300 ) {
            redirect_to("admin_edituser.php");
            // echo ($usernew + 2);
          }elseif ($userlog < 1 && time() - $usernew < 300) {
            redirect_to("admin_login.php");
            $message ="Your password has expired";
            return $message;
          }else {
            redirect_to("admin_index.php");
            echo ($usernew + 2);
          }

        }

      }
    }}
    }elseif($user_set){
      $founduser = mysqli_fetch_array($userel, MYSQLI_ASSOC);
      $_SESSION['user_name'] = $founduser['user_fname'];
      $_SESSION['user_attempts'] = $founduser['user_attempts'];
      $_SESSION['user_attempts'] += 1;
      $attempts =  $_SESSION['user_attempts'];

      $attemptsQ = "UPDATE tbl_user SET user_attempts='{$attempts}' WHERE user_name = '{$username}'";
      $attemptans = mysqli_query($link, $attemptsQ);
      $message ="Please watch what you typing";
      return $message;


  }  else{
      $message = "Its all wrong";
      return $message;
    }

    mysqli_close($link);
  }
 ?>
