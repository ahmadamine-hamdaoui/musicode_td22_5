<?php include __DIR__ . '/../layout/header.php'; ?>

<section>
    <div class="mb-10">
        <h1 class="text-4xl font-bold mb-2 text-gray-900">Ma bibliothèque</h1>
        <p class="text-base text-gray-600">
            Gérez vos musiques préférées et notez-les.
        </p>
    </div>

    <?php if (empty($items)): ?>
        <div class="bg-white border border-gray-200 rounded-xl px-6 py-16 text-center">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
            </svg>
            <p class="text-gray-600 mb-4">Vous n'avez encore ajouté aucune musique.</p>
            <a href="musics" class="inline-flex items-center gap-2 text-sm font-medium text-indigo-600 hover:text-indigo-700">
                Découvrir le catalogue
            </a>
        </div>
    <?php else: ?>
        <div class="grid md:grid-cols-2 gap-4">
            <?php foreach ($items as $item): ?>
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden">
                    <div class="px-6 py-5">
                        <div class="flex justify-between items-start gap-4 mb-4">
                            <div class="flex-1">
                                <h2 class="text-base font-bold text-gray-900 mb-1">
                                    <?php echo htmlspecialchars($item['title']); ?>
                                </h2>
                                <p class="text-sm text-gray-600 mb-2">
                                    <?php echo htmlspecialchars($item['author']); ?>
                                </p>
                                <?php if (!empty($item['album'])): ?>
                                    <p class="text-xs text-gray-500">
                                        Album : <?php echo htmlspecialchars($item['album']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            
                            <form method="post" action="library/remove">
                                <input type="hidden" name="music_id" value="<?php echo (int)$item['id']; ?>">
                                <button type="submit"
                                        class="text-xs px-3 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 hover:border-red-300 transition-colors">
                                    Supprimer
                                </button>
                            </form>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <?php echo gmdate('i\m s\s', (int)$item['duration']); ?>
                            </div>

                            <form method="post" action="library/rate" class="flex items-center gap-2">
                                <input type="hidden" name="music_id" value="<?php echo (int)$item['id']; ?>">
                                <label class="text-xs font-medium text-gray-700">Note :</label>
                                <select name="note"
                                        class="bg-white border border-gray-300 text-gray-900 rounded-lg px-2 py-1 text-sm font-medium
                                               focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:border-gray-400 transition-colors">
                                    <?php for ($i = 0; $i <= 5; $i++): ?>
                                        <option value="<?php echo $i; ?>"
                                            <?php echo (isset($item['note']) && (int)$item['note'] === $i) ? 'selected' : ''; ?>>
                                            <?php echo $i === 0 ? '-' : str_repeat('⭐', $i); ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                                <button type="submit" 
                                        class="px-3 py-1 rounded-lg text-xs font-medium text-white bg-indigo-500 hover:bg-indigo-600 transition-colors">
                                    OK
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
