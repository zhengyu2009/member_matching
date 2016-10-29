<!-- ===== footer ===== -->
<footer>
    <div class="container">
        <ul class="pages list-unstyled text-center">
            <span class="glyphicon glyphicon-home" style="color: #E0FFF9;"></span>
            <li><?php echo $this->Html->link(__('ホーム'), array('controller' => 'Tops', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('プロジェクトを探す'), array('controller' => 'Projects', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('ユーザーを探す'), array('controller' => 'Users', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('リソース一覧'), array('controller' => 'Tops', 'action' => 'resource')); ?></li>
            <?php if (isset($_SESSION['login_user_id'])) {
//                    $login_user_id = $this->requestAction('FbAuth/fbCallback');
                $login_user_id = $_SESSION['login_user_id'];
                $this->log($login_user_id);
                echo '<li>' . $this->Html->link(__('マイページ'), array('controller' => 'Users', 'action' => 'view', $login_user_id)) . '</li>';
                if (isset($_SESSION['fb_user_id'])) {
                    $logoutUrl = 'https://mecci2-zhengyuc9.c9users.io/FbAuth/logout';
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
        </ul>
        <ul class="social_icons list-unstyled text-center">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-facebook fa-2x s_icon color_facebook"></i></a></li>
            <li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><i class="fa fa-twitter fa-2x s_icon color_twitter"></i></a></li>
            <li><a href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-google-plus fa-2x s_icon color_google_plus"></i></a></li>
            <li><a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><i class="fa fa-pinterest-p fa-2x s_icon color_pinterest"></i></a></li>
        </ul>
    </div>
</footer>

<!-- ===== copyright ===== -->
<div class="copyright">
    <div class="container">
        <p class="text-right">
            Copyright &copy; <a href="/member_matching/">Mecci</a> 2016. All Rights Reserved.
        </p>
    </div>
</div>


