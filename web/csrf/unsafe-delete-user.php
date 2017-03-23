<?php
/*
 * CSRF: use the trusted session of the user to your advantage
 *
 * Open http://spaceweb.nl/security-exercises/csrf.html
 */
session_start();

if ( ! isset( $_SESSION[ 'userId' ] ) ) {
	header( 'Location: /login.php' );
	exit();
}

require_once __DIR__ . '/../db.php';

$userId = (int) $_GET[ 'userId' ];

if ( ! $userId ) {
	exit( 'No user id given' );
}

$query = "DELETE FROM `users` WHERE `userId` = $userId";

if ( mysqli_query( $conn, $query ) && 1 === mysqli_affected_rows($conn) ) {
	exit( 'User deleted' );
}

exit( 'Could not delete user' );
