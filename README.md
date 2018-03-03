#Projet annuel

Pré-requis
----------

* Avoir un environnement AMP
* Avoir Node.js
* Avoir Node Package Manager (NPM)


Installation
------------

Une fois dans la racine du projet, vous devez:

1. Installer les modules dans le package.json

    `npm install`

1. 3 possibilitées:

    `npm run build-css`

	`npm run uglify-css`

	`npm run watch-css`

1. La première permet de compiler une fois le scss en css
1. La deuxième est en cours de développement
1. La troisième permet de compiler le scss en css à chaques modifications des fichiers (à utiliser en priorité)

Organisation fichier scss

SCSS
-----

* Chaques fichier scss réalisé doit avoir le format suivant : `_mon-fichier.scss` (ne pas oublier le `_` devant)

* Ne pas oublier de l'importer dans le fichier main.scss (la compilation en css ne le prendra pas en compte sinon)