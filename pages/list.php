<?php
require __DIR__ . '/partials/themeStart.php';

// Ici, au lieu d'utiliser PDO nous pouvons utiliser
// notre instance de ArticleTable: $articleTable.

// Faire en sorte que le code suivant fonctionne
// $articles = $articleTable->findAll();

// // On se connécte à la base de données
// $pdo = new PDO('mysql:dbname=php-poo-blog;host=mysql', 'root', 'root');

// // On créé une requète SQL pour récupérer tout les articles
// $sql = 'SELECT * FROM articles ORDER BY id DESC';

// // On prépare notre requète SQL
// $request = $pdo->prepare($sql);

// // On éxecute la requète
// $request->execute();

// // On récupére tout les articles
// $articles = $request->fetchAll();

$articles = $articleTable->findAll();

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