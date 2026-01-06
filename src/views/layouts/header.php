<?php
$isLoggedIn = !empty($_SESSION['user_id']);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Musicode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-900 min-h-screen">
<header class="bg-gradient-to-r from-sky-400 to-indigo-400 text-white shadow-lg">
    <div class="max-w-6xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <a href="/musicode/musics" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-white/95 backdrop-blur-sm flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-200">
                    <span class="w-0 h-0 border-l-[10px] border-y-[6px] border-y-transparent border-l-indigo-500"></span>
                </div>
                <div>
                    <span class="text-2xl font-bold tracking-tight">Musicode</span>
                    <p class="text-xs text-white/80">Votre bibliothèque musicale</p>
                </div>
            </a>
            
            <nav class="flex items-center gap-2">
                <a href="/musicode/musics" 
                   class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/20 transition-all duration-200">
                    Catzlogue
                </a>
                <?php if ($isLoggedIn): ?>
                    <a href="/musicode/library" 
                       class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/20 transition-all duration-200">
                        Ma bibliothèque
                    </a>
                    <a href="/musicode/account" 
                       class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/20 transition-all duration-200">
                        Mon compte
                    </a>
                    <a href="/musicode/logout"
                       class="ml-2 px-4 py-2 rounded-lg bg-white/10 backdrop-blur-sm border border-white/30 text-sm font-medium
                              hover:bg-white/20 transition-all duration-200 shadow-sm">
                        Déconnexion
                    </a>
                <?php else: ?>
                    <a href="/musicode/login" 
                       class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-white/20 transition-all duration-200">
                        Connexion
                    </a>
                    <a href="/musicode/register"
                       class="ml-2 px-4 py-2 rounded-lg bg-white text-indigo-600 text-sm font-semibold
                              hover:bg-white/90 transition-all duration-200 shadow-md">
                        Inscription
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>

<?php include __DIR__ . '/../component/toast.php'; ?>

<main class="max-w-6xl mx-auto px-6 py-12 pb-24">
