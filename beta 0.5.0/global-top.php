<?php
/*
Template Name: Global-Top
*/

/* --------------------------------------------------
    global-top.php
    Blog Theme "L"
-------------------------------------------------- */
?>

<?php
  include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php");
  include($_SERVER['DOCUMENT_ROOT'] . "/elements/navbar.php");
?>

<div id="m-contents" class="row">
  <div id="m-main" class="col-xs-12 col-md-9">
    <div class="jumbotron">
      <h2>Welcome to this Site!</h2>
      <p>このサイトは、サイト構築の練習をしたり、いろいろまとめたり、書き物をしたり・・・など「気まぐれに、マイペースに。」をモットーに色々なことをしているサイトです。</p>
    </div>
  </div><!-- M-Main -->
  <div id="m-sub" class="col-xs-12 col-sm-12 col-md-3">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/sidebar.php"); ?>
  </div><!-- M-Sub -->
</div><!-- M-Contents -->

<?php
  include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php");
?>