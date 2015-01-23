<?php
/* --------------------------------------------------
        index.php
        Blog Theme "L"
-------------------------------------------------- */
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
                  <div class="p-title col-xs-12">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  </div>
                  <div class="p-thumbnail col-xs-12 col-md-4">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class' => 'img-rounded img-responsive' ) ); ?></a>
                  </div>
                  <div class="p-wrapper col-xs-12 col-md-8">
                    <p class="p-meta">
                      <span class="post-date"><?php echo get_the_date(); ?></span>　
                      <span class="category">Category - <?php the_category('、') ?></span>　
                      <span class="comment-num"><?php comments_popup_link ( '<span class="glyphicon glyphicon-comment"></span> Comment - 0', '<span class="glyphicon glyphicon-comment"></span> Comment - 1', '<span class="glyphicon glyphicon-comment"></span> Comments - %' ); ?></span>
                    </p>
                    <p><?php echo mb_substr( strip_tags( $post -> post_content ), 0, 120).'...'; ?></p>
                    <p class="p-more-read text-right">
                      <button type="button" class="btn btn-default" onclick="location.href='<?php the_permalink(); ?>'">続きを読む »</button>
                    </p>
                  </div>
                </div>
              </div> 
            <?php endwhile;
          else : ?>
            <div class="row post">
              <div class="col-xs-12">
                <h2>記事がありません</h2>
                <p>お探しの記事は見つかりませんでした。</p>
              </div>
            </div>
          <?php endif; ?>
          <!-- /.Post -->

          <!-- Navigation -->
          <?php if ( $wp_query -> max_num_pages > 1 ) : ?>
            <div id="navigation" class="row">
              <div class="col-xs-12">
                <ul class="pager">
                  <li class="previous"><?php next_posts_link('<span class="glyphicon glyphicon-circle-arrow-left"></span> Previous'); ?></li>
                  <li class="next"><?php previous_posts_link('Newer <span class="glyphicon glyphicon-circle-arrow-right"></span>'); ?></li>
                </ul>
              </div>
            </div>
          <?php endif; ?>
          <!-- /.Navigation -->

        </div><!-- /.B-Main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>