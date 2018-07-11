
<footer>

  <div class="container-fluid footer-content text-center">
    <div class="row">

    <div class="col-md-4">
        <?php dynamic_sidebar('footer-left'); ?>
      </div>

      <div class="col-md-4">
        <?php dynamic_sidebar('footer-center'); ?>
      </div>

      <div class="col-md-4">
        <?php dynamic_sidebar('footer-right'); ?>
      </div>

    </div>

    <div class="copyright mt-4">
      <?php dynamic_sidebar('copyrigth'); ?><small>Theme:<a href="http://poridiet.com">KYO</a></small>
    </div>

  </div>

</footer>

</div><!-- headerのwapper -->

<!--
<script src="<?php echo get_template_directory_uri(); ?>/js/navmenu.js"></script>
-->

<script>

(function($) {
    $(function() {
        $('#nav-toggle').click(function(){

            $(".top-main-menu").toggleClass("open");
        });
    });
})(jQuery);

</script>

</body>
</html>
