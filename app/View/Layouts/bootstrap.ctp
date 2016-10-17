<!DOCTYPE html>
<html lang="en">
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
      <!-- CSS for map search contents -->
      <link href="/member_matching/css/mapcontents.css" rel="stylesheet" type="text/css">
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
            background-color:#3498db;
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
            background-color:#e74c3c;
            opacity:1;filter:"alpha(opacity=100)";
            -ms-filter:"alpha(opacity=100)";
        }
    </style>

  </head>

  <body>

    <?php echo $this->Element('navigation'); ?>

    <div class="container">

			<?php echo $this->Session->flash(); ?>
            <?php echo $this->element('breadcrumbs'); ?>
			<?php echo $this->fetch('content'); ?>

    </div><!-- /.container -->
    <!-- BackToTop Button -->
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
  </body>
</html>
