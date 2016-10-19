<?php
App::uses('Controller', 'AppController');

class FbAuthController extends AppController {

    public $autoRender = false;
    public $uses = array('User');

    //直接に使ってない
    public function login() {
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

        echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
    }

    public function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        return $this->redirect(array('controller' => 'Tops', 'action' => 'index'));
    }

    public function fbCallback() {
        session_start();
        define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/../Vendor/facebook/src/Facebook');
        require_once __DIR__ . '/../Vendor/facebook/src/Facebook/autoload.php';

        $fb = new Facebook\Facebook([
            'app_id' => '1681825805467397',
            'app_secret' => '72640533266ffc04d8e3ca2708a13c5d',
            'default_graph_version' => 'v2.8',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (! isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

        $oAuth2Client = $fb->getOAuth2Client();

        if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }

            echo '<h3>Long-lived</h3>';
        }

        $_SESSION['fb_access_token'] = (string) $accessToken;

        try {
            $response = $fb->get('/me?fields=id,name,email,picture', $accessToken);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $repBody = $response->getDecodedBody();
        $fbUserId = $_SESSION['fb_user_id'] = $repBody['id'];
        $_SESSION['fb_user_name'] =  $repBody['name'];
        $_SESSION['fb_user_email'] =  $repBody['email'];
        $fbPicUrl = "https://graph.facebook.com/$fbUserId/picture?type=large";
        
        $options = array('conditions' => array('User.fb_user_id' => $fbUserId));
        $userInfo = $this->User->find('first', $options);
//        $this->log($userInfo);
        if($userInfo) {
            $_SESSION['login_user_id'] = $userInfo['User']['id'];
            // $_SESSION['login_user_id'] = 2;//テスト用
            return $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
        } else {
            $_SESSION['is_new_user'] = true;
            return $this->redirect(array('controller' => 'Users', 'action' => 'add'));
        }
    }
}