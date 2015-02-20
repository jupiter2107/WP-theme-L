<?php
/*
 * navbar.php
 * WP Theme "L"
 */
?>

<div id="navbar">
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#L-navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="L-navbar">
        <?php
          // menu - Primary Left Side
          wp_nav_menu( array(
            'menu'              => 'primary-left',
            'theme_location'    => 'primary-left',
            'depth'             => 2,
            'container'         => false,
            // 'container_class'   => 'collapse navbar-collapse',
            // 'container_id'      => 'L-navbar',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
          );
          // menu - Primary Left Side
          wp_nav_menu( array(
            'menu'              => 'primary-right',
            'theme_location'    => 'primary-right',
            'depth'             => 2,
            'container'         => false,
            'menu_class'        => 'nav navbar-nav navbar-right',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
          );
        ?>
      </div>
    </div><!-- /.Container-fluid -->
  </nav>
</div><!-- /.Navbar -->