<?php

/**
 * La class App est le point d'entré de notre application. C'est
 * l'objet principal !
 */
class App
{
    /**
     * Cette méthode demarre notre application. C'est ici
     * que l'on trouve le code initiale.
     */
    static public function start(): void
    {
        // $_GET permet d'accèder au query string
        // ex: $_GET['page'] retourne la query string "page"
        // la fonction isset(...) permet de tester si un
        // élement est présent dans un tableaux.


        // ETAPE 1 : Nous récupérons le nom de la page demandée
        $pageName = 'list';

        // Ici on test si on a envoyé la query "page"
        if (isset($_GET['page'])) {
            // Si la query page existe dans ce cas nous l'assignons
            // à notre variable page
            $pageName = $_GET['page'];
        }

        // file_exists('/chemin/vers/le/fichier.php') retourne true
        // si le fichier existe, false sinon.

        // ETAPE 2 : Nous affichons la page demandée

        $pagePath = __DIR__ . '/../pages/' . $pageName . '.php';

        if (file_exists($pagePath)) {
            require $pagePath;
        } else {
            require __DIR__ . '/../pages/notFound.php';
        }
    }
}
