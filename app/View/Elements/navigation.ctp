    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link(__('Mecci'), array('controller' => 'Tops', 'action' => 'index'), array('class' => 'navbar-brand')); ?>
          <!--<a class="navbar-brand" href="/member_matching/">Mecci</a>-->
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo $this->Html->link(__('プロジェクト一覧'), array('controller' => 'Projects', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('ユーザー一覧'), array('controller' => 'Users', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('リソース'), array('controller' => 'Tops', 'action' => 'resource')); ?></li>
            <li><?php echo $this->Html->link(__('facebookでログイン'), array('controller' => 'FbAuth', 'action' => 'login')); ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>