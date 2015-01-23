<?php
/*
Template Name: Another-Sidebar
*/

/* --------------------------------------------------
        another-sidebar.php
        Blog Theme "L"
-------------------------------------------------- */
?>

<?php get_header(); ?>

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
          
        </div><!-- /.Main Row -->
        <div id="b-sub" class="col-xs-12 col-sm-12 col-md-3">
          <div id="site-contents" class="list-group">
          <a href="/about/site/" class="list-group-item">
            <h4 class="list-group-item-heading">About</h4>
            <p class="list-group-item-text">このサイトや作者について</p>
          </a>
          <a href="/anime/" class="list-group-item">
            <h4 class="list-group-item-heading">Anime</h4>
            <p class="list-group-item-text">アニメの放送情報をまとめています</p>
          </a>
          <a href="/adoption/" class="list-group-item">
            <h4 class="list-group-item-heading">Adoption</h4>
            <p class="list-group-item-text">昔のメール投稿 + 採用結果</p>
          </a>
          <a href="/event/" class="list-group-item">
            <h4 class="list-group-item-heading">Event</h4>
            <p class="list-group-item-text">今まで参加してきたイベント遍歴</p>
          </a>
          <a href="/gadget" class="list-group-item">
            <h4 class="list-group-item-heading">Gadget</h4>
            <p class="list-group-item-text">ガジェットについて色々書いてます</p>
          </a>
          <a href="/gworks/" class="list-group-item">
            <h4 class="list-group-item-heading">New Blog Theme</h4>
            <p class="list-group-item-text">WordPress のテーマを作っています</p>
          </a>
          <a href="/contact/" class="list-group-item">
            <h4 class="list-group-item-heading">Contact</h4>
            <p class="list-group-item-text">サイトに関するお問い合わせなどはこちらからどうぞ</p>
          </a>
        </div><!-- /.B-Sub -->

<?php get_footer(); ?>