# lab-openssl-encrypt-php

## useage
php7.2
```sh
$ php7.2 main.php 
TEST 1 : encrypt & decrypt
$plaintext payload = array(2) {
  ["p"]=>
  int(1)
  ["l"]=>
  int(20)
}
$encryptData = string(44) "v2JIGGSLHpC2VjuOMkK/wia8iMArywhKtIHYBBr4FS4="
decrypted $plaintext = array(2) {
  ["p"]=>
  int(1)
  ["l"]=>
  int(20)
}
TEST 2 : decrypt remote payload
$encryptData = string(44) "UiCIfk4gXN82Z7V8XDJwAniAI2PbnBoyx1RV1dkfWJg="
decrypted $plaintext = array(2) {
  ["p"]=>
  int(1)
  ["l"]=>
  int(20)
}

```



php 8.2
```sh
$ php8.2 main.php 
TEST 1 : encrypt & decrypt
$plaintext payload = array(2) {
  ["p"]=>
  int(1)
  ["l"]=>
  int(20)
}
$encryptData = string(44) "quykM6FwWaHf+DgGET9rx2Ih/mD+w/iZypB3MezqQOw="
decrypted $plaintext = array(2) {
  ["p"]=>
  int(1)
  ["l"]=>
  int(20)
}
TEST 2 : decrypt remote payload
$encryptData = string(44) "UiCIfk4gXN82Z7V8XDJwAniAI2PbnBoyx1RV1dkfWJg="
decrypted $plaintext = array(2) {
  ["p"]=>
  int(1)
  ["l"]=>
  int(20)
}

```
