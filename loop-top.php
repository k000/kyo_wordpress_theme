

<div class="section-post">
    <div class="section-area">

      <h2 class="text-center mt-4 mb-5">New Posts</h2>


      <?php if ( have_posts() ) : ?>
         <?php while( have_posts() ) : the_post(); ?>

    <!-- <div data-aos="zoom-in" data-aos-duration="700" class="contents-wrap"> -->
    <div class="contents-wrap box">
        <div class="contents-img">
            <figure class="snip1352"><img src="<?php echo mythumb(array(200,200)); ?>" alt="<?php the_title(); ?>"></figure>
            <div class="main-post-text"><?php the_category(); ?></div>
        </div>
        <div class="contents-text">
            <h3><a href="<?php the_permalink(); ?>"><P><?php the_title(); ?></P></a></h3>
            <P><?php the_excerpt(); ?></P>
             <P class="post-tag"><?php the_tags('',''); ?><br />
              <small><i class="far fa-calendar-alt fa-fw"></i><?php the_time('Y年n月j日'); ?></small>
             </P>
        </div>
    </div>

         <?php endwhile;?>
       <?php else : ?>
         <P>記事が見つかりませんでしたｗ</P>
       <?php endif; ?>


         <?php
           //Pagenation
           if (function_exists("pagination")) {
           pagination($additional_loop->max_num_pages);
           }
         ?>

    </div>
</div>
