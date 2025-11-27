<?php
declare(strict_types=1);
require_once __DIR__ . '/db.inc.php';

// Kategorien
$pdo->exec("INSERT INTO tbl_categories (categ_name, categ_desc) VALUES
('Obst', 'Alles rund um Obst'),
('Gemüse', 'Frisches Gemüse')");

// User
$pdo->exec("INSERT INTO tbl_users (users_forename, users_lastname, users_email, users_password)
VALUES ('Max', 'Mustermann', 'max@example.com', 'test123')");

// Posts
$pdo->exec("INSERT INTO tbl_posts (posts_users_id_ref, posts_categ_id_ref, posts_header, posts_content)
VALUES
(1, 1, 'Apfel – der Klassiker', 'Äpfel sind gesund und lecker.'),
(1, 2, 'Karotte – das Power-Gemüse', 'Karotten enthalten viel Vitamin A.')");

echo "Testdaten erfolgreich eingefügt!";
