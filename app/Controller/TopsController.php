<?php
class TopsController extends AppController {

    public $uses = array('Project', 'User');

    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!defined('FACEBOOK_SDK_V4_SRC_DIR')){
            define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/../Vendor/facebook/src/Facebook');
        }
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

        $options = array(
            'order' => array('Project.created DESC'),
            'limit' => 3
        );
        $this->set('projects', $this->Project->find('all', $options));

        $options = array(
            'order' => array('User.created DESC'),
            'limit' => 3
        );
        $this->set('users', $this->User->find('all', $options));
        
        if ($this->request->is('requested')) {
            return $loginUrl;
        }
    }
    
    public function resource() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}