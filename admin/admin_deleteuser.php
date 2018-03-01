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
 <style media="screen">
   .formDiv div {
     margin-bottom: 20px;
   }
 </style>
 <title>Delete User</title>
 </head>
 <body>
   <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 formDiv">
     <h2>Welcome to your death Portal</h2>
     <p>Would you like to fire someone today?</p>
     <div class="row">
       <?php
         while($row = mysqli_fetch_array($users)) {
           echo "<div class=\"col-xs-6 col-sm-6 col-md-4 col-lg-4\"><p>{$row['user_fname']}</p>
           <a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\" class=\"delbtn\">Fired</a></div>";
         }
        ?>
     </div>
    </div>
  </div>
</body>
</html>
