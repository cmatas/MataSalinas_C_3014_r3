<?php
  require_once('phpscripts/config.php');
  // confirm_logged_in();

  $tbl = "tbl_user";
  $users = getAll($tbl);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <link rel="stylesheet" href="css/style.css">
 <title>Delete user</title>
 </head>
 <body>
   <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 formDiv">
     <h2>le death</h2>
    <?php
      while($row = mysqli_fetch_array($users)) {
        echo "{$row['user_fname']}
        <a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\"> has been Fired</a><br>";
      }
     ?>
    </div>
  </div>
</body>
</html>
