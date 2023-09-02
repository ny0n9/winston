<?php
if (empty($argv[1]) || empty($argv[2])) {
	echo "Cara pakai : php $argv[0] Password Password_Hash";
	exit;
}
$password = $argv[1];
$pwd_hash = $argv[2];

if (password_verify(base64_encode(hash('sha384', $password, true)), $pwd_hash)) {
	echo "\n Verify Ok";
} else {
	echo "\n Verify No";
}
?>
