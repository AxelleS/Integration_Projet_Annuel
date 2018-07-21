<?php

class SignUpController
{
    public function indexAction($params)
    {
        //Appelle la vue
        if ($_SESSION['is_connected']) {
            $v = new View('customerreservations','connected');
        } else {
            $user = new User();

            $config = $user->configFormUserSignup([]);
            $v = new View('signup');
            $v->assign('config',$config);
        }
    }

    public function mailAction($params){
        $user = new User();
        $user->setId($_SESSION['id_user']);
        $request = $user->select('id');
        $donnees = $request->fetch();
        

        $company = new Homepage();
        $donnees_company = $company->select()->fetch();
        $validateUrl = 'https://www.play-with-my-cms.ovh/valider-inscription/'.$donnees['id'].'/'.$donnees['token'];
        $subject = 'Confirmation d\'inscription';
        $body = 'Bonjour,<br>Nous vous confirmons votre inscription.<br>Votre identifiant : <b>'.$donnees['email'].'</b><br>Votre mot de passe : <b>Celui que vous avez choisi</b><br>Confirmez votre inscription <a href='.$validateUrl.'> en cliquant ici</a>, ou en copiant ce lien dans votre navigateur : '.$validateUrl;

        Data::sendMail($donnees['email'], $donnees_company['email_company'], $donnees_company['name_company'], $subject, $body);

        header("Location: ".DIRNAME.Route::getSlug('customerreservations','index'));
    }
}
