<?php

require_once __DIR__ . '/../models/library.php';

function require_login() {
    if (empty($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
}

function library_index() {
    require_login();
    $userId = (int)$_SESSION['user_id'];

    $items = library_get_user_library($userId);

    include __DIR__ . '/../views/library/index.php';
}

function library_add() {
    require_login();
    $userId = (int)$_SESSION['user_id'];
    $musicId = (int)($_POST['music_id'] ?? 0);

    if ($musicId > 0) {
        library_add_music($userId, $musicId);
        $_SESSION['toast'][] = ['type' => 'success', 'message' => 'Musique ajoutée à votre bibliothèque !'];
    } else {
        $_SESSION['toast'][] = ['type' => 'error', 'message' => 'Erreur lors de l\'ajout de la musique.'];
    }
    header('Location: /musicode/library');
    exit;
}

function library_remove() {
    require_login();
    $userId = (int)$_SESSION['user_id'];
    $musicId = (int)($_POST['music_id'] ?? 0);

    if ($musicId > 0) {
        library_remove_music($userId, $musicId);
        $_SESSION['toast'][] = ['type' => 'success', 'message' => 'Musique retirée de votre bibliothèque.'];
    } else {
        $_SESSION['toast'][] = ['type' => 'error', 'message' => 'Erreur lors de la suppression.'];
    }

    header('Location: /musicode/library');
    exit;
}

function library_rate() {
    require_login();
    $userId = (int)$_SESSION['user_id'];
    $musicId = (int)($_POST['music_id'] ?? 0);
    $note    = (int)($_POST['note'] ?? 0);

    if ($musicId > 0 && $note >= 0 && $note <= 5) {
        library_rate_music($userId, $musicId, $note);
        $_SESSION['toast'][] = ['type' => 'success', 'message' => 'Note enregistrée avec succès !'];
    } else {
        $_SESSION['toast'][] = ['type' => 'error', 'message' => 'Erreur lors de la notation.'];
    }

    header('Location: /musicode/library');
    exit;
}
