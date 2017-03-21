<h1>User details</h1>
<?php
// try with /sql/user.php?id=0;TRUNCATE users;
// With mysql, combining queries with a semicolon does not work.
// try with /sql/user.php?id=1 OR 1=1
// problems: displays all users (with unencrypted passwords)
// note that MD5 is no longer good for encryption
require_once __DIR__ . '/../db.php';

$query = "SELECT * FROM `users` WHERE `userId`=" . $_GET['id'];

$result = mysqli_query( $conn, $query );

$user = mysqli_fetch_all( $result, MYSQLI_ASSOC );

var_dump($user);
