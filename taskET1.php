<?php
// Task №1

$num1 = 0;
$num2 = 1;
$sum = 0;
$fNum = 64;

for ($i = 0; $i < $fNum; $i++){
	$sum = $num1 + $num2;
	$num1 = $num2;
	$num2 = $sum;
	echo $sum;
	if($i < $fNum - 1)
		echo ', ';
	else
		echo '.';
}
?>