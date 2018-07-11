<div class="mb-3 text-center"><strong>「<?php the_search_query(); ?>」の検索結果</strong></div>

<?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>

<div class="main-post-area mb-5">
  <section class="posts">

      <h2><?php the_title(); ?></h2>
      <P><small><i class="far fa-calendar-alt fa-fw mb-3"></i><?php the_time('Y年n月j日'); ?>
        <i class="fas fa-marker"></i><?php the_category(' '); ?>
          <i class="fas fa-tags"></i><?php the_tags('',''); ?></small></P>

      <!-- アイキャッチ画像 -->
      <div class="thumb-area mb-4">
        <figure>
          <?php the_post_thumbnail('large'); ?>
        </figure>
      </div>
      <P><?php echo wp_trim_words($post->post_content,170,'...'); ?></P>
      <div class="readmore">
        <a href="<?php the_permalink(); ?>">readmore</a>
      </div>

  </sectio>
</div>

<?php endwhile;
  else :?>
  <P>記事が見つかりませんでした</P>
<?php endif; ?>


  <?php
      if (function_exists("pagination")) {
          pagination($additional_loop->max_num_pages);
        }
    ?>
