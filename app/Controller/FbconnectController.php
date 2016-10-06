<?php
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/Vendor/facebook/src/Facebook');
require_once __DIR__ . '/Vendor/facebook/src/Facebook/autoload.php';
//【1】facebook認証
App::uses('AppController', 'Controller');
App::import('Vendor','facebook',array('file' => 'facebook'.DS.'src'.DS.'Facebook'.DS.'Facebook'));

class FbconnectController extends AppController {
    public $name = 'Fbconnect';

    function index(){

    }

    function showdata(){//トップページ
        $facebook = $this->createFacebook(); //【2】アプリに接続
        $myFbData = $this->Session->read('mydata');       //【3】facebookのデータ
        $this->set('myFbData', $myFbData);
    }

    //facebookの認証処理部分
    public function facebook(){

        $fb = new Facebook\Facebook([
            'app_id' => '266963893454884',
            'app_secret' => '12f990b8abc3a6763c6144ad1422716e',
            'default_graph_version' => 'v2.5',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $helper->getLoginUrl('http://{your-website}/login-callback.php', $permissions);

        echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';


//        $this->autoRender = false;
//        $this->facebook = $this->createFacebook();
////        facebook = $this->createFacebook();
//        $user = $this->facebook->getUser();       //【4】ユーザ情報取得
//        if($user){//認証後
//            $me = $this->facebook->api('/me','GET',array('locale'=>'ja_JP'));  //【5】ユーザ情報を日本語で取得
//            $this->Session->write('mydata',$me);      //【6】ユーザ情報をセッションに保存
//            $this->redirect('showdata');
//        }else{//認証前
//            $url = $this->facebook->getLoginUrl(array(
//                'scope' => 'email,publish_stream,user_birthday','canvas' => 1,'fbconnect' => 0));   //【7】スコープの確認
//            $this->redirect($url);
//        }
    }

    private function createFacebook() {        //【8】appID, secretを記述
        return new Facebook(array(
            'appId' => 'xxxxxxxxxxxxxxxxxxx',
            'secret' => 'xxxxxxxxxxxxxxxxxxx'
        ));
    }
}