<?php
function is_multidimension($arr) {
	$rv = array_filter($arr, 'is_array');
	if (count($rv)>0) return true;
	return false;
}

$arr1 = ['satu', 'dua', 'tiga', 'empat', 'lima'];
$arr2 = [
	['satu', 'dua', 'tiga', 'empat', 'lima'],
	['senam', 'tujuh', 'delapan', 'sembilan', 'sepuluh'],
	['sebelas', 'duabelas', 'tigabelas', 'empatbelas', 'limabelas']
];
$arr3 = ['id' => 1, 'nama' => 'Test1'];
$arr4 = [
	['id' => 1, 'nama' => 'Test1'],
	['id' => 2, 'nama' => 'Test2']
];

echo 'Count Arr1 : ' . count($arr1) . "\n";
echo 'Count Arr2 mode 0 : ' . count($arr2, 0) . "\n";
echo 'Count Arr2 mode 1 : ' . count($arr2, 1) . "\n";

if (is_multidimension($arr1)) echo "Arr1 is multidemension array \n";
else echo "Arr1 is not multidemension array \n";

if (is_multidimension($arr2)) echo "Arr2 is multidemension array \n";
else echo "Arr2 is not multidemension array \n";

if (is_multidimension($arr3)) echo "Arr3 is multidemension array \n";
else echo "Arr3 is not multidemension array \n";

if (is_multidimension($arr4)) echo "Arr4 is multidemension array \n";
else echo "Arr4 is not multidemension array \n";

$orderCol = [null, null, 'first_name', 'last_name', 'address', null];
echo 'Order Kolom index 3 : ' . $orderCol[3] . "\n";
?>
