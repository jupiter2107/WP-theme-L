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
          <div class="theme-L" style="background-color: #000000; color: #ffffff; padding: 5px;">
            フッターコンテンツが入ります。<br>
            横幅が 768px 以下のときは非表示になります。
          </div>
        </div>
        <div id="copyright">
          <p class="text-center">Copyright &copy; <?php echo date('Y')?> <a href="<?php echo home_url("/"); ?>"><?php bloginfo("name"); ?></a> All Rights Reserved.</p>
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