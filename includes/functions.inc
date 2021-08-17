<?php

function evaluate( $d1, $d2, $op) {
	switch($op) {
		case '+' : // addition
			$result = $d1 + $d2;
			break;
		case '-' : // subtraction
			$result = $d1 - $d2;
			break;
		case '*' : // multiplication
			$result = $d1 * $d2;
			break;
		default :  // Unidentified, return safe value
			$result = 0;
	}
	return $result;
}


/* Return a number in the range 0-9 inclusive
 */
function randdigit() {
	return mt_rand(0,9);
} // end functionranddigit()

function randop(){
	$ops = array('+', '-', '*');
	// pick a random index between zero and highest index in array.
	$randnum = mt_rand(0,sizeof($ops)-1);
	return $ops[$randnum];  // Use the index to pick the operator
}


?>