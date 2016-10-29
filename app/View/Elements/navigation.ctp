<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">home</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <div id="head_logo01_area_02">
                <a class="navbar-brand" href="/member_matching/" title="Mecci">
                    <img alt="Mecci logo" src="./img/header/logo.png">
                </a>
            </div>
<!--            --><?php //echo $this->Html->link(__('Mecci'), array('controller' => 'Tops', 'action' => 'index'), array('class' => 'navbar-brand')); ?>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
            <li><?php echo $this->Html->link(__('プロジェクトを探す'), array('controller' => 'Projects', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('ユーザーを探す'), array('controller' => 'Users', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('リソース一覧'), array('controller' => 'Tops', 'action' => 'resource')); ?></li>
            <?php if(isset($_SESSION['login_user_id'])){
//                    $login_user_id = $this->requestAction('FbAuth/fbCallback');
                    $login_user_id = $_SESSION['login_user_id'];
                    $this->log($login_user_id);
                    echo '<li>' . $this->Html->link(__('マイページ'), array('controller' => 'Users', 'action' => 'view', $login_user_id)) . '</li>';
                    if(isset($_SESSION['fb_user_id'])) {
                      $baseUrl = Router::url("/", true);
                      $pattern = "/:\d{1,}/";
                      $result = preg_replace($pattern, "", $baseUrl);
                      $logoutUrl = $result . '/FbAuth/logout';
                      echo '<li><a href="' . $logoutUrl . '">ログアウト</a></li>';
                    } else {
                      echo '<li>' . $this->Html->link(__('ログアウト'), array('controller' => 'Users', 'action' => 'logout')) . '</li>';
                    }
            
                } else {
//                    $loginUrl = $this->requestAction('Tops/index');
//                    echo '<li><a href="' . $loginUrl . '">facebookでログイン</a></li>';
                      echo '<li>' . $this->Html->link(__('ログイン'), array('controller' => 'Users', 'action' => 'login')) . '</li>';
                }
            ?>
            <!--<li><?php //echo $this->Html->link(__('facebookでログイン'), array('controller' => 'FbAuth', 'action' => 'login')); ?></li>-->
          </ul>
        </div><!--/.nav-collapse -->
        </div>
    </div>
    </nav>
