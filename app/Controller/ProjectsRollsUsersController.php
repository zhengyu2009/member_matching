<?php
App::uses('AppController', 'Controller');

class ProjectsRollsUsersController extends AppController {
    public $uses = array('User', 'ProjectsRollsUser');
    public $autoRender = false;

    public function ajaxCall() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_SESSION['login_user_id'])) {
            $login_user_id = $_SESSION['login_user_id'];
        } else {
            // $this->redirect(array('controller' => 'FbAuth', 'action' => 'login'));
        }

        if($this->request->is('ajax')) {
            // $this->log($this->request->data);
            $rolls = explode(",", $this->request->data['rollList']);
            foreach($rolls as $roll){
                $option = array(
                    'project_id' => $this->request->data['project_id'],
                    'roll_id' => $roll,
                    'user_id' => $login_user_id
                );
                $this->ProjectsRollsUser->create();
                $this->ProjectsRollsUser->save($option);
//                return $this->data[];
            }

        }
    }
}