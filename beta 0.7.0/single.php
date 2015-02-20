<?php
/*
 * single.php
 * WP Theme "L"
 */
?>

<?php get_header(); ?>
<?php get_template_part('banner'); ?>
<?php get_template_part('navbar'); ?>

<div id="b-content" class="row">
  <div id="b-main" class="col-xs-12 col-sm-8 col-md-9">

    <!-- Breadcrumbs -->
    <?php the_breadcrumb(); ?>

    <!-- Post -->
    <?php if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>
        <div class="row post">
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="p-wrapper col-xs-12">
              <h2 class="p-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
              <p class="post-meta text-right">
                <span class="post-date"><?php echo get_the_date(); ?></span>　
                <span class="category">Category - <?php the_category('、') ?></span>　
                <span class="comment-num"><?php comments_popup_link ( '<span class="glyphicon glyphicon-comment"></span> Comment - 0', '<span class="glyphicon glyphicon-comment"></span> Comment - 1', '<span class="glyphicon glyphicon-comment"></span> Comments - %' ); ?></span>
              </p>
              <div class="p-contents">
                <?php the_content(); ?>
              </div>
              <p class="footer-post-meta text-right">
                <span class="tag"><?php the_tags('<span class="glyphicon glyphicon-tag"></span> Tag - ', '、'); ?></span>
                <?php if ( is_multi_author() ): ?>
                  <span class="author">Author - <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
                <?php endif; ?>
              </p>
            </div>
          </div>
        </div>
        <!-- /.Post -->
        <!-- Navigation -->
        <div id="navigation" class="row">
          <div class="col-xs-12">
            <ul class="pager">
              <?php if( get_previous_post() ): ?>
                <li class="previous"><?php WS_previous_post_link('15' , '%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span> %title'); ?></li>
              <?php endif;
              if ( get_next_post() ): ?>
                <li class="next"><?php WS_next_post_link('15' , '%link', '%title <span class="glyphicon glyphicon-circle-arrow-right"></span>'); ?></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <!-- /.Navigation -->
        <!-- Comment -->
          <?php comments_template(); ?>
        <!-- /.Comment -->
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
