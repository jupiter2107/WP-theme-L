<?php
/*
Template Name: Banner-Notitle-Fullwidth
*/

/*
 * banner-notitle-fullwidth.php
 * WP Theme "L"
 */
?>

<?php get_header(); ?>
<?php get_template_part('banner'); ?>
<?php get_template_part('navbar'); ?>

<div id="b-content" class="row">
  <div id="b-main" class="col-xs-12">

    <!-- Post -->
    <?php if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>
        <div class="row post">
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="p-wrapper col-xs-12">
              <div class="p-contents">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
        </div>
        <!-- /.Post -->
      <?php endwhile;
    else: ?>
      <div class="row post">
        <div class="col-xs-12">
          <h2>記事がありません</h2>
          <p>お探しの記事は見つかりませんでした。</p>
        </div>
      </div>
      <!-- /.Post -->
    <?php endif; ?>
          
  </div><!-- /.Main Row -->

<?php get_footer(); ?>