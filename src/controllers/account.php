<?php

require_once __DIR__ . '/../models/user.php';

function require_login_account() {
    if (empty($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
}

function account_edit() {
    require_login_account();
    $userId = (int)$_SESSION['user_id'];

    $user = user_find_by_id($userId);
    if (!$user) {
        header('Location: /logout');
        exit;
    }

    $error = null;
    $success = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name  = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars(trim($_POST['email'] ?? ''), ENT_QUOTES, 'UTF-8');

        user_update($userId, $name, $email);
        $_SESSION['toast'][] = ['type' => 'success', 'message' => 'Compte mis à jour avec succès !'];
        $user = user_find_by_id($userId);
    }

    include __DIR__ . '/../views/account/edit.php';
}
