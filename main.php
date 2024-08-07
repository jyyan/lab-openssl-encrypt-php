<?php

// 加密方法 for PHP 7.2 - 8.2 使用 openssl
// ref:
// https://www.php.net/manual/en/function.openssl-encrypt.php
// https://www.php.net/manual/en/function.openssl-decrypt.php
// https://www.php.net/manual/en/function.openssl-random-pseudo-bytes.php
// https://www.php.net/manual/en/function.openssl-cipher-iv-length.php
function encrypt($fields, $key)
{
  $plaintext = json_encode($fields);
  $ivlen = openssl_cipher_iv_length('aes-256-cbc');
  $iv = openssl_random_pseudo_bytes($ivlen);
  $encryptedData = openssl_encrypt($plaintext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
  $bundleData = $iv . $encryptedData;
  $data = base64_encode($bundleData);
  return $data;
}
function decrypt($data, $key)
{
  $bundleData = base64_decode($data);
  $iv = substr($bundleData, 0, 16);
  $encryptedData  = substr($bundleData, 16, strlen($bundleData) - 16);
  $plaintext = openssl_decrypt($encryptedData, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
  if ($plaintext == null) {
    throw new Exception("decrypt error, key or iv was not correct");
  }
  $fields = json_decode($plaintext, true);
  return $fields;
}

function hexToStr($hex){
  $string='';
  for ($i=0; $i < strlen($hex)-1; $i+=2){
    $string .= chr(hexdec($hex[$i].$hex[$i+1]));
  }
  return $string;
}

//$key = openssl_random_pseudo_bytes(256);
$key = hexToStr('1111111111111111111111111111111111111111111111111111111111111111');

$fields = [
  "p" => 1,
  "l" => 20
];

echo 'TEST 1 : encrypt & decrypt'. PHP_EOL;
echo '$plaintext payload = ';
var_dump($fields);
$encryptData = encrypt($fields, $key);
echo '$encryptData = ';
var_dump($encryptData);
$plaintext = decrypt($encryptData, $key);
echo 'decrypted $plaintext = ';
var_dump($plaintext);

echo 'TEST 2 : decrypt remote payload'. PHP_EOL;
echo '$encryptData = ';
$encryptData = "UiCIfk4gXN82Z7V8XDJwAniAI2PbnBoyx1RV1dkfWJg=";
var_dump($encryptData);
$plaintext = decrypt($encryptData, $key);
echo 'decrypted $plaintext = ';
var_dump($plaintext);