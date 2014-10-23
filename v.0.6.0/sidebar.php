<?php
/*
 * sidebar.php
 * WP Theme "L"
 */
?>

<div id="b-sub" class="hidden-xs col-sm-4 col-md-3">

  <div id="b-sub-search-box">
    <h4>Search</h4>
    <?php get_search_form(); ?>
  </div><!-- /.Search -->

  <div id="b-sub-calendar">
    <h4>Calendar</h4>
    <?php get_my_calendar(); ?>
  </div><!-- /.Calendar -->

  <div id="b-sub-recent">
    <h4>Recent</h4>
    <div class="list-group">
      <?php 
                $number_recents_posts = 5;
                $recent_posts = wp_get_recent_posts( $number_recents_posts );
                foreach ($recent_posts as $post) {
                  echo '<a href="'.get_permalink( $post["ID"] ).'" class="list-group-item" title="Look '.$post["post_title"].'"> '.$post["post_title"].' </a>';
                } ?>
    </div>
  </div><!-- /.Recent -->

  <div id="b-sub-category">
    <h4>Category</h4>
    <div class="list-group">
      <?php 
                $categories = get_categories();
                foreach ($categories as $category) {
                  echo '<a href="'.get_category_link($category->term_id).'" class="list-group-item" title="'.sprintf( __( "View all posts in %s" ), $category->name ).'" '.'> '.$category->name.' </a>';
                } ?>
    </div>
  </div><!-- /.Category -->

  <div id="b-sub-archive">
    <h4>Archive</h4>
    <form name="archive">
      <select name="archive" class="form-control" onChange='document.location.href=this.options[this.selectedIndex].value;'>
        <option value="">
          <?php echo esc_attr( __( 'Select Month' ) ); ?>
        </option>
        <?php wp_get_archives( 'type=monthly&limit=12&format=option&show_post_count=1' ); ?>
      </select>
    </form>
  </div><!-- /.Archive -->

  <div id="b-sub-tag">
    <h4>Tag</h4>
    <div id="tag-inner" class="well well-sm">
      <?php wp_tag_cloud( 'smallest=12&largest=18&unit=px&number=30&orderby=count&order=DESC' ); ?>
    </div>
  </div><!-- /.Tag -->

</div><!-- /.B-Sub -->