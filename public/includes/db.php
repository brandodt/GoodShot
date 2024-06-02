<?php

$host = '127.0.0.1';
$db = 'goodshot';
$user = 'dwayne';
$pass = 'dw4yn3@g00dSh0t';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
