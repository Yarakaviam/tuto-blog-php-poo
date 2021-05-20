<?php
require __DIR__ . '/partials/themeStart.php';

// On se connecte à la DB
$pdo = new PDO('mysql:dbname=php-poo-blog;host=localhost', 'root', '');

// On créé une requête SQL
$sql = 'SELECT * FROM articles';
// On prépare notre requête SQL
$request = $pdo->prepare($sql);
// On exécute la requête
$request->execute();
// On récupère les articles
$articles = $request->fetchAll();
?>

<h1>Bienvenue</h1>

<?php foreach ($articles as $article) : ?>
    <div class="card my-3">
        <div class="card-body">
            <h5 class="card-title"><?= $article['title'] ?></h5>
            <p class="card-text"><?= $article['description'] ?></p>
            <a href="./index.php?page=article&id=<?= $article['id'] ?>" class="btn btn-primary">Lire cette article</a>
        </div>
    </div>
<?php endforeach; ?>

<?php
require __DIR__ . '/partials/themeEnd.php';
?>