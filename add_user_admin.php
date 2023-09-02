<?php
function get_password_hash($password) {
	$hashOptions = [
		'cost' => 10
	];
	return password_hash(
		base64_encode(
			hash('sha384', $password, true)
		),
		PASSWORD_DEFAULT,
		$hashOptions
	);
}

if (empty($argv[1]) || empty($argv[2]) || empty($argv[3])) {
	echo "Cara pakai : php $argv[0] email username password";
}

$email = $argv[1];
$username = $argv[2];
$password = $argv[3];

$host = "host = 127.0.0.1";
$port = "port = 5432";
$dbname = "dbname = ci4bs4";
$credentials = "user = Winston password=H4ru5.151";

$db = pg_connect("$host $port $dbname $credentials");
if (!$db) {
	echo "Error : Unable to open database\n";
} else {
	echo "Opened database successfully\n";
}

$sqlA = "INSERT INTO users (email, username, password_hash, active)
    VALUES ('" . $email . "', '" . $username ."', '" . get_password_hash($password) . "', 1);";

$ret = pg_query($db, $sqlA);
if (!$ret) {
	echo pg_last_error($db);
} else {
	echo "Add user : " . $username . " sukses\n";
}

$sqlB = "SELECT id, email, username FROM users WHERE username='" . $username . "';";

$ret = pg_query($db, $sqlB);
$row = pg_fetch_row($ret);

$id = $row[0];
$sqlC = "INSERT INTO auth_groups_users (group_id, user_id) VALUES (1, " . $id . ");";
$ret = pg_query($db, $sqlC);
if (!$ret) {
	echo pg_last_error($db);
} else {
	echo "Set user : " . $username . " di group admin sukses\n";
}


pg_close($db);

?>