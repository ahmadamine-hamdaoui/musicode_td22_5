<?php include __DIR__ . '/../layout/header.php'; ?>

<section>
    <h1 class="text-3xl font-semibold mb-1 text-white">Catalogue des musiques</h1>
    <p class="text-sm text-slate-400 mb-8">
        Découvrez les morceaux disponibles et ajoutez-les à votre bibliothèque.
    </p>

    <?php if (empty($musics)): ?>
        <p class="text-sm text-slate-400">Aucune musique pour le moment.</p>
    <?php else: ?>
        <div class="grid md:grid-cols-3 gap-6">
            <?php foreach ($musics as $music): ?>
                <div class="bg-slate-800 border border-slate-700 rounded-2xl shadow-md px-6 py-5 flex flex-col justify-between">
                    <div>
                        <h2 class="text-base font-semibold mb-1 text-white">
                            <?php echo htmlspecialchars($music['title'], ENT_QUOTES, 'UTF-8'); ?>
                        </h2>
                        <p class="text-xs text-slate-400 mb-1">
                            <?php echo htmlspecialchars($music['author'], ENT_QUOTES, 'UTF-8'); ?>
                            <?php if (!empty($music['album'])): ?>
                                · Album : <?php echo htmlspecialchars($music['album'], ENT_QUOTES, 'UTF-8'); ?>
                            <?php endif; ?>
                        </p>
                        <p class="text-[11px] text-slate-500 mb-4">
                            Durée : <?php echo gmdate('i\m s\s', (int)$music['duration']); ?>
                        </p>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <a href="musics/<?php echo (int)$music['id']; ?>"
                           class="text-indigo-400 hover:text-indigo-300">
                            Voir la fiche
                        </a>

                        <?php if (!empty($_SESSION['user_id'])): ?>
                            <form method="post" action="/musicode/library/add">
                                <input type="hidden" name="music_id" value="<?php echo (int)$music['id']; ?>">
                                <button type="submit"
                                        class="px-3 py-1 rounded-full text-xs text-white
                                               bg-gradient-to-r from-blue-500 to-purple-500 hover:opacity-90">
                                    Ajouter
                                </button>
                            </form>
                        <?php else: ?>
                            <span class="text-[11px] text-slate-500">
                                Connectez-vous pour ajouter
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
