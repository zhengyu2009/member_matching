<div class="users index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('ユーザ一覧'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->


	<div class="row">
		<div class="col-md-12">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
<!--						<th nowrap><?php echo $this->Paginator->sort('id'); ?></th>	-->
<!--						<th nowrap>--><?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
<!--						<th nowrap>--><?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
						<th nowrap><?php echo $this->Paginator->sort('ユーザー'); ?></th>
<!--						<th nowrap>--><?php //echo $this->Paginator->sort('email'); ?><!--</th>-->
						<th nowrap><?php echo $this->Paginator->sort('url'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('facebook'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('twitter'); ?></th>
<!--					<th nowrap><?php echo $this->Paginator->sort('password'); ?></th>	-->
						<th nowrap><?php echo $this->Paginator->sort('一言'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('プロジェクト'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('活動エリア'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('ロール'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('業種'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('スキル'); ?></th>
<!--						<th nowrap><?php //echo $this->Paginator->sort('profile'); ?></th>-->
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
<!--				--><?php //$this->log($users); ?>
				<?php foreach ($users as $user): ?>
					<tr>
<!--					<td nowrap><?php echo h($user['User']['id']); ?></td>	-->
<!--						<td nowrap>--><?php //echo h($user['User']['created']); ?><!--&nbsp;</td>-->
<!--						<td nowrap>--><?php //echo h($user['User']['modified']); ?><!--&nbsp;</td>-->
						<td nowrap><?php echo h($user['User']['username']); ?>&nbsp;</td>
<!--						<td nowrap>--><?php //echo h($user['User']['email']); ?><!--&nbsp;</td>-->
						<td nowrap><?php echo h($user['User']['url']); ?>&nbsp;</td>
						<td nowrap><?php echo h($user['User']['facebook']); ?>&nbsp;</td>
						<td nowrap><?php echo h($user['User']['twitter']); ?>&nbsp;</td>
<!--					<td nowrap><?php echo h($user['User']['password']); ?>&nbsp;</td>	-->
						<td nowrap><?php echo h($user['User']['abstract']); ?>&nbsp;</td>
						<td>
							<?php foreach ($user['Project'] as $project) {
//								$this->log($project);
								echo $this->Html->link($project['title'], array('controller' => 'projects', 'action' => 'view', $project['id']));
								echo "<br>";
							}?>
						</td>
						<td>
			<?php echo $this->Html->link($user['Area']['areaname'], array('controller' => 'areas', 'action' => 'view', $user['Area']['id'])); ?>
						</td>
						<td>
							<?php
								$rolls = '';
								foreach ($user['Roll'] as $roll) {
									$rolls = $roll['rollname'] . '  ' . $rolls;
								}
								echo $rolls;
							?>
						</td>
						<td>
							<?php
								$industries = '';
								foreach ($user['Industry'] as $industry) {
									$industries = $industry['industryname'] . '  ' . $industries;
								}
								echo $industries;
							?>
						</td>
						<td>
							<?php
								$skills = '';
								foreach ($user['Skill'] as $skill) {
									$skills = $skill['skillname'] . '  ' . $skills;
								}
								echo $skills;
							?>
						</td>
<!--					<td nowrap><?php echo h($user['User']['profile']); ?></td>	-->
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $user['User']['id']), array('escape' => false)); ?>
							<!--テスト用、あとで削除。見た目改善しただけ、routeのアクセス権も必要-->
							<?php //$_SESSION['login_user_id'] = 2; ?>
							<?php if(isset($_SESSION['login_user_id'])) {
							if($_SESSION['login_user_id'] == $user['User']['id']) {
								echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['User']['id']), array('escape' => false));
								echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id']));
							}}?>
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