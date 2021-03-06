<?php
class TopsController extends AppController {

    public $uses = array('Project', 'User');

    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // if(!defined('FACEBOOK_SDK_V4_SRC_DIR')){
        //     define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/../Vendor/facebook/src/Facebook');
        // }
        // require_once __DIR__ . '/../Vendor/facebook/src/Facebook/autoload.php';

        // $fb = new Facebook\Facebook([
        //     'app_id' => '1681825805467397',
        //     'app_secret' => '72640533266ffc04d8e3ca2708a13c5d',
        //     'default_graph_version' => 'v2.8',
        // ]);

        // $baseUrl = Router::fullBaseUrl();
        // // $this->log($baseUrl);
        // $fbCallBackUrl = $baseUrl . '/FbAuth/fbCallback';

        // $helper = $fb->getRedirectLoginHelper();
        // $permissions = ['email', 'user_likes']; // optional
        // $loginUrl = $helper->getLoginUrl($fbCallBackUrl, $permissions);
        // $this->set('loginUrl', $loginUrl);
        // $logoutUrl = $baseUrl . '/FbAuth/logout';
        // $this->set('logoutUrl', $logoutUrl);

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
        $title_for_layout = 'Mecciへようこそ！';
        $this->set(compact('title_for_layout'));
    }




    public function resource() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function test() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

    public function test2() {
        echo 'aaaa';


    if(isset($_POST['imagebase64'])){
        $data = $_POST['imagebase64'];

        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        file_put_contents('image64.png', $data);
    }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}