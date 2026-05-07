<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login_form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['username']; ?></h1>
    <h1>Bienvenido a la Página Principal</h1>
    <p>Esta es una página protegida. Solo los usuarios autenticados pueden ver este contenido.</p>
</body>
</html>