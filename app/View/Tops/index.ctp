<!--<?php session_start(); ?>-->
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
</head>

<body>

<!-- ===== ナビゲーションバー ===== -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <span class="navbar-brand"><a href="#">Mecci</a></span>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#projects">プロジェクト</a></li>
            <li><a href="#users">ユーザ</a></li>
            <?php
                if(isset($_SESSION['fb_user_id'])){
                    echo '<li><a href="' . $logoutUrl . '">ログアウト</a></li>';
            
                } else {
                    echo '<li><a href="' . $loginUrl . '">facebookでログイン</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>

<!-- ===== ページタイトル ===== -->
<header class="page_top home_top">
    <div class="container">
        <h1>乗ってかない？</h1>
        <p>
            アイディアのない人orスキルのない人<br>
            ひとりではなかなかできなかったけど、mecci（めっち）でチームを作ってやってみませんか？
        </p>
    </div>
</header>

<!-- ===== コンテンツ ===== -->
<div id="projects" class="container contents_area">

<!-- コンテンツサンプル：プロジェクト -->
    <div class="container">
        <h4 class="titlestyle"><i class="fa fa-comment-o fa-fw"></i> プロジェクト</h4>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

            </button>

        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">

                <li><?php echo $this->Html->link(__('もっと見る'), array('controller' => 'Projects', 'action' => 'index')); ?></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="boxstyle_02">
                    <h4>プロジェクトX</h4>
                    <img src="app/webroot/img/top.png" alt="" class="img-responsive">
                    <div class="cardtyle">
                        <p>
                            コンテンツのサンプルです。行のコンテンツ数を変更したい場合は段組設定を編集して下さい。写真とコメント部分の表示を変更する場合は、付属のCSSファイルの該当クラスを編集して下さい。
                            <button type="button" class="btn btn-link btn-lg">詳細</button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="boxstyle_02">
                    <h4>めっち</h4>
                    <img src="" alt="" class="img-responsive">
                    <div class="cardtyle">
                        <p>
                        <p>
                            コンテンツのサンプルです。行のコンテンツ数を変更したい場合は段組設定を編集して下さい。写真とコメント部分の表示を変更する場合は、付属のCSSファイルの該当クラスを編集して下さい。
                            <button type="button" class="btn btn-link btn-lg">詳細</button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="boxstyle_02">
                    <h4>mecci</h4>
                    <img src="" alt="" class="img-responsive">
                    <div class="cardtyle">
                        <p>
                        <p>
                            コンテンツのサンプルです。行のコンテンツ数を変更したい場合は段組設定を編集して下さい。写真とコメント部分の表示を変更する場合は、付属のCSSファイルの該当クラスを編集して下さい。
                            <button type="button" class="btn btn-link btn-lg">詳細</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- コンテンツサンプル： ユーザー -->
<div id="users" class="container">
    <h4 class="titlestyle"><i class="fa fa-comment-o fa-fw"></i> ユーザー</h4>
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        </button>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><?php echo $this->Html->link(__('もっと見る'), array('controller' => 'Users', 'action' => 'index')); ?></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="boxstyle_02">
                <h4>佐藤さん</h4>
                <img src="" alt="" class="img-responsive">
                <div class="cardtyle">
                    <p>
                        コンテンツのサンプルです。行のコンテンツ数を変更したい場合は段組設定を編集して下さい。
                        写真とコメント部分の表示を変更する場合は、付属のCSSファイルの該当クラスを編集して下さい。
                        <button type="button" class="btn btn-link btn-lg">詳細</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="boxstyle_02">
                <h4>鈴木さん</h4>
                <img src="" alt="" class="img-responsive">
                <div class="cardtyle">
                    <p>
                        コンテンツのサンプルです。行のコンテンツ数を変更したい場合は段組設定を編集して下さい。
                        写真とコメント部分の表示を変更する場合は、付属のCSSファイルの該当クラスを編集して下さい。
                        <button type="button" class="btn btn-link btn-lg">詳細</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="boxstyle_02">
                <h4>木村さん</h4>
                <img src="" alt="" class="img-responsive">
                <div class="cardtyle">
                    <p>
                        コンテンツのサンプルです。行のコンテンツ数を変更したい場合は段組設定を編集して下さい。
                        写真とコメント部分の表示を変更する場合は、付属のCSSファイルの該当クラスを編集して下さい。
                        <button type="button" class="btn btn-link btn-lg">詳細</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ===== footer ===== -->
<!--<footer>-->
<!--    <div class="container">-->
        <!--<ul class="pages list-unstyled text-center">-->
        <!--    <li><a href="http://localhost/member_matching/projects">Projects</a></li>-->
        <!--    <li><a href="http://localhost/member_matching/users">Users</a></li>-->
        <!--    <li><a href="#">Login</a></li>-->
        <!--    <li><a href="#">Logout</a></li>-->
        <!--</ul>-->
        <!--<ul class="social_icons list-unstyled text-center">-->
        <!--    <li><i class="fa fa-twitter fa-2x s_icon color_twitter"></i></li>-->
        <!--    <li><i class="fa fa-facebook fa-2x s_icon color_facebook"></i></li>-->
        <!--    <li><i class="fa fa-google-plus fa-2x s_icon color_google_plus"></i></li>-->
        <!--    <li><i class="fa fa-instagram fa-2x s_icon color_instagram"></i></li>-->
        <!--    <li><i class="fa fa-pinterest-p fa-2x s_icon color_pinterest"></i></li>-->
        <!--</ul>-->
<!--    </div>-->
<!--</footer>-->

<!-- ===== copyright ===== -->
<div class="copyright">
    <div class="container">
        <p class="text-right">
            Copyright &copy; <a href="#">Mecci</a> 2016. All Rights Reserved.
        </p>
    </div>
</div>

<!-- ===== javascriptの読み込み ===== -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>