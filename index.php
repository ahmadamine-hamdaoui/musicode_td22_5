<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$path = $_GET['q'] ?? '';
$path = '/' . trim($path, '/');

if ($path === '/login') {
    require __DIR__ . '/src/controllers/auth.php';
    auth_login();
} elseif ($path === '/register') {
    require __DIR__ . '/src/controllers/auth.php';
    auth_register();
} elseif ($path === '/logout') {
    require __DIR__ . '/src/controllers/auth.php';
    auth_logout();
} elseif ($path === '/musics') {
    require __DIR__ . '/src/controllers/musics.php';
    musics_index();
} elseif (preg_match('#^/musics/(\d+)$#', $path, $m)) {
    require __DIR__ . '/src/controllers/musics.php';
    musics_show((int)$m[1]);
} elseif ($path === '/library') {
    require __DIR__ . '/src/controllers/library.php';
    library_index();
} elseif ($path === '/library/add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . '/src/controllers/library.php';
    library_add();
} elseif ($path === '/library/remove' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . '/src/controllers/library.php';
    library_remove();
} elseif ($path === '/library/rate' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . '/src/controllers/library.php';
    library_rate();
} elseif ($path === '/account') {
    require __DIR__ . '/src/controllers/account.php';
    account_edit();
} elseif ($path === '/' || $path === '') {
    header('Location: /musicode/musics');
    exit;
} else {
    http_response_code(404);
    echo '404 - Page non trouvée';
}
