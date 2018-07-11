
<?php get_header(); ?>



<div class="container-fluid mt-5 mb-5">
  <div class="row">
    <!--　セクションエリア -->
    <div class="col-md-8">

      <article>
        <?php get_template_part('loopposts-single'); ?>



      </article>

    </div>
    <!-- サイドバーエリア -->
    <div class="col-md-4">

      <aside>

        <?php dynamic_sidebar("sidebar"); ?>

      </aside>

    </div>
  </div>
</div>



<?php setpostViewsCount(get_the_ID()); ?>
<?php get_footer(); ?>
