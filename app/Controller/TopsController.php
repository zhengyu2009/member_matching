<?php
class TopsController extends AppController {

//    var $name = 'Tops';
//
    function index() {
        session_start();
        define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/../Vendor/facebook/src/Facebook');
        require_once __DIR__ . '/../Vendor/facebook/src/Facebook/autoload.php';

        $fb = new Facebook\Facebook([
            'app_id' => '1681825805467397',
            'app_secret' => '72640533266ffc04d8e3ca2708a13c5d',
            'default_graph_version' => 'v2.8',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $helper->getLoginUrl('https://mecci2-zhengyuc9.c9users.io/FbAuth/fbCallback', $permissions);
        $this->set('loginUrl', $loginUrl);
        $logoutUrl = 'https://mecci2-zhengyuc9.c9users.io/FbAuth/logout';
        $this->set('logoutUrl', $logoutUrl);
        // $this->log($loginUrl);
    }
}
?>