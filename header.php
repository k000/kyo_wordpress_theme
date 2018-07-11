
<!DOCTYPE html>
<html lang="ja">

    <head prefix="og: http://ogp.me/ns#">
        <?php get_template_part('header-title'); ?>
        <?php get_template_part('ogp'); ?>

        <meta charset="<?php bloginfo('charset') ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- seo -->
        <?php if(is_home()) : ?>
        <meta name="title" content="<?php bloginfo('name') ?>" />
        <meta name="description" content="<?php bloginfo('description'); ?>" />
        <?php elseif(is_single() || is_page()) : ?>
          <meta name="title" content="<?php bloginfo('name') ?> | <?php the_title(); ?>" />
          <meta name="description" content="<?php echo wp_trim_words($post->post_content,100,'...'); ?>" />
        <?php endif; ?>
        <!-- end seo -->

        <!-- スマホ -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <!-- end すまほ　-->

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
        
        <?php wp_head(); ?>
    </head>
    <body>
<!-- footerで閉じる　-->
<div id="wrapper">




<header class="top-menu">

      <span id="nav-toggle">
        <i class="fas fa-bars"></i>
      </span>

      <span id="logo"><a href="<?php bloginfo('url') ?>"><?php bloginfo('name'); ?></a></span>

  <nav class="top-main-menu">
          <ul>
            <?php wp_list_pages( array( 'title_li' => '' ) ); ?>
          </ul>
  </nav>
</header>
