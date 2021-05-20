<?php
require __DIR__ . '/partials/themeStart.php';

$success = false;


if (!empty($_POST)) {
    // 1 : Connexion à la DB
    $pdo = new PDO('mysql:dbname=php-poo-blog;host=localhost', 'root', '');
    var_dump('Connecté !');

    // 2 : Requête de création d'article
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    var_dump($title, $description, $content);

    // 3 : Création requête SQL, ne pas concaténer les valeurs directement, utiliser des "?"
    $sql = 'INSERT INTO articles (title, description, content) VALUES (?, ?, ?)';

    // 4 : Préparation de la requête SQL et nous récupéront une requête
    $request = $pdo->prepare($sql);

    // 5 : Envoyer la requête à la DB. Cela enregistre l'article dans la base.
    $request->execute([
        $title,
        $description,
        $content,
    ]);

    $success = true;
}
?>



<h1>Page de création d'un article</h1>

    <div class="alert alert-success" role="alert">
        L'article à bien été créé
    </div>
<form method="POST" action="./index.php?page=newArticle">
    <div class="mb-3">
        <label for="title" class="form-label">Titre de l'article</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description de l'article</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenue de l'article</label>
        <textarea class="form-control" id="content" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>

<?php
require __DIR__ . '/partials/themeEnd.php';
?>