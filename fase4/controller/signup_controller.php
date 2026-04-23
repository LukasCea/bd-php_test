<?php
//Signup
$db = new SQLite3('../database/database_login.db');

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $db->prepare('INSERT OR IGNORE INTO users (username, password) VALUES (:username, :password)');
$stmt->bindValue(':username', $username, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT); 

$result = $stmt->execute();
$db->close();