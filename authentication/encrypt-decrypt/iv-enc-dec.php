<?php

$psw = "1234";
$key = "s1234";
$method = "AES-128-CTR";

//  Create IV (IMPORTANT)
// $iv_length = openssl_cipher_iv_length($method);
// $iv = openssl_random_pseudo_bytes($iv_length);

// $iv = "1234568794568971";

$iv = openssl_random_pseudo_bytes(16);

// ENCRYPT
$encrypted = openssl_encrypt($psw, $method, $key, 0, $iv);

//DECRYPT
$decrypted = openssl_decrypt($encrypted, $method, $key, 0, $iv);

// OUTPUT
echo "Original: " . $psw . "<br>";
echo "Encrypted: " . $encrypted . "<br>";
echo "Decrypted: " . $decrypted . "<br>";


// 2 
echo "<br>";


$psw = "1234";
$key = "s1234";
$method = "AES-128-CTR";

//  Create IV (IMPORTANT)
// $iv_length = openssl_cipher_iv_length($method);
// $iv = openssl_random_pseudo_bytes($iv_length);

$iv = openssl_random_pseudo_bytes(16);

// ENCRYPT
$encrypted = openssl_encrypt($psw, $method, $key, OPENSSL_ZERO_PADDING, $iv);

//DECRYPT
$decrypted = openssl_decrypt($encrypted, $method, $key, 0, $iv);

// OUTPUT
echo "Original: " . $psw . "<br>";
echo "Encrypted: " . $encrypted . "<br>";
echo "Decrypted: " . $decrypted . "<br>";


// 3

echo "<br>";


$psw = "12314964914";
$key = "s1234";
$method = "AES-128-CTR";

//  Create IV (IMPORTANT)
// $iv_length = openssl_cipher_iv_length($method);
// $iv = openssl_random_pseudo_bytes($iv_length);
$iv = openssl_random_pseudo_bytes(16);

// ENCRYPT
$encrypted = openssl_encrypt($psw, $method, $key, OPENSSL_RAW_DATA, $iv);

//DECRYPT
$decrypted = openssl_decrypt($encrypted, $method, $key, OPENSSL_RAW_DATA, $iv);

// OUTPUT
echo "Original: " . $psw . "<br>";
echo "Encrypted: " . $encrypted . "<br>";
echo "Decrypted: " . $decrypted . "<br>";

?>