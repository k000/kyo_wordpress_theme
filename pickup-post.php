<?php

  $location_name = 'pickuppost';
  $locations = get_nav_menu_locations();
  $myposts = wp_get_nav_menu_items($locations[$location_name]);

  if($myposts) : ?>

  <div class="pickup-outer">
  <h4 class="text-center">オススメ記事</h4>
  <div class="pickup-post-area">


  <?php foreach ($myposts as $post) :
    if($post->object == 'post'):
      $post = get_post($post->object_id);
        setup_postdata($post); ?>
          <div class="pickup-child">
              <div class="thumb-area">
                <figure><?php the_post_thumbnail(); ?></figure>
              </div>
              <div class="text-area">
                <P><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></P>
              </div>
          </div>

    <?php endif; ?>
    <?php endforeach; ?>

    </div>
  </div>

    <?php wp_reset_postdata(); endif; ?>
