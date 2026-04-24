<?php
//Signup
$db = new SQLite3('../database/database_login.db');

$username = $_POST['username'];
$passwordRaw = $_POST['password'];

$passwordHashed = password_hash($passwordRaw, PASSWORD_DEFAULT);

$stmt = $db->prepare('INSERT OR IGNORE INTO users (username, password) VALUES (:username, :password)');
$stmt->bindValue(':username', $username, SQLITE3_TEXT);
$stmt->bindValue(':password', $passwordHashed, SQLITE3_TEXT);

$result = $stmt->execute();

if ($result) {
    echo "Usuario registrado con éxito de forma segura.";
} else {
    echo "Error al registrar.";
}

$db->close();