<!-- javascript file for searching by map -->
<?php $this->Html->scriptStart(array('inline' => false)); ?>

//scriptタグは自動でできます。
alert('テストだよ');
<?php $this->Html->scriptEnd(); ?>

<div class="projects index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Projects'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Project'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Industries'), array('controller' => 'industries', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Industry'), array('controller' => 'industries', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Rolls Users'), array('controller' => 'rolls_users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Rolls User'), array('controller' => 'rolls_users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Rolls'), array('controller' => 'rolls', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Roll'), array('controller' => 'rolls', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Skills'), array('controller' => 'skills', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Skill'), array('controller' => 'skills', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th nowrap><?php echo $this->Paginator->sort('id'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('created'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('modified'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('title'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('description'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('industry_id'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody id="content">
				<div id="wrap">
					<h2>Search By Projects</h2>
					<div id="contents" class="search">
						<div id="contentsLeft">
							<h3>Search By Map</h3>
							<?php echo $this->Form->create('User', array('role' => 'form')); ?>
							<!--<form action="search" method="post" name="form1">-->
								<div class="contentsInner areaSearchBox">
									<div class="areaMapBox">
										<ul>
											<li class="foreign"><input type="checkbox" name="area[]" value="12" checked="checked"></li>
											<li class="hokkaido"><input type="checkbox" name="area[]" value="1" checked="checked"></li>
											<li class="all"><input type="checkbox" name="area[]" value="999" checked="checked" onclick="Box2_Checked();"></li>
											<li class="tohoku"><input type="checkbox" name="area[]" value="2" checked="checked"></li>
											<li class="okinawa"><input type="checkbox" name="area[]" value="11" checked="checked"></li>
											<li class="shinetsu"><input type="checkbox" name="area[]" value="3" checked="checked"></li>
											<li class="kyusyu"><input type="checkbox" name="area[]" value="10" checked="checked"></li>
											<li class="chu-shi">
												<p class="chugoku"><input type="checkbox" name="area[]" value="8" checked="checked"></p>
												<p class="shikoku"><input type="checkbox" name="area[]" value="9" checked="checked"></p>
											</li>
											<li class="kansai"><input type="checkbox" name="area[]" value="7" checked="checked"></li>
											<li class="hoku-to">
												<p class="hokuriku"><input type="checkbox" name="area[]" value="4" checked="checked"></p>
												<input type="checkbox" name="area[]" value="6" checked="checked">
											</li>
											<li class="kanto"><input type="checkbox" name="area[]" value="5" checked="checked"></li>
										</ul>
									</div>
								</div>
								<h3>Search By Industries</h3>
								<div class="form-group">
									<?php echo $this->Form->input('Industry', array('class' => 'form-control', 'placeholder' => 'Select industries'));?>
								</div>
								<h3>Search By Skills</h3>
								<div class="form-group">
									<?php echo $this->Form->input('Skill', array('class' => 'form-control', 'placeholder' => 'Select your skills'));?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->submit(__('Search'), array('class' => 'btn btn-default')); ?>
								</div>

								<?php echo $this->Form->end() ?>
							<hr>
				<?php foreach ($projects as $project): ?>
					<tr>
						<td nowrap><?php echo h($project['Project']['id']); ?>&nbsp;</td>
						<td nowrap><?php echo h($project['Project']['created']); ?>&nbsp;</td>
						<td nowrap><?php echo h($project['Project']['modified']); ?>&nbsp;</td>
						<td nowrap><?php echo h($project['Project']['title']); ?>&nbsp;</td>
						<td nowrap><?php echo h($project['Project']['description']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($project['User']['username'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($project['Industry']['industryname'], array('controller' => 'industries', 'action' => 'view', $project['Industry']['id'])); ?>
		</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $project['Project']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $project['Project']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $project['Project']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->