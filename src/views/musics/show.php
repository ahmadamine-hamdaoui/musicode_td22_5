<?php include __DIR__ . '/../layout/header.php'; ?>

<?php if (!$music): ?>
    <p class="text-sm text-red-400">Musique introuvable.</p>
<?php else: ?>
    <section class="max-w-3xl mx-auto">
        <a href="musics" class="text-xs text-slate-400 hover:text-slate-300 flex items-center gap-1 mb-4">
            <span>←</span>
            <span>Retour au catalogue</span>
        </a>

        <div class="bg-slate-800 text-white rounded-2xl shadow-lg px-8 py-8 border border-slate-700">
            <h1 class="text-3xl font-semibold mb-2">
                <?php echo htmlspecialchars($music['title'], ENT_QUOTES, 'UTF-8'); ?>
            </h1>
            <p class="text-sm text-slate-400 mb-6">
                Par <?php echo htmlspecialchars($music['author'], ENT_QUOTES, 'UTF-8'); ?>
            </p>

            <div class="space-y-2 text-sm text-slate-300 mb-8">
                <p>
                    <span class="font-medium text-slate-200">Album :</span>
                    <?php echo htmlspecialchars($music['album'] ?? '—', ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <p>
                    <span class="font-medium text-slate-200">Durée :</span>
                    <?php echo gmdate('i\m s\s', (int)$music['duration']); ?>
                </p>
            </div>

            <?php if (!empty($_SESSION['user_id'])): ?>
                <form method="post" action="/musicode/library/add">
                    <input type="hidden" name="music_id" value="<?php echo (int)$music['id']; ?>">
                    <button type="submit"
                            class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg text-sm font-medium text-white
                                   bg-indigo-500 hover:bg-indigo-400">
                        Ajouter à ma bibliothèque
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php include __DIR__ . '/../layout/footer.php'; ?>
