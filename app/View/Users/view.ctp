<?php
$this->Html->addCrumb('ユーザーを探す', array('controller'=>'users','action'=>'index'));
$this->Html->addCrumb($user['User']['username'].'さんのページ');
;?>
<div class="users view">
	<div class="row">
		<div class="col-md-9">
			<div class="page-header">
				<h1><?php //$_SESSION['login_user_id'] = 2;
					if($_SESSION['login_user_id'] == $user['User']['id']) {
						echo __('マイページ    ');
						echo $this->Html->link('編集', array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary'));
					} else {
						echo $user['User']['username'] . "さんのページ";
					}
					?></h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
					<th><?php echo __('Photo'); ?></th>
					<td>
						<div class="thumbnail">
						<?php $base = $this->Html->url("../../files/user/photo/");
						echo $this->Html->image($base . $user['User']['photo_dir'] . "/" . $user['User']['photo']); ?>
						</div>
					</td>
				</tr>
				<tr>
						<th><?php echo __('Username'); ?></th>
						<td>
							<?php echo h($user['User']['username']); ?>
						</td>
				</tr>
<!--				<tr>-->
<!--		<th>--><?php //echo __('Id'); ?><!--</th>-->
<!--		<td>-->
<!--			--><?php //echo h($user['User']['id']); ?>
<!--			&nbsp;-->
<!--		</td>-->
<!--</tr>-->
<!--<tr>-->
<!--		<th>--><?php //echo __('Password'); ?><!--</th>-->
<!--		<td>-->
<!--			--><?php //echo h($user['User']['password']); ?>
<!--						&nbsp;-->
<!--		</td>-->
<!--</tr>-->
			<tr>
				<th><?php echo __('Url'); ?></th>
				<td>
					<?php echo h($user['User']['url']); ?>
					&nbsp;
				</td>
			</tr>
			<tr>
				<th><?php echo __('Facebook'); ?></th>
				<td>
					<?php echo h($user['User']['facebook']); ?>
					&nbsp;
				</td>
			</tr>
			<tr>
				<th><?php echo __('Twitter'); ?></th>
				<td>
					<?php echo h($user['User']['twitter']); ?>
					&nbsp;
				</td>
			</tr>
			<tr>
					<th><?php echo __('一言'); ?></th>
					<td>
						<?php echo h($user['User']['abstract']); ?>				&nbsp;
					</td>
			</tr>
			<tr>
					<th><?php echo __('活動エリア'); ?></th>
					<td>
						<?php echo $this->Html->link($user['Area']['areaname'], array('controller' => 'areas', 'action' => 'view', $user['Area']['id'])); ?>
					</td>
			</tr>
<!--
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>pro
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</td>
</tr>
-->
<!--<tr>-->
<!--		<th>--><?php //echo __('Email'); ?><!--</th>-->
<!--		<td>-->
<!--			--><?php //echo h($user['User']['email']); ?>
<!--			&nbsp;-->
<!--		</td>-->
<!--</tr>-->


				<tr>
						<th><?php echo __('ロール'); ?></th>
						<td>
							<?php if (!empty($user['Roll'])) {
								$rolls = '';
								foreach ($user['Roll'] as $roll) {
									$rolls = $roll['rollname'] . '  ' . $rolls;
								}
								echo $rolls;
							}?>
						</td>
				</tr>
				<tr>
					<th><?php echo __('業種'); ?></th>
					<td>
						<?php if (!empty($user['Industry'])) {
							$industries = '';
							foreach ($user['Industry'] as $industry) {
								$industries = $industry['industryname'] . '  ' . $industries;
							}
							echo $industries;
						}?>
					</td>
				</tr>
				<tr>
					<th><?php echo __('スキル'); ?></th>
					<td>
						<?php if (!empty($user['Skill'])) {
							$skills = '';
						foreach ($user['Skill'] as $skill) {
							$skills = $skill['skillname'] . '  ' . $skills;
						}
						echo $skills;
						}?>
					</td>
				</tr>
				<tr>
					<th><?php echo __('自己紹介'); ?></th>
					<td>
						<?php echo h($user['User']['profile']); ?>
					</td>
				</tr>

				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-9">
	<h3><?php echo __('企画プロジェクト'); ?></h3>
	<?php if (!empty($user['Project'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
<!--		<th><?php echo __('Id'); ?></th>	-->

		<th><?php echo __('プロジェクト名'); ?></th>
		<th><?php echo __('概要'); ?></th>
<!--		<th>--><?php //echo __('User Id'); ?><!--</th>-->
		<th><?php echo __('業種'); ?></th>
		<th><?php echo __('作成日'); ?></th>
		<th><?php echo __('更新日'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($user['Project'] as $project): ?>
		<tr>
<!--			<td><?php echo $project['id']; ?></td>	-->

			<td><?php echo $project['title']; ?></td>
			<td><?php echo $project['description']; ?></td>
<!--			<td>--><?php //echo $project['user_id']; ?><!--</td>-->
			<td><?php echo $industryLists[$project['industry_id']]; ?></td>
			<td><?php echo date('Y-m-d', strtotime($project['created'])); ?></td>
			<td><?php echo date('Y-m-d', strtotime($project['modified'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'projects', 'action' => 'view', $project['id']), array('escape' => false)); ?>
				<?php if($_SESSION['login_user_id'] == $user['User']['id']) {
				 echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'projects', 'action' => 'edit', $project['id']), array('escape' => false));
				echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'projects', 'action' => 'delete', $project['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $project['id'])); }?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>
</div>
</div>