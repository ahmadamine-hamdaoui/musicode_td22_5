INSERT INTO users (name, email, password) VALUES
('Dupont Jean',  'jean.dupont@example.com',  '$2y$10$uG4bY2a6SfxyKnZm8U5TtuCswD7RbQ8jDZEBoq7NyBxeIN9/VrSom'),
('Martin Claire','claire.martin@example.com','$2y$10$9k6QFye4itL7Q4MjZQ9PYOM0Z4iwAkgCKP1zyPlr8XfzOarQmFqeq'),
('Durand Paul',  'paul.durand@example.com',  '$2y$10$PzKk0XuCDcgJm8Ha4OgI9eh85FTvnjIbncHofMckvSO.pGMQxy9CO');


INSERT INTO musics (title, author, album, duration) VALUES
('Ruinart',           'R2',                          'Ruinart - Single',                 170),
('Adriano',           'Niska',                       'Adriano - Single',                 185),
('PARISIENNE',        'GIMS, La Mano 1.9',           'PARISIENNE - Single',              200),
('KAT',               'Gazo, La Rvfleuze',           'KAT - Single',                     175),
('RUN',               'Rim''K, SDM',                 'RUN - EP',                         190),
('JAMAIS TOI',        'R2',                          'JAMAIS TOI - Single',              185),
('+971',              'Ninho',                       '+971 - Single',                    201),
('Viano',             'RK, Genezio',                 'Viano - Single',                   182),
('Treillis',          'Boîte Noire, Ninho',          'Treillis - Single',                195),
('Tout Pour L''Equipe','L2B',                        'Tout Pour L''Equipe - Single',     178);

INSERT INTO collections (user_id, music_id, note) VALUES
-- User 1 
(1, 1, 5),
(1, 2, 4),
(1, 3, 3),
(1, 4, 5),
(1, 5, 4),

-- User 2 
(2, 3, 5),
(2, 4, 4),
(2, 6, 3),
(2, 7, 5),
(2, 8, 4),

-- User 3 
(3, 2, 3),
(3, 5, 5),
(3, 7, 4),
(3, 9, 5),
(3,10, 4);
