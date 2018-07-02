#Projet annuel

Pré-requis
----------

* Avoir un environnement AMP
* Avoir Node.js
* Avoir Node Package Manager (NPM)


Installation
------------

Une fois dans la racine du projet, vous devez:

1. lancer la commande suivante

    `docker-compose up --build -d`

1. vérifier que les 3 container sont lancer avec: 

    `docker ps`

1. Toujours à la racine du projet, nous allons devoir installer sur le container notre npm

    `docker exec -it apache-mvc bash`

1. Puis lancer les commandes suivantes : 

    `npm install`
    `npm rebuild node-sass`
    `npm run watch-css`

1. 1 possibilitée:

	`npm run watch-css`

1. Elle permet de lancer un watch sur la compilation du scss en css

Organisation fichier scss

SCSS
-----

* Chaques fichier scss réalisé doit avoir le format suivant : `_mon-fichier.scss` (ne pas oublier le `_` devant)

* Ne pas oublier de l'importer dans le fichier main.scss (la compilation en css ne le prendra pas en compte sinon)
