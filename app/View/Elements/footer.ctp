<!-- ===== footer ===== -->
<footer>
  <div class="container">
    <ul class="pages list-unstyled text-center">
        <li><?php echo $this->Html->link(__('Home'), array('controller' => 'Tops', 'action' => 'index')); ?></li>
      <li><?php echo $this->Html->link(__('プロジェクト一覧'), array('controller' => 'Projects', 'action' => 'index')); ?></li>
      <li><?php echo $this->Html->link(__('ユーザー一覧'), array('controller' => 'Users', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('リソース'), array('controller' => 'Tops', 'action' => 'resource')); ?></li>
      <li><?php echo $this->Html->link(__('facebookでログイン'), array('controller' => 'FbAuth', 'action' => 'login')); ?></li>
    </ul>
    <ul class="social_icons list-unstyled text-center">
      <li><i class="fa fa-twitter fa-2x s_icon color_twitter"></i></li>
      <li><i class="fa fa-facebook fa-2x s_icon color_facebook"></i></li>
      <li><i class="fa fa-google-plus fa-2x s_icon color_google_plus"></i></li>
      <li><i class="fa fa-instagram fa-2x s_icon color_instagram"></i></li>
      <li><i class="fa fa-pinterest-p fa-2x s_icon color_pinterest"></i></li>
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


