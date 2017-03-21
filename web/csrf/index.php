<?php
/*
 * CSRF: use the trusted session of the user to your advantage
 *
 *
 */
session_start();

if ( ! isset($_SESSION[ 'userId' ])) {
	header('Location: /login.php');
	exit();
}

?>
<h1>Open for CQRS!</h1>
<em>Let 'm forged requests come in...</em>
<table>
	<thead>
		<th>userId</th>
		<th>username</th>
		<th>&nbsp;</th>
	</thead>
<?php
	require_once __DIR__ . '/../db.php';

	$query = "SELECT * FROM `users`";

	$result = mysqli_query( $conn, $query );

	while ($user = mysqli_fetch_object( $result )) {
		echo '<tr>';
		echo '<td>' . (int) $user->userId . '</td>';
		echo '<td>' . htmlentities( strip_tags( $user->username ) ) . '</td>';
		echo '<td><a href="/cqrs/delete-user.php?userId=' . (int) $user->userId. '">Delete</a></td>';
		echo '</tr>';
	}
?>
</table>
