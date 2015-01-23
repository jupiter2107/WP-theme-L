<?php
/*
 * footer.php
 * WP Theme "L"
 */
?>

      </div><!-- /.B-Content -->

      <div id="footer">
        <hr>
        <div id="foo-contents">
          <div class="panel panel-default">
            <div class="panel-body">
              フッターコンテンツが入ります。<br>
              横幅が 768px 以下のときは非表示になります。
            </div>
          </div>
        </div>
        <div id="copyright">
          <p class="text-center">Copyright &copy; 2009 - <?php echo date('Y')?> <a href="/">minerva.moe.in / ミネルバ @jupiter2107</a> All Rights Reserved.</p>
        </div>
      </div><!--/.Footer -->
    </div><!--/.Container -->

    <div id="back-to-top">
      <p class="pagetop"><a href="#">▲</a></p>
    </div><!-- /.Back-to-Top -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Plugins -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/pagetop.js"></script>
    <!-- WP-footer-Plugins -->
    <?php wp_footer(); ?>
  </body>
</html>