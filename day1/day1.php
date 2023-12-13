<?php

$file = new SplFileObject('input.txt');
$file->setFlags(SplFileObject::READ_AHEAD | SplFileObject::DROP_NEW_LINE | SplFileObject::SKIP_EMPTY);
$lines = [];
foreach ($file as $l) {
	$lines[] = $l;
}
echo array_sum(array_map('getTwoDigitsOfLine', $lines));
//------------------------------------------------------------
function getTwoDigitsOfLine($line) {
	return firstNumberInString($line) . lastNumberInString($line);
}

function numbersFromString($str) {
	//kjrqmzv9mmtxhgvsevenhvq7 -> [k,j,r,...v,q,7]
	$chars = str_split($str);
 //[k,j,r,...v,q,7] -> [9,7]
	return array_values(array_filter($chars, 'is_numeric'));
}

function firstNumberInString($str) {
	return numbersFromString($str)[0]; //[9,7] -> 9
}

function lastNumberInString($str) {
	$last = numbersFromString($str);
	return end($last); //[9,7] -> 7
}
//------------------------------------------------------------
//tests
// var_dump(
// 	getTwoDigitsOfLine("qszds3")
// );
