<?php

require_once __DIR__ . '/../models/music.php';

function musics_index() {
    $musics = music_get_all();
    $genres = music_get_genres();
    include __DIR__ . '/../views/musics/index.php';
}

function musics_show(int $id) {
    $music = music_find_by_id($id);
    include __DIR__ . '/../views/musics/show.php';
}
