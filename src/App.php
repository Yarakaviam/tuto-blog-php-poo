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

        $page = 'list';

        // Ici on test si on a envoyé la query "page"
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        // ici afficher la page avec "require" !
        require __DIR__ . '/../pages/' . $page . '.php';
    }
}
