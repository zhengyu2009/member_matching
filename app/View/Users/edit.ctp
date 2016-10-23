<?php
$this->Html->addCrumb('ユーザーを探す', array('controller'=>'users','action'=>'index'));
$this->Html->addCrumb('ユーザー'.$users['User']['username'].'の情報編集');
;?>
<div class="users form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('ユーザーの情報編集'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-9">
			<?php echo $this->Form->create('User', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Username'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('url', array('class' => 'form-control', 'placeholder' => 'Url'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('facebook', array('class' => 'form-control', 'placeholder' => 'Facebook'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('twitter', array('class' => 'form-control', 'placeholder' => 'Twitter'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('area_id', array('class' => 'form-control', 'placeholder' => 'Area Id'));?>
				</div>
<!--			--><?php //echo $this->Form->label('Area.Area', '活動エリアを選んでください');?>
<!--			<div class="form-horizontal">-->
<!--				<div class="form-group">-->
<!--					<div class="checkbox">-->
<!--						--><?php //echo $this->Form->input('area_id', array('label' => false,'class' => 'col-sm-2','type' => 'checkbox')); ?>
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
				<div class="form-group">
					<?php echo $this->Form->input('abstract', array('class' => 'form-control', 'placeholder' => 'Abstract'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('profile', array('type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Profile'));?>
				</div>
			<?php echo $this->Form->label('Industry.Industry', '参画したい業界を選んでください（複数選択可）');?>
			<div class="form-horizontal">
				<div class="form-group">
					<div class="checkbox">
					<?php echo $this->Form->input('Industry', array('label' => false, 'class' => 'col-sm-2', 'multiple' => 'checkbox'));?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->label('Roll.Roll', '担当したいロールを選んでください（複数選択可）');?>
			<div class="form-horizontal">
				<div class="form-group">
					<div class="checkbox">
					<?php echo $this->Form->input('Roll', array('label' => false, 'class' => 'col-sm-4', 'multiple' => 'checkbox'));?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->label('Skill.Skill', '得意スキルを選んでください（複数選択可）');?>
			<div class="form-horizontal">
				<div class="form-group">
					<div class="checkbox">
					<?php echo $this->Form->input('Skill', array('label' => false, 'class' => 'col-sm-4', 'multiple' => 'checkbox'));?>
					</div>
				</div>
			</div>
				<div class="form-group">
					<?php echo $this->Form->input('User.photo', array('type' => 'file'));?>
					<?php echo $this->Form->input('photo_dir', array('type' => 'hidden'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
