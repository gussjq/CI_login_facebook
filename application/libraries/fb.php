<?php

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

class fb {

    public $me;
    public $helper;

    public function initialize() {
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
        $this->helper = new FacebookRedirectLoginHelper(FACEBOOK_URL_REDIRECT);

        try {
            $session = $this->helper->getSessionFromRedirect();
            if ($session) {
                $_SESSION['facebook'] = $session->getToken();
            }
            if (isset($_SESSION['facebook'])) {
                $session = new FacebookSession($_SESSION['facebook']);
                $this->me = (new FacebookRequest($session, 'GET', '/me'))
                        ->execute()
                        ->getGraphObject(GraphUser::className());
            }
        } catch (FacebookRequestException $e) {
            echo "Exception occured, code: " . $e->getCode();
            echo " with message: " . $e->getMessage(); 
            exit();
        } catch (Exception $exc) {
            
        }
    }
    
    public function get_scopes(){
        return array('email','read_friendlists','user_online_presence');
    }
    
}
