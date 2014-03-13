<?php
function isPrime($n)
{
	$i = 2;

	if ($n == 2) {
		return true;	
	}
 
	$sqrtN = sqrt($n);
	while ($i <= $sqrtN) {
		if ($n % $i == 0) {
			return false;
		}
		$i++;
	}
 
	return true;
}
?>