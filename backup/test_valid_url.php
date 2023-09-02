<?php
//$url = "https://www.w3schools.com";
if (empty($argv[1])) {
    echo "Cara Pakai : php $argv[0] https://ci4-testing.lan";
    exit;
}

$url = $argv[1];

if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo("$url is a valid URL");
} else {
    echo("$url is not a valid URL");
}
?>
