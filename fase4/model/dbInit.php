<?php

$db = new SQLite3('../database/database_login.db');

$db->exec("CREATE TABLE IF NOT EXISTS users (
    id_user INTEGER PRIMARY KEY AUTOINCREMENT, 
    username TEXT UNIQUE, 
    password TEXT
    )");

$password_admin = '123';
$hash_admin = password_hash($password_admin, PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT OR IGNORE INTO users (username, password) VALUES ('admin', :hash)");
$stmt->bindValue(':hash', $hash_admin, SQLITE3_TEXT);
$stmt->execute();

$db->close();