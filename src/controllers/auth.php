<?php

require_once __DIR__ . '/../models/user.php';

function auth_login() {
    $error = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = htmlspecialchars(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        $user = user_find_by_email($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = (int)$user['id'];
            $_SESSION['toast'][] = ['type' => 'success', 'message' => 'Connexion réussie ! Bienvenue.'];
            header('Location: musics');
            exit;
        } else {
            $error = 'Identifiants invalides.';
        }
    }

    include __DIR__ . '/../views/auth/login.php';
}

function auth_register() {
    $error = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name  = htmlspecialchars(trim($_POST['name'] ?? ''));
        $email = htmlspecialchars(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['password_confirm'] ?? '';

        if ($password !== $confirm) {
            $error = 'Les mots de passe ne correspondent pas.';
        } elseif (user_find_by_email($email)) {
            $error = 'Email déjà utilisé.';
        } else {
            user_create($name, $email, $password);
            $_SESSION['toast'][] = ['type' => 'success', 'message' => 'Inscription réussie ! Vous pouvez maintenant vous connecter.'];
            header('Location: /login');
            exit;
        }
    }

    include __DIR__ . '/../views/auth/register.php';
}

function auth_logout() {
    $_SESSION['toast'][] = ['type' => 'info', 'message' => 'Vous avez été déconnecté.'];
    session_unset();
    session_destroy();
    session_start();
    header('Location: login');
    exit;
}
