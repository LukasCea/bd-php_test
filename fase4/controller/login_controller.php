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
    // 2. Guardar información útil en la superglobal $_SESSION
    session_start();
    $_SESSION['user_id'] = $user['id_user'];
    $_SESSION['username'] = $user['username'];
    
    // 3. (Opcional pero recomendado) Regenerar el ID por seguridad
    session_regenerate_id();

    header("Location: ../view/principal_page.php"); // Redirigir a una zona privada
    exit();
} else {
    echo "Usuario o contraseña incorrectos.";
}

$db->close();