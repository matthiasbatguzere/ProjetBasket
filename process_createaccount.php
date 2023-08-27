<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password !== $confirm_password) {
        echo 'Les mots de passe ne correspondent pas.';
        exit;
    }
    header("Location: login.php");
} else {
    echo 'Accès non autorisé.';
}
?>
