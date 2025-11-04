<?php
// login.php - Page temporaire pour tester
session_start();

if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin') {
    $_SESSION['user_role'] = 'secretaire';
    header('Location: admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" value="admin">
        <input type="password" name="password" placeholder="Password" value="admin">
        <button type="submit">Login</button>
    </form>
</body>
</html>

