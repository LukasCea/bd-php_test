<?php
//Login

$db = new SQLite3('../database/database_login.db');

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $db->prepare('SELECT * FROM users WHERE username = :name AND password = :password');
$stmt->bindValue(':name', $username, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);
$result = $stmt->execute();

$db->close();