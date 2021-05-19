# Blog en php orientée objet

## Concernant le blog

C'est un blog classique qui contient 3 pages.

1. Une page qui liste les articles du blog
2. Une page qui affiche un article du blog
3. Une page qui créé un nouvel article

## Concernant la structure

Chaque page vas passer par notre "index.php". Par éxemple,
pour accèder à la page "liste" nous pouvons taper l'url:
`http://(...)/index.php?page=list` et la page
d'un article : `http://(...)/index.php?page=article&id=2` etc ..

Par défaut si aucune Query "page" est envoyé, la page list sera
affiché.

## Aide & Documentation

- [Les URL](./doc/url.md)
