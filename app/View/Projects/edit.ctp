<div class="projects form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Project'); ?></h1>
			</div>
		</div>
	</div>



<!--	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php /*echo __('Actions'); */?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php /*echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Delete'), array('action' => 'delete', $this->Form->value('Project.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Project.id'))); */?></li>
																<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Projects'), array('action' => 'index'), array('escape' => false)); */?></li>
									<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); */?> </li>
		<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); */?> </li>
		<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Industries'), array('controller' => 'industries', 'action' => 'index'), array('escape' => false)); */?> </li>
		<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Industry'), array('controller' => 'industries', 'action' => 'add'), array('escape' => false)); */?> </li>
		<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Rolls Users'), array('controller' => 'rolls_users', 'action' => 'index'), array('escape' => false)); */?> </li>
		<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Rolls User'), array('controller' => 'rolls_users', 'action' => 'add'), array('escape' => false)); */?> </li>
		<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Rolls'), array('controller' => 'rolls', 'action' => 'index'), array('escape' => false)); */?> </li>
		<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Roll'), array('controller' => 'rolls', 'action' => 'add'), array('escape' => false)); */?> </li>
		<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Skills'), array('controller' => 'skills', 'action' => 'index'), array('escape' => false)); */?> </li>
		<li><?php /*echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Skill'), array('controller' => 'skills', 'action' => 'add'), array('escape' => false)); */?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div>--><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Project', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('industry_id', array('class' => 'form-control', 'placeholder' => 'Industry Id'));?>
				</div>
<!--				<div class="form-group">-->
<!--					--><?php //echo $this->Form->input('Industry', array('class' => 'form-control', 'placeholder' => 'Industry Id'));?>
<!--				</div>-->
<!--				<div class="form-group">-->
<!--					--><?php //echo $this->Form->input('RollsUser', array('class' => 'form-control', 'placeholder' => 'Industry Id'));?>
<!--				</div>-->
<!--				<div class="form-group">
					<?php /*echo $this->Form->input('Roll', array('class' => 'form-control', 'placeholder' => 'Roll Id'));*/?>
				</div>-->
			<div class="form-group">
				<?php echo $this->Form->label('Roll.Roll', '募集するロールを選んでください（複数選択可）');?>
				<?php echo $this->Form->input('Roll', array('label' => false,'class' => 'checkbox-inline','multiple' => 'checkbox')); ?>
			</div>

<!--				<div class="form-group">
					<?php /*echo $this->Form->input('Skill', array('class' => 'form-control', 'placeholder' => 'Industry Id'));*/?>
				</div>-->
			<div class="form-group">
				<?php echo $this->Form->label('Skill.Skill', '募集するスキルを選んでください（複数選択可）');?>
				<?php echo $this->Form->input('Area', array('label' => false,'class' => 'checkbox-inline','multiple' => 'checkbox')); ?>
			</div>
<!--                    <div class="form-group">
                        <?php /*echo $this->Form->input('Area', array('class' => 'form-control', 'placeholder' => 'Area Id'));*/?>
                    </div>
					-->
			<div class="form-group">
				<?php echo $this->Form->label('Area.Area', '募集エリアを選んでください（複数選択可）');?>
				<?php echo $this->Form->input('Area', array('label' => false,'class' => 'checkbox-inline','multiple' => 'checkbox')); ?>
				<br>
			</div>
			<?php echo $this->Form->input('photo', array('type' => 'file', 'label'=> 'Project Photo'));
			echo '【現在選択中の画像】<br> ';
			$base = $this->Html->url( '/../files/project/photo/');
			echo $base.$projects['Project']['photo_dir'].'/' . $projects['Project']['photo'] . '<br>';
			echo $this->Html->image($base.$projects['Project']['photo_dir'].'/' . $projects['Project']['photo'], array('class' => 'book-icon', 'alt' => $projects['Project']['title'], 'width' => '100px'));
			echo $this->Form->input('photo_dir', array('type' => 'hidden'));
			?>
                    <div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>
<?php $this->log($projects); ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
