<div class="users form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('ユーザー登録'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-9">
				<div class="form-horizontal">
					<?php echo $this->Form->create('User', array('role' => 'form', 'type' => 'file')); ?>
				<div class="form-group">
					<?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => '実名でお願いします'));?>
				</div>
				<div class="form-group">
					<?php
                	if (! isset($_SESSION['fb_access_token'])) {
                    echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password'));}?>
				</div>
				<div class="form-group">
				<?php echo $this->Form->input('abstract', array('class' => 'form-control', 'placeholder' => 'あなたのことを一言でアピールしてください'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('area_id', array('class' => 'form-control', 'placeholder' => '活動エリアを選択してください'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('URL', array('class' => 'form-control', 'placeholder' => ''));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('facebook', array('class' => 'form-control', 'placeholder' => 'Facebook Page'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('twitter', array('class' => 'form-control', 'placeholder' => 'Twitter'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('profile', array('type' => 'textarea','class' => 'form-control ', 'placeholder' => 'あなたの経歴、得意、やりたいことをここで記入してください'));?>
				</div>

				<!--photo-->
				<div class="form-group">
					<?php echo $this->Form->input('User.photo', array('type' => 'file'));?>
					<?php echo $this->Form->input('photo_dir', array('type' => 'hidden'));?>
				</div>

					<div class="form-group">
						<?php echo $this->Form->input('fb_user_id', array('type' => 'hidden'));?>
					</div>
<!--					<p id="output" class="output"></p>
					<p id="error" class="error none"></p>
					<div id="output"></div>
					<input type="file" multiple id="file">
					<p><button id="reset" class="button">リセット</button></p>	-->

<!--				<div class="form-group">	-->
<!--				<?php //echo $this->Form->input('Skill', array('class' => 'form-control', 'placeholder' => 'Profile'));?>	-->
<!--                    <?php echo $this->Form->input('skill', array('multiple' => 'checkbox')); ?>	-->
<!--				</div>	-->

				<div class="form-group">
				<?php echo $this->Form->label('Skill.Skill', 'あなたのスキルを選んでください');?>
				<div class="checkbox">
				<?php echo $this->Form->input('Skill', array('label' => false,'class' => 'col-sm-6','multiple' => 'checkbox')); ?>
				</div>
				</div>

				<div style="clear: both;"></div>

				<div class="form-group">
				<?php echo $this->Form->label('Roll.Roll', '経験のある役職を選んでください');?>
				<div class="checkbox">
				<?php echo $this->Form->input('Roll', array('label' => false,'class' => 'col-sm-6','multiple' => 'checkbox'));?>
				</div>
				</div>

				<div style="clear: both;"></div>

				<div class="form-group">
				<?php echo $this->Form->label('Industry.Industry', '経験のある業種を選んでください');?>
				<div class="checkbox">
				<?php echo $this->Form->input('Industry', array('label' => false,'class' => 'col-sm-6','multiple' => 'checkbox'));?>
				</div>
				</div>

				<div style="clear: both;"></div>

				<div class="form-group">
				<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>
		</div><!-- end col md 9 -->
	</div><!-- end row -->
</div>


	<script type="text/javascript">
	// ファイルが選択されたらイベントを実行する
	document.getElementById( "file" ).addEventListener( "change", function() {
	try {
	// フォームで選択された全ファイルを取得
	var fileList = this.files ;

	// 書き出し用のHTML
	document.getElementById( "output" ).innerHTML = "" ;

	// 個数分の画像を表示する
	for( var i=0,l=fileList.length; l>i; i++ ) {
	// Blob URLの作成
	var blobUrl = window.URL.createObjectURL( fileList[i] ) ;

	// HTMLに書き出し (src属性にblob URLを指定)
	document.getElementById( "output" ).innerHTML += '<a href="' + blobUrl + '" target="_blank"><img src="' + blobUrl + '"></a>' ;
	}

	// エラーを表示
	errorElement.className = "error none" ;

	} catch ( msg ) {
	// エラーを表示
	errorElement.className = "error" ;
	errorElement.textContent = msg ;
	console.error( msg ) ;

	}
	} ) ;

	// エラー表示用の要素
	var errorElement = document.getElementById( "error" ) ;

	// リセット
	document.getElementById( "reset" ).addEventListener( "click", function() {
	initialize() ;
	} ) ;

	// 初期化
	function initialize() {
	document.getElementById( "file" ).value = "" ;
	document.getElementById( "output" ).innerHTML = "" ;
	}
	</script>