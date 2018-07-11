<?php if(have_posts()): while(have_posts()):the_post(); ?>


    <div class="container mb-5 post-area">

      <div class="post-title mb-5">
        <h1><?php the_title(); ?></h1>
      </div>

      <div class="row">
        <div class="col">
          <?php if(is_single()): ?>
          <small><i class="far fa-calendar-alt fa-fw mb-3"></i><?php the_time('Y年n月j日'); ?></small>
          <HR>
          <?php dynamic_sidebar("post-top"); ?>
          <?php endif; ?>
          <?php the_content(); ?>
    
        </div>
      </div>
    </div>

<?php endwhile;?>
<?php else : ?>
  <P>記事が見つかりませんでしたｗ</P>
<?php endif; ?>

<?php if(is_single()): ?>
  <?php dynamic_sidebar("post-bottom"); ?>
  <?php get_template_part("pickup-post"); ?>
<?php endif; ?>
