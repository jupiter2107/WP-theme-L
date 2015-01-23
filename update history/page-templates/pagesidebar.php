<?php
/*
Template Name: Pagesidebar
*/

/*
 * pagesidebar.php
 * WP Theme "L"
 */
?>

<?php get_header(); ?>
<?php get_template_part('banner', 'blog'); ?>
<?php get_template_part('navbar'); ?>

<div id="b-content" class="row">
  <div id="b-main" class="col-xs-12 col-sm-8 col-md-9">

    <!-- Post -->
    <?php if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>
        <div class="row post">
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="p-wrapper col-xs-12">
              <h2 class="p-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
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
          
  </div><!-- /.B-Main -->

<?php get_template_part('sidebar', 'page'); ?>
<?php get_footer(); ?>