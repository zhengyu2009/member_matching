   <nav class="navbar navbar-inverse navbar-fixed-top"">

     <div class="container">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">メニュー</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li>
            <div class="navbar-brand visible-xs">
                <?php echo $this->Html->link(__('Mecci'), array('controller' => 'Tops', 'action' => 'index'), array('class' => 'navbar-brand')); ?>
                <!--<a class="navbar-brand" href="/member_matching/">Mecci</a>-->
            </div>
            </li>

            <li><?php echo $this->Html->link(__('プロジェクトを探す'), array('controller' => 'Projects', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('ユーザーを探す'), array('controller' => 'Users', 'action' => 'index')); ?></li>

            <li>
            <div class="navbar-brand hidden-xs">
              <?php echo $this->Html->image('logo.png'); ?>
            </div>
            </li>

            <li><?php echo $this->Html->link(__('リソース一覧'), array('controller' => 'Tops', 'action' => 'resource')); ?></li>
            <?php if(isset($_SESSION['fb_user_id'])){
                    $login_user_id = $this->requestAction('FbAuth/fbCallback');
                    //echo '<li><a href="">マイページ</a></li>';
                    echo '<li>' . $this->Html->link(__('マイページ'), array('controller' => 'Users', 'action' => 'view', $login_user_id)) . '</li>';
                    $logoutUrl = 'https://mecci2-zhengyuc9.c9users.io/FbAuth/logout';
                    echo '<li><a href="' . $logoutUrl . '">ログアウト</a></li>';
            
                } else {
                    $loginUrl = $this->requestAction('Tops/index');
                    echo '<li><a href="' . $loginUrl . '">facebookでログイン</a></li>';
                }
            ?>
            <!--<li><?php //echo $this->Html->link(__('facebookでログイン'), array('controller' => 'FbAuth', 'action' => 'login')); ?></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<!--

    <nav class="navbar navbar-inverse navbar-main">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
<!--        <div class="navbar-header">
          <a class="navbar-brand visible-xs" href="index.php">Logo</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="about-us.php">About Us</a></li>
            <li><a href="media.php">Media</a></li>
            <li><a href="events.php">Events</a></li>
          </ul>
          <div class="navbar-brand hidden-xs">
            <a class="white-circle" href="index.php">
              <img class="logo" src="http://excitive.me/demo/temp/logo.svg" alt="Logo">
            </a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="things-to-do.php">Things To Do</a></li>
            <li><a href="offers.php">Offers</a></li>
            <li><a href="index.php#location">Location</a></li>
            <li><a href="book-now.php">Book Now</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
