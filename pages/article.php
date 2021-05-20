<?php
require __DIR__ . '/partials/themeStart.php';

// On se connecte à la DB
$pdo = new PDO('mysql:dbname=php-poo-blog;host=localhost', 'root', '');

// On créé une requête SQL
$sql = 'SELECT * FROM articles WHERE id = ?';
// On prépare notre requête SQL
$request = $pdo->prepare($sql);
// On exécute la requête
$request->execute([ $_GET['id']]);
// On récupère UN seul article.
$articles = $request->fetch(PDO::FETCH_ASSOC);
?>

<h1><?php $article['title']?></h1>
<p><?php $article['article']?></p>
<?php
require __DIR__ . '/partials/themeEnd.php';
?>