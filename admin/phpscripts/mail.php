<?php
require_once "Mail.php";

  // function redirect_to($location) {
  //   if($location != NULL){
  //     header("Location: {$location}");
  //     exit;
  //   }
  // };

  function submitMessage($fname, $username, $email, $password){
    // you can only test this stuff in your live server

    $from = 'cmata@cammata.biz';
    $to = $email;
    $subject = "Hi, Your username and password to access the website are here!";
    $body = "Hello" . $fname . "The following username and password are just temporary so make sure to change them once you get to this website: blabla <br> username:" . $username . " <br> password:" . $password;

    $host = "mail.cammata.biz";
    $mailuser = "cmata@cammata.biz";
    $mailpass = "45docelolsCH0KOBO";

    $headers = array ('From' => $from,
      'To' => $to,
      'Subject' => $subject);
    $smtp = Mail::factory('smtp',
      array ('host' => $host,
        'auth' => true,
        'username' => $mailuser,
        'password' => $mailpass));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
      echo("<p>" . $mail->getMessage() . "</p>");
     } else {
      echo("<p>Message successfully sent!</p>");
     }

    redirect_to('admin_success.php');
  }

?>
