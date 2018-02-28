<?php
// function randompass() {
//     $ranString = '_%&*$#abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
//     $password = array();
//     $ranStringlenght = strlen($ranString) - 1;
//     for ($i = 0; $i < 8; $i++) {
//         $n = rand(0, $ranStringlenght);
//         $password[] = $ranString[$n];
//     }
//     return implode($password);
// }

function criptpass() {
  $password = 'pedo';
  $criptmethod = 'AES-128-CTR';
  $criptkey = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
  $criptiv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($criptmethod));
  $criptans = openssl_encrypt($password, $criptmethod, $criptkey, 0, $criptiv) . "::" . bin2hex($criptiv);
  // unset($password, $criptmethod, $criptkey, $criptiv);

// echo $criptans;

  if(preg_match("/^(.*)::(.*)$/", $criptans, $regs)) {
      // decrypt encrypted string
      list(, $criptans, $criptiv) = $regs;
      $criptmethod = 'AES-128-CTR';
      $criptkey = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
      $decrans = openssl_decrypt($criptans, $criptmethod, $criptkey, 0, hex2bin($criptiv));
      unset($criptans, $criptmethod, $criptkey, $criptiv, $regs);

      return $decrans;
      // echo $decrans;
    }
// return $criptans;
}


// echo randompass();
// echo " CHOCOLALA ";
echo criptpass();
?>
