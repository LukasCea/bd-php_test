<?php
//Login

$db = new SQLite3('../database/database_login.db');

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $db->prepare('SELECT * FROM users WHERE username = :name');
$stmt->bindValue(':name', $username, SQLITE3_TEXT);
$result = $stmt->execute();

$user = $result->fetchArray(SQLITE3_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    echo "Login successful!";
} else {
    echo "Invalid username or password.";
}

$db->close();