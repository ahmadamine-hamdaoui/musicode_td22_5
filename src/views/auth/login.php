<?php include __DIR__ . '/../layout/header.php'; ?>

<section class="max-w-md mx-auto">
    <h1 class="text-2xl font-semibold mb-4 text-white">Connexion</h1>

    <?php if (!empty($error)): ?>
        <div class="mb-4 rounded bg-red-900/50 border border-red-700 text-red-100 px-3 py-2 text-sm">
            <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <form method="post" class="space-y-3">
        <div>
            <label class="block text-sm mb-1 text-slate-200">Email</label>
            <input type="email" name="email" required
                   class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm mb-1 text-slate-200">Mot de passe</label>
            <input type="password" name="password" required
                   class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <button type="submit"
                class="w-full mt-2 bg-indigo-500 hover:bg-indigo-400 text-white font-medium py-2 rounded text-sm">
            Se connecter
        </button>
    </form>

    <p class="mt-4 text-xs text-slate-400">
        Pas de compte ?
        <a href="register" class="text-indigo-400 hover:text-indigo-300">Inscrivez-vous</a>
    </p>
</section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
