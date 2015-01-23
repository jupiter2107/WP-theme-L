<?php
/*
 * header.php
 * WP Theme "L"
 */
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
    <link href="<?php echo get_template_directory_uri(); ?>/css/sidebar.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/main.css" rel="stylesheet">
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

    <!-- Analytics -->
    <!--<script src="<?php echo get_template_directory_uri(); ?>/js/analytics.js"></script>-->
  </head>
  <body <?php body_class(); ?>>
    <div class="container">