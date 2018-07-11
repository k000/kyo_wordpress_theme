<?php

//前の記事
$prevpost = get_adjacent_post(false,'',true);
$nextpost = get_adjacent_post(false,'',false);

if($prevpost or $nextpost){

  ?>
    <div class="nextprev-outer">
  <?php

if($prevpost) : ?>


  <div class="child">
    <P>前の記事</p>
    <div class="thumb-area">
        <figure><?php echo get_the_post_thumbnail($prevpost->ID,'large'); ?></figure>
    </div>
    <div class="text-area">
      <a href="<?php echo get_permalink($prevpost->ID); ?>"><?php echo get_the_title($prevpost->ID); ?></a>
    </div>
  </div>


<?php else : ?>

<?php endif; ?>

<?php
if ( $nextpost ) : ?>

  <div class="child">
    <P>次の記事</p>
    <div class="thumb-area">
      <figure><?php echo get_the_post_thumbnail($nextpost->ID,'large'); ?></figure>
    </div>
    <div class="text-area">
      <a href="<?php echo get_permalink($nextpost->ID); ?>"><?php echo get_the_title($nextpost->ID); ?></a>
    </div>
  </div>

<?php else : ?>

<?php endif; ?>

  </div><!-- end outer -->


<?php } ?>
