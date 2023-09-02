<?php
$array = [
	'fruit1' => 'apple',
	'fruit2' => 'orange',
	'fruit3' => 'grape',
	'fruit4' => 'apple',
	'fruit5' => 'apple'
];
foreach($array as $key => $value) {
	echo 'Key : ' . $key . '   Val : ' . $value . "\n";
}
$order = ['id' => 'DESC'];

echo "\n";
echo 'Key Order : ' . key($order) . '   Val Order : ' . $order[key($order)] . "\n";
$limit = [
	'start' => 5,
	'length' => 50
];
echo 'Start From : ' . $limit['start'] . '  With Length : ' . $limit['length'] . "\n";

echo 'abcdef , 1 = ' . substr("abcdef", 1) . "\n";

?>
