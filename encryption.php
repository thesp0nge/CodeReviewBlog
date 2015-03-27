<?php
// Military crypto
function encrypt($password) {
	$salt = "0987654321";
	$result = $lastRound = hash_hmac(
		'sha512',
		$salt,
		$password,
		true
	);
	for ( $j = 1; $j < 50000; ++$j ) {
		$lastRound = hash_hmac(
			'sha512',
			$j,
			$lastRound,
			true
		);
		$result ^= $lastRound;
	}
	return (int) bin2hex($result);
}
