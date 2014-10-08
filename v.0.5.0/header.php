<?php
/* --------------------------------------------------
        header.php
        Blog Theme "L"
-------------------------------------------------- */
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>

    <!-- CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/pagetop.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/header-footer.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">

    <!-- Favicon -->
    <link href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" rel="icon" type="image/vnd.microsoft.icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- WP-Header-Plugins -->
    <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
    <?php wp_head(); ?>

    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-46761512-1', 'auto');
      ga('send', 'pageview');

    </script>
  </head>
  <body <?php body_class(); ?>>
    <div class="container">
      <div id="banner" class="row">
        <div id="g-logo" class="col-xs-12 col-sm-5 col-md-3">
          <h1>
            <a href="<?php echo network_home_url("/"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/banner.png" class="img-responsive" alt="ミネルバの徒然なるままに"></a>
          </h1>
        </div>
        <div id="b-logo" class="col-xs-12 col-sm-7 col-md-9">
          <h2>
            <small>This Blog is ... </small><a href="<?php echo home_url("/blog/"); ?>"><?php bloginfo('name'); ?> <i class="fa fa-wordpress"></i></a>
          </h2>
        </div>
      </div><!-- /.Banner -->

      <div id="navbar">
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mmi-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="mmi-navbar">
              <ul class="nav navbar-nav">
                <li><a href="/about/site/">About</a></li>
                <li><a href="/anime/">Anime</a></li>
                <li><a href="/adoption/">Adoption</a></li>
                <li><a href="/event/">Event</a></li>
                <li><a href="/gadget/">Gadget</a></li>
                <li><a href="/gworks/">WP Theme "L"</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="/contact/">Contact</a></li>
                <li><a href="/sitemap/">Sitemap</a></li>
              <ul>
            </div><!-- /.Navbar-collapse -->
          </div><!-- /.Container-fluid -->
        </nav>
      </div><!-- /.Navbar -->