<?php

require_once __DIR__ . '/../../config/database.php';

function user_create(string $name, string $email, string $password): bool {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = db()->prepare($sql);
    return $stmt->execute([$name, $email, $hash]);
}

function user_find_by_email(string $email): ?array {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = db()->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    return $user ?: null;
}

function user_find_by_id(int $id): ?array {
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = db()->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch();
    return $user ?: null;
}

function user_update(int $id, string $name, string $email): bool {
    $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    $stmt = db()->prepare($sql);
    return $stmt->execute([$name, $email, $id]);
}

function user_update_password(int $id, string $password): bool {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = db()->prepare($sql);
    return $stmt->execute([$hash, $id]);
}
