<?php
require_once 'db.php';
$query = 'DROP DATABASE `security_exercises`';
$result = mysqli_query($conn, $query);
var_dump($result);
