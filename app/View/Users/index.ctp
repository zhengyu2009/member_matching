<div class="users index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('ユーザ一覧'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->


	<div class="row">
<!--		<div class="col-md-3">	-->
<!--			<div class="actions">	-->
<!--				<div class="panel panel-default">	-->
<!--					<div class="panel-heading"><?php echo __('Actions'); ?></div>	-->
<!--						<div class="panel-body">	-->
<!--							<ul class="nav nav-pills nav-stacked">	-->
<!--								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New User'), array('action' => 'add'), array('escape' => false)); ?></li>	-->
<!--								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Areas'), array('controller' => 'areas', 'action' => 'index'), array('escape' => false)); ?> </li>	-->
<!--		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Area'), array('controller' => 'areas', 'action' => 'add'), array('escape' => false)); ?> </li>	-->
<!--		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Projects'), array('controller' => 'projects', 'action' => 'index'), array('escape' => false)); ?> </li>	-->
<!--		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Project'), array('controller' => 'projects', 'action' => 'add'), array('escape' => false)); ?> </li>	-->
<!--		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Industries'), array('controller' => 'industries', 'action' => 'index'), array('escape' => false)); ?> </li>	-->
<!--		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Industry'), array('controller' => 'industries', 'action' => 'add'), array('escape' => false)); ?> </li>	-->
<!--		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Rolls'), array('controller' => 'rolls', 'action' => 'index'), array('escape' => false)); ?> </li>	-->
<!--		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Roll'), array('controller' => 'rolls', 'action' => 'add'), array('escape' => false)); ?> </li>	-->
<!--		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Skills'), array('controller' => 'skills', 'action' => 'index'), array('escape' => false)); ?> </li>	-->
<!--		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Skill'), array('controller' => 'skills', 'action' => 'add'), array('escape' => false)); ?> </li>	-->
<!--							</ul>	-->
<!--						</div>	--><!-- end body -->
<!--				</div>	--><!-- end panel -->
<!--			</div>	--><!-- end actions -->
<!--		</div>	--><!-- end col md 3 -->

		<div class="col-md-12">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
<!--						<th nowrap><?php echo $this->Paginator->sort('id'); ?></th>	-->
						<th nowrap><?php echo $this->Paginator->sort('created'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('modified'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('username'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('email'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('url'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('facebook'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('twitter'); ?></th>
<!--					<th nowrap><?php echo $this->Paginator->sort('password'); ?></th>	-->
						<th nowrap><?php echo $this->Paginator->sort('area_id'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('abstract'); ?></th>
<!--						<th nowrap><?php echo $this->Paginator->sort('profile'); ?></th>-->
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($users as $user): ?>
					<tr>
<!--					<td nowrap><?php echo h($user['User']['id']); ?></td>	-->
						<td nowrap><?php echo h($user['User']['created']); ?>&nbsp;</td>
						<td nowrap><?php echo h($user['User']['modified']); ?>&nbsp;</td>
						<td nowrap><?php echo h($user['User']['username']); ?>&nbsp;</td>
						<td nowrap><?php echo h($user['User']['email']); ?>&nbsp;</td>
						<td nowrap><?php echo h($user['User']['url']); ?>&nbsp;</td>
						<td nowrap><?php echo h($user['User']['facebook']); ?>&nbsp;</td>
						<td nowrap><?php echo h($user['User']['twitter']); ?>&nbsp;</td>
<!--					<td nowrap><?php echo h($user['User']['password']); ?>&nbsp;</td>	-->
								<td>
			<?php echo $this->Html->link($user['Area']['areaname'], array('controller' => 'areas', 'action' => 'view', $user['Area']['id'])); ?>
		</td>
						<td nowrap><?php echo h($user['User']['abstract']); ?>&nbsp;</td>
<!--					<td nowrap><?php echo h($user['User']['profile']); ?></td>	-->
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $user['User']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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

		</div> <!-- end col md 12 -->
	</div><!-- end row -->
</div><!-- end containing of content -->