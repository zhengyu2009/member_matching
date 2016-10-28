<!DOCTYPE html>
<html lang="ja">
  <head>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

      <!-- Various favions  -->
      <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
      <link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
      <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
      <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
      <link rel="icon" type="image/png" href="/favicon-48x48.png" sizes="48x48">
      <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
      <link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="96x96">
      <link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="96x96">
      <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
      <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
      <link rel="manifest" href="/manifest.json">
      <meta name="msapplication-TileColor" content="#2d88ef">
      <meta name="msapplication-TileImage" content="/mstile-144x144.png">


      <!-- CSS for map search contents -->
      <?php echo $this->Html->css( 'top.css'); ?>
      <?php echo $this->Html->css( 'top2.css'); ?>
    <?php echo $this->Html->css( 'mapcontents.css'); ?>

    <!--<link href="/member_matching/css/mapcontents.css" rel="stylesheet" type="text/css">-->
  	<!-- Latest compiled and minified JavaScript -->
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->
      <script type='text/javascript'>
          $(document).ready(function(){
              $(window).scroll(function(){
                  if ($(this).scrollTop() > 100) {
                      $('#scroll').fadeIn();
                  } else {
                      $('#scroll').fadeOut();
                  }
              });
              $('#scroll').click(function(){
                  $("html, body").animate({ scrollTop: 0 }, 600);
                  return false;
              });
          });
      </script>



    <style type="text/css">
    	body{ padding: 70px 0px; }

        /* BackToTop button css */
        #scroll {
            position:fixed;
            right:10px;
            bottom:10px;
            cursor:pointer;
            width:50px;
            height:50px;
            background-color:#74D2FF;
            text-indent:-9999px;
            display:none;
            -webkit-border-radius:60px;
            -moz-border-radius:60px;
            border-radius:60px
        }
        #scroll span {
            position:absolute;
            top:50%;
            left:50%;
            margin-left:-8px;
            margin-top:-12px;
            height:0;
            width:0;
            border:8px solid transparent;
            border-bottom-color:#ffffff
        }
        #scroll:hover {
            background-color:#5CA4CA;
            opacity:1;filter:"alpha(opacity=100)";
            -ms-filter:"alpha(opacity=100)";
        }
    </style>

  </head>

  <body>
  <!-- Header Area -->
    <?php echo $this->Element('navigation'); ?>

    <div class="container">

			<?php echo $this->Session->flash(); ?>
            <?php echo $this->element('breadcrumbs'); ?>
			<?php echo $this->fetch('content'); ?>

    </div><!-- /.container -->

    <!-- Footer Area -->
    <?php echo $this->Element('footer'); ?>

    <!-- BackToTop Button -->
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
  </body>
</html>
