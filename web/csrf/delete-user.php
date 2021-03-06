<?php
/*
 * CSRF: use the trusted session of the user to your advantage
 *
 * Open http://spaceweb.nl/security-exercises/csrf.html
 */
session_start();
session_regenerate_id();

if ( ! isset( $_SESSION[ 'userId' ] ) ) {
	header( 'Location: /login.php' );
	exit();
}

if ( ! isset($_GET['csrf-token']) || $_SESSION['csrf-token'] !== $_GET['csrf-token']) {
    header('HTTP/1.0 400 Bad request');
    exit('CSRF token invalid');
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
