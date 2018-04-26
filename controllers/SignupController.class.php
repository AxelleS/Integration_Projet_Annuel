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

            $config = $user->configFormUserAddModify();
            $v = new View('signup');
            $v->assign('config',$config);
        }
    }

    public function saveAction($params){
    
    }

    public function saveAction($params){}
}
