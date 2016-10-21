<?php
$this->Html->addCrumb('プロジェクト一覧', array('controller'=>'projects','action'=>'index'));
$this->Html->addCrumb('プロジェクト'.$projects['Project']['id'].'の編集');
;?>

<div class="projects form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Project'); ?></h1>
			</div>
		</div>
	</div>

		<div class="col-md-9">
			<?php echo $this->Form->create('Project', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('description', array('type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description'));?>
				</div>
<!--				<div class="form-group">-->
<!--					--><?php //echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
<!--				</div>-->
				<div class="form-group">
					<?php echo $this->Form->input('industry_id', array('class' => 'form-control', 'placeholder' => 'Industry Id'));?>
				</div>

				<?php echo $this->Form->label('Roll.Roll', '募集するロールを選んでください（複数選択可）');?>
				<div class="form-horizontal">
					<div class="form-group">
						<div class="checkbox">
							<?php echo $this->Form->input('Roll', array('label' => false,'class' => 'col-sm-4','multiple' => 'checkbox')); ?>
						</div>
					</div>
				</div>

				<?php echo $this->Form->label('Skill.Skill', '募集するスキルを選んでください（複数選択可）');?>
				<div class="form-horizontal">
					<div class="form-group">
						<div class="checkbox">
							<?php echo $this->Form->input('Skill', array('label' => false,'class' => 'col-sm-2','multiple' => 'checkbox')); ?>
						</div>
					</div>
				</div>

				<?php echo $this->Form->label('Area.Area', '募集エリアを選んでください（複数選択可）');?>
				<div class="form-horizontal">
					<div class="form-group">
						<div class="checkbox">
							<?php echo $this->Form->input('Area', array('label' => false,'class' => 'col-sm-2','multiple' => 'checkbox')); ?>
						</div>
					</div>
				</div>

			<?php
			echo $this->Form->input('photo', array('type' => 'file', 'label'=> 'Project Photo', 'value' => $projects['Project']['photo']));
//			echo $this->Form->input('photo_dir', array('type' => 'hidden'));

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
<?php //$this->log($projects); ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
