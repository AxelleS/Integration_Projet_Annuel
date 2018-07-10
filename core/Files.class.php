<?php

class Files {

    public static function uploadPicture($files){
        //Extensions autorisees
        $tabExt = array('jpg','gif','png','jpeg');

        $erreur = [];

        // On verifie si le champ est rempli
        if( !empty($files['name']) )
        {
            // Recuperation de l'extension du fichier
            $extension  = pathinfo($files['name'], PATHINFO_EXTENSION);
            // On verifie l'extension du fichier
            if(!in_array(strtolower($extension),$tabExt)) {
                array_push($erreur, 'Extension refusée');
            }

            // On recupere les dimensions du fichier
            $infosImg = getimagesize($files['tmp_name']);
            // On verifie le type de l'image
            if($infosImg[2] < 1 && $infosImg[2] > 14) {
                array_push($erreur, 'Le fichier n\'est pas une image');
            }


            // On verifie les dimensions et taille de l'image
            if(($infosImg[0] > WIDTH_MAX) && ($infosImg[1] > HEIGHT_MAX) && (filesize($files['tmp_name']) > MAX_SIZE)) {
                array_push($erreur, 'Le fichier est trop volumineux');
            }

            // Parcours du tableau d'erreurs
            if(isset($files['error']) && UPLOAD_ERR_OK != $files['error'])
            {
                array_push($erreur, 'Une erreur a empéché l\'upload');
            }

            // On renomme le fichier
            $nomImage = uniqid().'.'.$extension;

            if(count($erreur) < 1){
                echo 'fichier : '.$files['tmp_name'];
                echo '<br>';
                echo 'cible : '.TARGET.$nomImage;
                echo '<br>';
                 if(is_writable(TARGET))
                    {
                        echo "Le fiche est accessible en écriture !";
                    }
                    else
                    {
                        echo "Fichier non accessible en écriture !";
                    }
                if(move_uploaded_file($files['tmp_name'], TARGET.$nomImage))
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

    public static function uploadMultiplePicture($files, $nbMaxFiles){
        //Extensions autorisees
        $tabExt = array('jpg','gif','png','jpeg');

        $filesToUpload = [];

        $nbFiles = count($files['name']);

        if($nbFiles > $nbMaxFiles) {
            $nbFiles = $nbMaxFiles;
        }

        for ($i=0; $i<$nbFiles; $i++) {
            $erreur[$i] = [];

            // On verifie si le champ est rempli
            if( !empty($files['name'][$i]) )
            {
                // Recuperation de l'extension du fichier
                $extension  = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
                // On verifie l'extension du fichier
                if(!in_array(strtolower($extension),$tabExt)) {
                    array_push($erreur[$i], 'Extension refusée');
                }

                // On recupere les dimensions du fichier
                $infosImg = getimagesize($files['tmp_name'][$i]);
                // On verifie le type de l'image
                if($infosImg[2] < 1 && $infosImg[2] > 14) {
                    array_push($erreur[$i], 'Le fichier n\'est pas une image');
                }


                // On verifie les dimensions et taille de l'image
                if(($infosImg[0] > WIDTH_MAX) && ($infosImg[1] > HEIGHT_MAX) && (filesize($files['tmp_name'][$i]) > MAX_SIZE)) {
                    array_push($erreur[$i], 'Le fichier est trop volumineux');
                }

                // Parcours du tableau d'erreurs
                if(isset($files['error'][$i]) && UPLOAD_ERR_OK != $files['error'][$i])
                {
                    array_push($erreur[$i], 'Une erreur a empéché l\'upload');
                }

                // On renomme le fichier
                $nomImage = uniqid().'.'.$extension;

                if(count($erreur[$i]) < 1){
                    if(move_uploaded_file($files['tmp_name'][$i], TARGET.$nomImage))
                    {
                        $filesToUpload[] = TARGET.$nomImage;
                    }
                    else
                    {
                        array_push($erreur[$i], 'L\'upload a échoué');
                    }
                }

            }
            else
            {
                array_push($erreur[$i], 'Aucun fichier fournis');
            }
        }

        if(count($erreur) < 1){
            return $erreur;
        } else {
            return $filesToUpload;
        }
    }

    public static function uploadDoc($files){
        //Extensions autorisees
        $tabExt = array('pdf');

        $erreur = [];

        // On verifie si le champ est rempli
        if( !empty($files['name']) )
        {
            // Recuperation de l'extension du fichier
            $extension  = pathinfo($files['name'], PATHINFO_EXTENSION);
            // On verifie l'extension du fichier
            if(!in_array(strtolower($extension),$tabExt)) {
                array_push($erreur, 'Extension refusée');
            }

            // Parcours du tableau d'erreurs
            if(isset($files['error']) && UPLOAD_ERR_OK != $files['error'])
            {
                array_push($erreur, 'Une erreur a empéché l\'upload');
            }

            // On renomme le fichier
            $nomDoc = uniqid().'.'.$extension;

            if(count($erreur) < 1){
                echo 'fichier : '.$files['tmp_name'];
                echo '<br>';
                echo 'cible : '.TARGET.$nomDoc;
                echo '<br>';
                if(is_writable(TARGET))
                    {
                        echo "Le fiche est accessible en écriture !";
                    }
                    else
                    {
                        echo "Fichier non accessible en écriture !";
                    }
                if(move_uploaded_file($files['tmp_name'], TARGET.$nomDoc))
                {
                    return TARGET.$nomDoc;
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
