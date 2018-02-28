<?php
session_start();

  function confirm_logged_in() {
    if(!isset($_SESSION['user_id'])){
      redirect_to("admin_login.php");
    }
  }

  function logged_out() {
    session_destroy();
    redirect_to("../admin_login.php"); // ya q llaman adentro de esta onda desde afuera del folder, es q este tiene los puntitos
  }
 ?>
