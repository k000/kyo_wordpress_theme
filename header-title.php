<title><?php if(is_home()): ?>
<?php bloginfo('name'); ?>
<?php elseif(is_page()) : ?>
<?php echo trim(wp_title('', false)); ?>
<?php elseif(is_single()) : ?>
<?php echo trim(wp_title('', false)); ?>
<?php elseif(is_month()) : ?>
<?php the_time("Y年m月") ?>の記事一覧 | <?php bloginfo('name') ?>
<?php elseif(is_year()) : ?>
<?php the_time("Y年") ?>の記事一覧 | <?php bloginfo('name') ?>
<?php elseif(is_search()) : ?>
検索結果 | <?php bloginfo('name') ?>
<?php else: ?>
<?php bloginfo('name'); ?>
<?php endif; ?></title>
