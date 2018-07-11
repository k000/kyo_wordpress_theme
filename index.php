<?php get_header(); ?>

<!-- front -->
<div class="front-content">
  <div class="slider-content">
    <?php if(get_header_image()): ?>
    <img src="<?php header_image(); ?>">
    <?php endif; ?>
    <div class="front-text">
      <h1><?php bloginfo('name'); ?></h1>
      <P><?php bloginfo('description'); ?></P>
    </div>
  </div>
</div>


<div class="container-fluid mt-5">
  <div id="top-content">

      <?php
         $menu_name = 'headmenu';
         $locations = get_nav_menu_locations();
         $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
         $menu_items = wp_get_nav_menu_items($menu->term_id);
         if($menu_items):
      ?>
      <?php
        foreach ($menu_items as $menu):
        $page_id = $menu->object_id;
        $thumbnail_id = get_post_thumbnail_id($page_id);
        $image_attributes = wp_get_attachment_image_src($thumbnail_id,'large');
        $content = get_page($page_id);
      ?>
      <div class="top-child">
          <div class="thumb-area">
            <figure>
              <img src="<?php echo $image_attributes[0]; ?>">
            </figure>
          </div>

          <h2><?php echo $content->post_title; ?></h2>
          <div class="readmore-area">
            <a href="<?php echo get_permalink($page_id); ?>">readmore</a>
          </div>
      </div>

      <?php endforeach; ?>
      <?php endif; ?>



  </div>
</div><!-- end container -->


<div class="container-fluid mt-5 mb-5">
  <div class="row">
    <!--　セクションエリア -->
    <div class="col-md-8">

      <article>
        <?php get_template_part('loop'); ?>
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




<?php get_footer(); ?>
