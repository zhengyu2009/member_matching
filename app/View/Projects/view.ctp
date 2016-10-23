<script>
	function asyncSend(){
		var rollArray = [];
		var rollElement = document.getElementById("rollList");
		var rollAll = rollElement.querySelectorAll('input[type=checkbox]');
		// console.log(rollAll);
		for (var i = 0; i < rollAll.length; i++) {
			if(rollAll[i].checked){
				rollArray.push(rollAll[i].value);
			}
		}
		// console.log(rollArray);
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			document.getElementById("teamMember").innerHTML = this.responseText;
    		}
		};
		var url = "<?php echo $this->Html->url(array('controller' =>'ProjectsRollsUsers', 'action' => 'ajaxCall')); ?>";
		var project_id = "<?php echo $project['Project']['id']; ?>";
		// console.log(url);
		xhttp.open("POST", url, true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
		xhttp.send("rollList=" + rollArray + "&project_id=" + project_id);
	}
</script>

<?php
$this->Html->addCrumb('プロジェクトを探す', array('controller'=>'projects','action'=>'index'));
$this->Html->addCrumb('プロジェクト「'.$project['Project']['title'].'」の詳細');
?>


<div class="projects view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php
					echo __('プロジェクトの詳細   ');
					if(isset($_SESSION['login_user_id']) && ($_SESSION['login_user_id'] == $project['Project']['user_id'])) {
						echo __('プロジェクト「'.$project['Project']['title'].'」の詳細   ');
						if($_SESSION['login_user_id'] == $project['Project']['user_id']) {
							echo $this->Html->link('編集', array( 'controller' => 'projects', 'action' => 'edit', $project['Project']['id']), array('class' => 'btn btn-primary'));
//							echo '<a class="btn btn-primary" role="button" href="">編集</a>';
					}}
					?>
				</h1>
			</div>
		</div>
	</div>

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
<!--				<tr>-->
<!--					<th>--><?php //echo __('Id'); ?><!--</th>-->
<!--					<td>-->
<!--						--><?php //echo h($project['Project']['id']); ?>
<!--						&nbsp;-->
<!--					</td>-->
<!--				</tr>-->
				<tr>
					<th><?php echo __('作成日'); ?></th>
					<td>
						<?php echo h(date('Y-m-d', strtotime($project['Project']['created']))); ?>
					</td>
				</tr>
				<tr>
					<th><?php echo __('編集日'); ?></th>
					<td>
						<?php echo h(date('Y-m-d', strtotime($project['Project']['modified']))); ?>
					</td>
				</tr>
				<tr>
					<th><?php echo __('プロジェクト名'); ?></th>
					<td>
						<?php echo h($project['Project']['title']); ?>
					</td>
				</tr>
				<tr>
					<th><?php echo __('Photo'); ?></th>
					<td>
						<?php $base = $this->Html->url("../../files/project/photo/");
						echo $this->Html->image($base . $project['Project']['photo_dir'] . "/" . $project['Project']['photo']); ?>
					</td>
				</tr>
				<tr>
					<th><?php echo __('プロジェクトオーナー'); ?></th>
					<td>
						<?php echo $this->Html->link($project['User']['username'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
					</td>
				</tr>
				<tr>
					<th><?php echo __('チームメンバー'); ?></th>
					<td id="teamMember">
						<?php if(!empty($project['ProjectsRollsUser'])){
							foreach ($project['ProjectsRollsUser'] as $member) {
						echo $this->Html->link($users[$member['user_id']], array('controller' => 'users', 'action' => 'view', $member['user_id']));}} ?>
					</td>
				</tr>
				<tr>
					<th><?php echo __('業界'); ?></th>
					<td>
						<?php echo $project['Industry']['industryname']; ?>
					</td>
				</tr>
				<tr>
					<th>募集エリア</th>
					<td>
						<?php $areas = ' ';
						foreach ($project['Area'] as $proArea) {
							$area = $proArea['areaname'];
							$areas = $area . '  ' . $areas ;
						}
						echo $areas;
						?>
					</td>
				</tr>
				<tr>
					<th>求めるスキル</th>
					<td>
						<?php $skills = ' ';
						foreach ($project['Skill'] as $proSkill) {
							$skill = $proSkill['skillname'];
							$skills = $skill  . '  ' .$skills;
						}
						echo $skills;
						?>
					</td>
				</tr>
				<tr>
					<th>求めるメンバー</th>
<!--					<td>-->
<!--						--><?php //$rolls = ' ';
//						foreach ($project['Roll'] as $proRoll) {
//							$roll = $proRoll['rollname'];
//							$rolls = $roll  . '  ' .$rolls;
//						}
//						echo $rolls;
//						?>
<!--					</td>-->
					<td>
					<div id="rollList">
					<?php foreach ($project['Roll'] as $proRoll) : ?>
					<div class="checkbox-inline">
						<input type="checkbox" value="<?=$proRoll['id']?>" name="proRoll[]">
						<label><?=$proRoll['rollname']?></label>
					</div>
					<?php endforeach; ?>
					<input class="btn btn-primary btn-sm" type="button" value="参画" onclick="asyncSend()">
					</div>
					</td>
				</tr>
				<tr>
					<th><?php echo __('概要'); ?></th>
					<td>
						<?php echo h($project['Project']['description']); ?>
					</td>
				</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>