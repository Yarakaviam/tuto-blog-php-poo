<?php

/**
 * Nous enregistrons une fonction d'autoload
 * qui nous permettra de ne jamais avoir à utiliser
 * "require"
 */
spl_autoload_register(function ($className) {
    $path = str_replace('\\', '/', $className);

    require_once __DIR__ . '/' . $path . '.php';
});
