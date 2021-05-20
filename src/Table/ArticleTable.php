<?php

namespace Table;

use PDO;
use Exception;

/**
 * Cette class permet de récupérer ainsi que de créer des articles
 */
class ArticleTable
{
    /**
     * On définie un attribut (une variable dans une class)
     * privée pour stocker un objet PDO.
     */
    private PDO $pdo;

    /**
     * On définie un constructeur qui recoie un objet PDO
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Cette méthode permet de récupérer l'intégralité des articles
     * de la base de données
     */
    public function findAll(): array
    {
    

    // On créé une requète SQL pour récupérer tout les articles
        $sql = 'SELECT * FROM articles ORDER BY id DESC';

        // On prépare notre requète SQL
        $request = $this->pdo->prepare($sql);

        // On éxecute la requète
        $request->execute();

        // On récupére tout les articles
        $articles = $request->fetchAll();
        

        return $articles;
    }

    /**
     * Cette méthode permet de récupérer qu'un seul article !
     */
    public function findOne(int $id): array
    {
        $sql = 'SELECT * FROM articles WHERE id = ?';

        // On prépare notre requète SQL
        $request = $this->pdo->prepare($sql);

        // On éxecute la requète
        $request->execute([$_GET['id']]);

        // On récupére tout les articles
        $article = $request->fetch(PDO::FETCH_ASSOC);
        if (empty($article)) {
            throw new Exception('Article not found');
        }
        return $article;
    }

    /**
     * Cette méthode permet de créer un nouvel article
     */
    public function createOne(
        string $title,
        string $description,
        string $content
    ): void {
        // 3 : Création requête SQL, ne pas concaténer les valeurs directement, utiliser des "?"
        $sql = 'INSERT INTO articles (title, description, content) VALUES (?, ?, ?)';

        // 4 : Préparation de la requête SQL et nous récupéront une requête
        $request = $this->pdo->prepare($sql);

        // 5 : Envoyer la requête à la DB. Cela enregistre l'article dans la base.
        $request->execute([
        $title,
        $description,
        $content
    ]);
    }
}
