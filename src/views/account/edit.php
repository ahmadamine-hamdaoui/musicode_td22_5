<?php include __DIR__ . '/../layout/header.php'; ?>

<section class="max-w-lg">
    <h1 class="text-2xl font-semibold mb-4 text-white">Mon compte</h1>

    <?php if (!empty($success)): ?>
        <div class="mb-3 rounded bg-emerald-900/40 border border-emerald-600 text-emerald-100 px-3 py-2 text-sm">
            <?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="mb-3 rounded bg-red-900/40 border border-red-600 text-red-100 px-3 py-2 text-sm">
            <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <form method="post" class="space-y-4">
        <div>
            <label class="block text-sm mb-1 text-slate-200">Nom</label>
            <input type="text" name="name"
                   value="<?php echo htmlspecialchars($user['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                   class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm mb-1 text-slate-200">Email</label>
            <input type="email" name="email"
                   value="<?php echo htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                   class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="border-t border-slate-700 pt-4 mt-2">
            <p class="text-xs text-slate-400 mb-2">Changer le mot de passe (optionnel)</p>
            <div class="grid md:grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm mb-1 text-slate-200">Nouveau mot de passe</label>
                    <input type="password" name="new_password"
                           class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm mb-1 text-slate-200">Confirmation</label>
                    <input type="password" name="new_password_confirm"
                           class="w-full rounded bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>
        </div>

        <button type="submit"
                class="mt-2 bg-indigo-500 hover:bg-indigo-400 text-white font-medium py-2 px-4 rounded text-sm">
            Enregistrer
        </button>
    </form>
</section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
