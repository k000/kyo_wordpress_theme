<?php if(have_posts()): while(have_posts()):the_post(); ?>


    <div class="container pankuzulist">
      <P><a href="<?php bloginfo('url') ?>" id="logo"><i class="fas fa-home"></i></a>＞<?php the_category(','); ?>＞<?php the_title(); ?></P>
    </div>

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

          <hr>


          <div class="nextprearea m-5">
            <?php get_template_part("nextprev"); ?>
          </div>




                <div class ="sns-area mt-5">
                  <!-- Twitter -->
                  <div id="sns-t">
                   <a class="btn--twitter" href="http://twitter.com/share?url=<?php the_permalink();?>&text=<?php echo get_the_title(); ?>&via=your_ID&tw_p=tweetbutton&related=your_ID" target="_blank">
                   <i class="fab fa-twitter"></i></a>
                  </div>

                  <!-- Facebook -->
                    <div id="sns-f">
                   <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php echo get_the_title(); ?>" target="_blank" class="btn--facebook">
                   <i class="fab fa-facebook-square"></i></a>
                    </div>
                  <!-- Google+ -->
                  <div id="sns-g">
                   <a class="btn--google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank">
                   <i class="fab fa-google-plus-square"></i></a>
                 </div>
                  <!-- B! Hatena -->
                  <div id="sns-h">
                   <a class="btn--hatena" target="_blank" href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php echo get_the_title(); ?>" target="_blank">
                   <i class="fas fa-question-circle"></i></a>
                 </div>
                  <!-- Line -->
                  <div id="sns-l">
                   <a class="btn--line" href="http://line.naver.jp/R/msg/text/?url=<?php the_permalink(); ?>" target="_blank">
                   <i class="fab fa-line"></i></a>
                 </div>

                  <!-- Pocket -->
                  <div id="sns-p">
                   <a class="btn--pocket" href="http://getpocket.com/edit?url=<?php the_permalink();?>&title=<?php echo get_the_title;?>" target="blank">
                   <i class="fab fa-get-pocket"></i></a>
                 </div>
                </div>




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
