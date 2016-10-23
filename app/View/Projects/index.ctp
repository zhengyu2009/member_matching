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
$this->Html->addCrumb('プロジェクトを探す');
;?>
<div class="projects index">

	<div class="row">
		<div class="col-md-">
			<div class="page-header">
				<h1><?php echo __('プロジェクトを探す'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>


	<div class="row">
		<div class="col-md-12">
				<tbody id="content">
				<div id="wrap">
					<h2>エリアから探す</h2>
					<div id="contents" class="search">
						<div id="contentsLeft">
							<?php echo $this->Form->create('Project', array('role' => 'form')); ?>

							<!--<form action="search" method="post" name="form1">-->
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

                        <div class="row">
                            <h2>業種から探す</h2>
                            <div class="form-horizontal">
                            	<div class="form-group">
									<div class="checkbox">
                                        <div class="col-sm-12"><input type="checkbox" id="select_all_industry"><label for="select_all_industry">全て選択</label></div>
										<?php echo $this->Form->input('Project.Industry', array('label' => false,'class' => 'col-sm-2 industry','multiple' => 'checkbox')); ?>
									</div>
								</div>
							</div>

                            <div style="clear: both;"></div>
                            <h2>スキルから探す</h2>
                            <div class="form-horizontal">
								<div class="form-group">
                                    <div class="checkbox">
                                        <div class="col-sm-12"><input type="checkbox" id="select_all_skill"><label for="select_all_skill">全て選択</label></div>
                                        <?php echo $this->Form->input('Project.Skill', array('label' => false,'class' => 'col-sm-2 skill','multiple' => 'checkbox')); ?>
                                    </div>
								</div>
                            </div>
                            <div style="clear: both;"></div>
								<div class="form-group">
									<?php echo $this->Form->submit(__('Search'), array('class' => 'btn btn-default')); ?>
								</div>

								<?php echo $this->Form->end() ?>
						</div>

                        <div class="row">
                            <table cellpadding="0" cellspacing="0" class="table table-striped">
                                <thead>
                                <tr>
                                    <!--<th nowrap><?php /*echo $this->Paginator->sort('id'); */?></th>-->
                                    <th nowrap><?php echo $this->Paginator->sort('title', 'タイトル'); ?></th>
                                    <th nowrap><?php echo $this->Paginator->sort('description', '概要'); ?></th>
                                    <th nowrap><?php echo $this->Paginator->sort('user_id', '募集者名'); ?></th>
                                    <th nowrap><?php echo $this->Paginator->sort('industry_id', '業種'); ?></th>
                                    <th nowrap><?php echo $this->Paginator->sort('area_id', '募集エリア'); ?></th>
                                    <th nowrap><?php echo $this->Paginator->sort('skill_id', '求めるスキル'); ?></th>
                                    <th nowrap><?php echo $this->Paginator->sort('created', '作成日'); ?></th>
                                    <th nowrap><?php echo $this->Paginator->sort('modified', '編集日'); ?></th>
                                    <th class="actions"></th>
                                </tr>
                                </thead>
				<?php foreach ($projects as $project): ?>
					<tr>
						<!--<td nowrap><?php /*echo h($project['Project']['id']); */?>&nbsp;</td>-->
						<td nowrap><?php echo h($project['Project']['title']); ?>&nbsp;</td>
						<td nowrap><?php echo h($project['Project']['description']); ?>&nbsp;</td>
						<td>
				<?php echo $this->Html->link($project['User']['username'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
						</td>
						<td>
				<?php echo $this->Html->link($project['Industry']['industryname'], array('controller' => 'industries', 'action' => 'view', $project['Industry']['id'])); ?>
						</td>
						<td>
				<?php $areas = ' ';
						foreach ($project['Area'] as $proArea) {
							$area = $proArea['areaname'];
							$areas = $area . '  ' . $areas ;
						}
				echo $areas;
				?>
						</td>
						<td>
							<?php $skills = ' ';
							foreach ($project['Skill'] as $proSkill) {
								$skill = $proSkill['skillname'];
								$skills = $skill  . '  ' .$skills;
							}
							echo $skills;
							?>
						</td>
                        <!--<td nowrap><?php /*echo h($project['Project']['created']); */?>&nbsp;</td>-->
                        <td><?php echo h(date('Y-m-d', strtotime($project['Project']['created']))); ?>&nbsp;</td>
                        <!--<td nowrap><?php /*echo h($project['Project']['modified']); */?>&nbsp;</td>-->
                        <td><?php echo h(date('Y-m-d', strtotime($project['Project']['modified']))); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $project['Project']['id']), array('escape' => false)); ?>
<!--							テスト用、あとで削除。見た目改善しただけ、routeのアクセス権も必要-->
							<?php //$_SESSION['login_user_id'] = 2; ?>
							<?php if(isset($_SESSION['login_user_id'])) {
								if($_SESSION['login_user_id'] == $project['Project']['user_id']) {
								echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $project['Project']['id']), array('escape' => false));
								echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $project['Project']['id']), array('escape' => false), __('削除しても大丈夫ですか?')); 
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
            </div>
</div><!-- end col md 8 -->
</div><!-- end containing of content -->
</div><!-- end containing of content -->
</div><!-- end containing of content -->