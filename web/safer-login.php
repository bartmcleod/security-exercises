<?php
/**
 * Demonstrates sql injection to get a login
 *
 * Try with username: ' OR 1=1 OR 'x' = 'x
 * (include all single quotes)
 */
session_start();

require_once './db.php';

$loginFailed = false;

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];

    $password = $_POST['password'];

    $query = "SELECT `userId` FROM `users` WHERE `username` = ? AND `password` = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $userId);
    mysqli_stmt_fetch($stmt);

    if ($userId) {

        $_SESSION['userId'] = $userId;
        exit('SUCCESS!');
    }

    $loginFailed = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        em {
            color: red;
        }

        label, input[type="submit"] {
            display: block;
        }
    </style>
</head>
<body>
<h1>Login</h1>
<?php
if ($loginFailed) {
    echo '<em>Login failed</em>';
}
?>
<form action="" method="POST" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <label for="username">Username<input type="text" value="<?= $username ?? '' ?>" placeholder="username here"
                                             id="username" name="username"/></label>
        <label for="password">Password<input type="password" id="password" name="password"/></label>
        <input type="submit" value="Login now"/>
    </fieldset>
</form>
</body>
</html>
