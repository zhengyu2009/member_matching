
<style>
	*, *:before, *:after {
		-webkit-box-sizing: content-box;
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script>
	$(document).ready(function() {
		//select all checkboxes for area
		$("#select_all").change(function () {  //"select all" change
			var status = this.checked; // "select all" checked status
			$('.selected-area').each(function () { //iterate all listed checkbox items
				this.checked = status; //change ".checkbox" checked status
			});
		});
		$('.selected-area').change(function () { //".checkbox" change
			console.log("hello world!");
			//uncheck "select all", if one of the listed checkbox item is unchecked
			if (this.checked == false) { //if this item is unchecked
				$("#select_all")[0].checked = false; //change "select all" checked status to false
			}

			//check "select all" if all checkbox items are checked
			if ($('.selected-area:checked').length == $('.selected-area').length) {
				$("#select_all")[0].checked = true; //change "select all" checked status to true
			}
		});
		//select all checkboxes for industry
		$("#select_all_industry").change(function () {  //"select all" change
			console.log("hello world!22");
			var status = this.checked; // "select all" checked status
			$('.industry input').each(function () {
				console.log("hello world!11");
				this.checked = status; //change ".checkbox" checked status
			});
		});
		$('.industry input').change(function () { //".checkbox" change
			console.log("hello world!");
			//uncheck "select all", if one of the listed checkbox item is unchecked
			if (this.checked == false) { //if this item is unchecked
				$("#select_all_industry")[0].checked = false; //change "select all" checked status to false
			}

			//check "select all" if all checkbox items are checked
			if ($('.industry input:checked').length == $('.industry').length) {
				$("#select_all_industry")[0].checked = true; //change "select all" checked status to true
			}
		});
		//select all checkboxes for skill
		$("#select_all_skill").change(function () {  //"select all" change
			console.log("hello world!22");
			var status = this.checked; // "select all" checked status
			$('.skill input').each(function () {
				console.log("hello world!11");
				this.checked = status; //change ".checkbox" checked status
			});
		});
		$('.skill input').change(function () { //".checkbox" change
			console.log("hello world!");
			//uncheck "select all", if one of the listed checkbox item is unchecked
			if (this.checked == false) { //if this item is unchecked
				$("#select_all_skill")[0].checked = false; //change "select all" checked status to false
			}

			//check "select all" if all checkbox items are checked
			if ($('.skill input:checked').length == $('.skill').length) {
				$("#select_all_skill")[0].checked = true; //change "select all" checked status to true
			}
		});
	});
</script>
<?php
$this->Html->addCrumb('ユーザーを探す');
;?>
<div class="users index">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><span class="glyphicon glyphicon-search" style="padding-right: 5px;"></span><?php echo __('ユーザーを探す'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-md-12">
			<div id="content">
			<div id="wrap">
				<h2><span class="glyphicon glyphicon-globe" style="padding-right: 5px;"></span>エリアから探す</h2>
				<div id="contents" class="search">
					<div id="contentsLeft">
						<?php echo $this->Form->create('User', array('role' => 'form')); ?>

						<form action="search" method="post" name="form1">
						<div class="contentsInner areaSearchBox">
							<div class="areaMapBox form-group">
								<ul>
									<li class="foreign"><input class="selected-area" type="checkbox" name="area[]" value="12"></li>
									<li class="hokkaido"><input class="selected-area" type="checkbox" name="area[]" value="3"></li>
									<li class="all"><input type="checkbox" name="area[]" value="13" id="select_all"></li>
									<li class="tohoku"><input class="selected-area" type="checkbox" name="area[]" value="4"></li>
									<li class="okinawa"><input class="selected-area" type="checkbox" name="area[]" value="11"></li>
									<li class="shinetsu"><input class="selected-area" type="checkbox" name="area[]" value="2"></li>
									<li class="kyusyu"><input class="selected-area" type="checkbox" name="area[]" value="10"></li>
									<li class="chu-shi">
										<p class="chugoku"><input class="selected-area" type="checkbox" name="area[]" value="8"></p>
										<p class="shikoku"><input class="selected-area" type="checkbox" name="area[]" value="9"></p>
									</li>
									<li class="kansai"><input class="selected-area" type="checkbox" name="area[]" value="7"></li>
									<li class="hoku-to">
										<p class="hokuriku"><input class="selected-area" type="checkbox" name="area[]" value="5"></p>
										<p class=""></p><input class="selected-area" type="checkbox" name="area[]" value="6">
									</li>
									<li class="kanto"><input class="selected-area"type="checkbox" name="area[]" value="1"></li>
								</ul>
							</div>
						</div>
					</div>

				<!--	<div class="row">-->
					<div class="col-md-12" style="padding: 10px 0">
						<h2 class="search-title"><span class="glyphicon glyphicon-tree-deciduous" style="padding-right: 5px;"></span>業種から探す</h2>
						<div class="form-horizontal">
							<div class="form-group">
								<div class="checkbox">
									<div class="col-sm-12"><input type="checkbox" id="select_all_industry"><label for="select_all_industry">全て選択</label></div>
									<?php echo $this->Form->input('User.Industry', array('label' => false,'class' => 'col-sm-2 industry','multiple' => 'checkbox')); ?>
								</div>
							</div>
						</div>
					</div>
					<div style="clear: both;"></div>
						<div class="col-md-12" style="padding: 10px 0">
							<h2 class="search-title"><span class="glyphicon glyphicon-pencil" style="padding-right: 5px;"></span>スキルから探す</h2>
							<div class="form-horizontal">
								<div class="form-group">
									<div class="checkbox">
										<div class="col-sm-12"><input type="checkbox" id="select_all_skill"><label for="select_all_skill">全て選択</label></div>
										<?php echo $this->Form->input('User.Skill', array('label' => false,'class' => 'col-sm-2 skill','multiple' => 'checkbox')); ?>
									</div>
								</div>
							</div>
							</div>
							<div style="clear: both;"></div>
						<div class="form-group" style="text-align: center; margin: 10px 0; padding: 30px;">

							<?php echo $this->Form->button(
								'<span class="glyphicon glyphicon-search" aria-hidden="true"></span>'.__(' 検索'),
								array(
									'type' => 'submit',
									'class' => 'btn btn-primary btn-lg',
								)
							); ?>


	<!--						--><?php /*echo $this->Form->submit(__('検  索'), array('class' => 'btn btn-primary btn-lg')); */?>
						</div>

						<?php echo $this->Form->end() ?>
					</div>
				<hr class="style-three">

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
				<div>
<!--				<?php //$this->log($users); ?>
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
<!--							--><?php //$this->log($_SESSION); ?>
							<?php if(isset($_SESSION['login_user_id'])) {
							if($_SESSION['login_user_id'] == $user['User']['id']) {
								echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['User']['id']), array('escape' => false));
								echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id']));
							}}?>
						</td>
					</tr>
				<?php endforeach; ?>
				</div>
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

		</div>
	</div>
</div>
</div>
