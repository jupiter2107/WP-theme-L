<?php
/* --------------------------------------------------
        banner-blog.php
        Blog Theme "L"
-------------------------------------------------- */
?>

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