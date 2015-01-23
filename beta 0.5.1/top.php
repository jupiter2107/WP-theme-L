<?php
/*
Template Name: Top
*/

/* --------------------------------------------------
    top.php
    Blog Theme "L"
-------------------------------------------------- */
?>

<?php get_header(); ?>
<?php get_template_part('banner'); ?>
<?php get_template_part('navbar'); ?>

      <div id="b-content" class="row">
        <div id="b-main" class="col-xs-12 col-sm-8 col-md-9">

          <div class="jumbotron">
            <h2>Welcome to this Site!</h2>
            <p>このサイトは、サイト構築の練習をしたり、いろいろまとめたり、書き物をしたり・・・など「気まぐれに、マイペースに。」をモットーに色々なことをしているサイトです。</p>
          </div>
        </div><!-- B-Main -->

        <?php get_template_part('sidebar', 'page'); ?>

<?php get_footer(); ?>