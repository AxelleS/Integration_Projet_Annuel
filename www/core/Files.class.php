<?php

class Files {

    public static function upload($file){
        //Extensions autorisees
        $tabExt = array('jpg','gif','png','jpeg');

        $erreur = [];

        // On verifie si le champ est rempli
        if( !empty($_FILES['picture']['name']) )
        {
            // Recuperation de l'extension du fichier
            $extension  = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            // On verifie l'extension du fichier
            if(!in_array(strtolower($extension),$tabExt)) {
                array_push($erreur, 'Extension refusée');
            }

            // On recupere les dimensions du fichier
            $infosImg = getimagesize($_FILES['picture']['tmp_name']);
            // On verifie le type de l'image
            if($infosImg[2] < 1 && $infosImg[2] > 14) {
                array_push($erreur, 'Le fichier n\'est pas une image');
            }


            // On verifie les dimensions et taille de l'image
            if(($infosImg[0] > WIDTH_MAX) && ($infosImg[1] > HEIGHT_MAX) && (filesize($_FILES['picture']['tmp_name']) > MAX_SIZE)) {
                array_push($erreur, 'Le fichier est trop volumineux');
            }

            // Parcours du tableau d'erreurs
            if(isset($_FILES['picture']['error']) && UPLOAD_ERR_OK != $_FILES['picture']['error'])
            {
                array_push($erreur, 'Une erreur a empéché l\'upload');
            }

            // On renomme le fichier
            $nomImage = uniqid().'.'.$extension;

            if(count($erreur) < 1){
                if(move_uploaded_file($_FILES['picture']['tmp_name'], TARGET.$nomImage))
                {
                    return TARGET.$nomImage;
                }
                else
                {
                    array_push($erreur, 'L\'upload a échoué');
                }
            }

        }
        else
        {
            array_push($erreur, 'Aucun fichier fournis');
        }

        return $erreur;
    }
}