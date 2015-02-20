<?php
/*
 * banner.php
 * WP Theme "L"
 */
?>

<div id="banner" class="row">
  <div id="g-logo" class="col-xs-12 col-sm-5 col-md-3">
    <h1>
      <a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/banner.png" class="img-responsive" alt="site-banner"></a>
      <!-- <a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> -->
    </h1>
  </div>
  <div id="b-logo" class="col-xs-12 col-sm-7 col-md-9">
    <div class="theme-L" style="background-color: #000000; color: #ffffff; padding: 5px;">
      ユーザーコンテンツ挿入可能部分<br>
      横幅が768px以下のとき、文字列は中央揃えになります。
    </div>
  </div>
</div><!-- /.Banner -->
