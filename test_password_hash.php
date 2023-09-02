<?php
function setPassword(string $password) {
    $hashOptions = [
        'cost' => 10
    ];
    $password_hash = password_hash(
        base64_encode(
            hash('sha384', $password, true)
        ),
        PASSWORD_DEFAULT,
        $hashOptions
    );
    return $password_hash;
}

if (empty($argv[1])) {
    echo "Cara Pakai : php $argv[0] password";
    exit;
}

$password = $argv[1];

$pwd_hash = setPassword($password);

echo $password . ' => ' . $pwd_hash;

?>
