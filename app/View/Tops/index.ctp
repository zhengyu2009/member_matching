<?php //$this->log($users); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="トップページです">
    <meta name="keywords" content="トップページ">
    <title>mecci</title>
    <!-- css -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="app/webroot/css/top.css" rel="stylesheet">
    <link href="app/webroot/css/top2.css" rel="stylesheet">
    <!-- IE対応 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .breadcrumbs {
            display: none;
        }
    </style>
</head>

<body>

<!-- ===== ナビゲーションバー ===== -->
<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
    <span class="navbar-brand"><a href="#">Mecci</a></span>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#projects">プロジェクト</a></li>
            <li><a href="#users">ユーザ</a></li>
            <?php
/*                if(isset($_SESSION['fb_user_id'])){
                    echo '<li><a href="">マイページ</a></li>';
                    echo '<li><a href="' . $logoutUrl . '">ログアウト</a></li>';
            
                } else {
                    echo '<li><a href="' . $loginUrl . '">facebookでログイン</a></li>';
                }
            */?>
        </ul>
    </div>
    </div>
</nav>-->

<!-- ===== ページタイトル ===== -->
<!--<header class="page_top home_top">
    <div class="container">
        <h1>乗ってかない？</h1>
        <p>
            アイディアのない人orスキルのない人<br>
            ひとりではなかなかできなかったけど、mecci（めっち）でチームを作ってやってみませんか？
        </p>
    </div>
</header>
-->

<!-- ===== スライダー ===== -->
<!--  data-ride="carousel"を入れると自動的にスライドが開始される -->
<div id="carousel_sample" class="carousel slide" data-ride="carousel">
    <!-- 中央に表示される丸いボタン -->
    <ol class="carousel-indicators">
        <!--Carouselのid名を合わせる、スライダーの数だけ用意する
                data-slide-toで何番目のスライドへ移動するか指定する、0から始めるので１つめのスライドなら0を指定-->
        <li data-target="#carousel_sample" data-slide-to="0" class="active"></li>
        <li data-target="#carousel_sample" data-slide-to="1" class=""></li>
        <li data-target="#carousel_sample" data-slide-to="2" class=""></li>
        <li data-target="#carousel_sample" data-slide-to="3" class=""></li>
    </ol>
    <!-- ここからCarouselの中身 -->
    <div class="carousel-inner">
        <!-- item = １ページ、activeを入れたところが最初に表示される -->
        <div class="item active">
            <?php echo $this->Html->image('top1.jpg');
            ?>
            <div class="carousel-caption">
                <h1>なんかおもしろいこと<br>やりたいな</h1>
            </div>
        </div>
        <div class="item">
            <?php echo $this->Html->image('top2.jpg');
            ?>
            <div class="carousel-caption">
                <h1>アイディアを公開！</h1>
            </div>
        </div>
        <div class="item">
            <?php echo $this->Html->image('top3.jpg');
            ?>
            <div class="carousel-caption">
                <h1>いっしょにやるひと探し！</h1>
            </div>
        </div>
        <div class="item">
            <?php echo $this->Html->image('top4.jpg');
            ?>
            <div class="carousel-caption">
                <h1>協力！</h1>
            </div>
        </div>
    </div>
    <!-- ページ送りボタン、ここもCarouselのid名を合わせる -->
    <a class="left carousel-control" href="#carousel_sample" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel_sample" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

<!-- ===== コンテンツ ===== -->
<div id="projects" class="contents_area">

<!-- フロー-->
<div class="row">
    <div class="col-xs-12">
        <div class="flow">
        <?php echo $this->Html->image('flow.png');
        ?>
        </div>
    </div>
</div>

<!-- コンテンツサンプル：プロジェクト -->
    <div class="noticestyle">
        <h4 class="titlestyle"><span class="glyphicon glyphicon-briefcase"></span> 新着プロジェクト
            <p class="" style="float: right"><span class="glyphicon glyphicon-hand-right" style="padding-right: 5px;"></span><small><?php echo $this->Html->link(__('もっと見る'), array('controller' => 'Projects', 'action' => 'index')); ?></small></p>
        </h4>

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

            </button>

        </div>
<!--        <div class="collapse navbar-collapse navbar-ex1-collapse">-->
<!--            <ul class="nav navbar-nav navbar-right">-->
<!---->
<!--                <li>--><?php //echo $this->Html->link(__('もっと見る'), array('controller' => 'Projects', 'action' => 'index')); ?><!--</li>-->
<!--            </ul>-->
<!--        </div>-->

        <div class="row">
            <div class="col-sm-4">
                <div class="boxstyle_02">
                    <h4><?php echo $projects[0]['Project']['title']; ?></h4>

                    <div class="cardtyle">
                        <img src="app/webroot/files/project/photo/<?php echo $projects[0]['Project']['photo_dir'] . '/' . $projects[0]['Project']['photo']; ?>" alt="" class="img-responsive">
                        <p>
                            <?php echo mb_strimwidth($projects[0]['Project']['description'], 0, 90, "..."); ?>
                        </p>
                        <p style="text-align: right; margin: 0 10px 10px 0; padding: 0;">
                        <?php echo $this->Html->link(
                            '詳細',
                            array('controller' => 'Projects', 'action' => 'view', $projects[0]['Project']['id']),
                            array('class' => 'btn btn-default btn-sm', 'role' => 'button')
                        ); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="boxstyle_02">
                    <h4><?php echo $projects[1]['Project']['title']; ?></h4>
                    <div class="cardtyle">
                        <img src="app/webroot/files/project/photo/<?php echo $projects[1]['Project']['photo_dir'] . '/' . $projects[1]['Project']['photo']; ?>" alt="" class="img-responsive">
                        <p>
                            <?php echo mb_strimwidth($projects[1]['Project']['description'], 0, 90, "..."); ?>
                        </p>
                        <div class="moreBottunBox">
                            <p style="text-align: right; margin: 0 10px 10px 0; padding: 0;">
                            <?php echo $this->Html->link(
                            '詳細',
                            array('controller' => 'Projects', 'action' => 'view', $projects[1]['Project']['id']),
                            array('class' => 'btn btn-default btn-sm', 'role' => 'button')
                        ); ?>
                            </p>
                    </div>
                </div>
            </div>
                </div>
            <div class="col-sm-4">
                <div class="boxstyle_02">
                    <h4><?php echo $projects[2]['Project']['title']; ?></h4>

                    <div class="cardtyle">
                        <img src="app/webroot/files/project/photo/<?php echo $projects[2]['Project']['photo_dir'] . '/' . $projects[2]['Project']['photo']; ?>" alt="" class="img-responsive">
                        <p>
                            <?php echo mb_strimwidth($projects[2]['Project']['description'], 0, 90, "..."); ?>
                        </p>
                        <p style="text-align: right; margin: 0 10px 10px 0; padding: 0;">
                        <?php echo $this->Html->link(
                            '詳細',
                            array('controller' => 'Projects', 'action' => 'view', $projects[2]['Project']['id']),
                            array('class' => 'btn btn-default btn-sm', 'role' => 'button')
                        ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- コンテンツサンプル： ユーザー -->
<div id="users" class="contents_area">
    <div class="noticestyle">
    <h4 class="titlestyle"><span class="glyphicon glyphicon-user"></span> 新着ユーザー
        <p class="" style="float: right"><span class="glyphicon glyphicon-hand-right" style="padding-right: 5px;"></span>
                <small><?php echo $this->Html->link(__('もっと見る'), array('controller' => 'Users', 'action' => 'index')); ?></small></p>
    </h4>
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        </button>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="boxstyle_02">
                <h4><?php echo $users[0]['User']['username']; ?></h4>
                <div class="cardtyle">
                    <img src="app/webroot/files/user/photo/<?php echo $users[0]['User']['photo_dir'] . '/' . $users[0]['User']['photo']; ?>" alt="" class="img-responsive">
                    <p>
                        <?php echo $users[0]['User']['abstract']?>
                    </p>
                    <p style="text-align: right; margin: 0 10px 10px 0; padding: 0;">
                    <?php echo $this->Html->link(
                        '詳細',
                        array('controller' => 'Users', 'action' => 'view', $users[0]['User']['id']),
                        array('class' => 'btn btn-default btn-sm', 'role' => 'button')
                    ); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="boxstyle_02">
                <h4><?php echo $users[1]['User']['username']; ?></h4>
                <div class="cardtyle">
                    <img src="app/webroot/files/user/photo/<?php echo $users[1]['User']['photo_dir'] . '/' . $users[1]['User']['photo']; ?>" alt="" class="img-responsive">
                    <p>
                        <?php echo $users[1]['User']['abstract']?>
                    </p>
                    <p style="text-align: right; margin: 0 10px 10px 0; padding: 0;">
                    <?php echo $this->Html->link(
                        '詳細',
                        array('controller' => 'Users', 'action' => 'view', $users[1]['User']['id']),
                        array('class' => 'btn btn-default btn-sm', 'role' => 'button')
                    ); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="boxstyle_02">
                <h4><?php echo $users[2]['User']['username']; ?></h4>
                <div class="cardtyle">
                    <img src="app/webroot/files/user/photo/<?php echo $users[2]['User']['photo_dir'] . '/' . $users[2]['User']['photo']; ?>" alt="" class="img-responsive">
                    <p>
                        <?php echo $users[2]['User']['abstract']?>
                    </p>
                    <p style="text-align: right; margin: 0 10px 10px 0; padding: 0;">
                    <?php echo $this->Html->link(
                        '詳細',
                        array('controller' => 'Users', 'action' => 'view', $users[2]['User']['id']),
                        array('class' => 'btn btn-default btn-sm', 'role' => 'button')
                    ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- ===== javascriptの読み込み ===== -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>