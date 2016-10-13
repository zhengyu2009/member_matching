<?php session_start(); ?>
<div class="users form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('ユーザー登録'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
<!--		<div class="col-md-3">-->
<!--			<div class="actions">-->
<!--				<div class="panel panel-default">-->
<!--					<div class="panel-heading">--><?php //echo __('Actions'); ?><!--</div>-->
<!--						<div class="panel-body">-->
<!--							<ul class="nav nav-pills nav-stacked">-->
<!---->
<!--																<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Users'), array('action' => 'index'), array('escape' => false)); ?><!--</li>-->
<!--									<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Areas'), array('controller' => 'areas', 'action' => 'index'), array('escape' => false)); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Area'), array('controller' => 'areas', 'action' => 'add'), array('escape' => false)); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Projects'), array('controller' => 'projects', 'action' => 'index'), array('escape' => false)); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Project'), array('controller' => 'projects', 'action' => 'add'), array('escape' => false)); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Industries'), array('controller' => 'industries', 'action' => 'index'), array('escape' => false)); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Industry'), array('controller' => 'industries', 'action' => 'add'), array('escape' => false)); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Rolls'), array('controller' => 'rolls', 'action' => 'index'), array('escape' => false)); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Roll'), array('controller' => 'rolls', 'action' => 'add'), array('escape' => false)); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Skills'), array('controller' => 'skills', 'action' => 'index'), array('escape' => false)); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Skill'), array('controller' => 'skills', 'action' => 'add'), array('escape' => false)); ?><!-- </li>-->
<!--							</ul>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>			-->
<!--		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<?php echo $this->Form->create('User', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => '実名でお願いします'));?>
				</div>
				<div class="form-group">
				<?php
//                $_SESSION['fb_access_token'] = "jfkdgfkdglkf:;";
                if (! isset($_SESSION['fb_access_token'])) {
                    echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password'));}?>
				</div>
				<div class="form-group">
				<?php echo $this->Form->input('abstract', array('class' => 'form-control', 'placeholder' => 'あなたのことを一言でアピールしてください'));?>
				</div>
				<div class="form-group">
				<?php echo $this->Form->input('area_id', array('class' => 'form-control', 'placeholder' => '活動エリアを選択してください'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('URL', array('class' => 'form-control', 'placeholder' => ''));?>
				</div>
				<div>
				<div class="form-group">
					<?php echo $this->Form->input('facebook', array('class' => 'form-control', 'placeholder' => 'Facebook Page'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('twitter', array('class' => 'form-control', 'placeholder' => 'Twitter'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('profile', array('type' => 'textarea','class' => 'form-control ', 'placeholder' => 'あなたの経歴、得意、やりたいことをここで記入してください'));?>
				</div>


<!--photo-->	<div class="form-group">
						<?php echo $this->Form->input('User.photo', array('type' => 'file'));?>
					</div>
					<!--photo-->	<div class="form-group">
						<?php echo $this->Form->input('photo_dir', array('type' => 'hidden'));?>
					</div>

<!--				<div class="form-group">	-->
<!--				<?php //echo $this->Form->input('Skill', array('class' => 'form-control', 'placeholder' => 'Profile'));?>	-->
<!--                    <?php echo $this->Form->input('skill', array('multiple' => 'checkbox')); ?>	-->
<!--				</div>	-->

				<div class="form-group">
				<?php echo $this->Form->label('Skill.Skill', 'あなたのスキルを選んでください');?>
				<?php echo $this->Form->input('Skill', array('label' => false,'class' => 'col-sm-4','multiple' => 'checkbox')); ?>
				</div>


				<div class="form-group">
				<?php echo $this->Form->input('Roll', array('class' => 'form-control', 'placeholder' => 'Profile'));?>
				</div>

				<div class="form-group">
				<?php echo $this->Form->input('Industry', array('class' => 'form-control', 'placeholder' => 'Profile'));?>
				</div>

				<div class="form-group">
				<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
