<!--ogp設定-->
<!-- 基本設定 -->
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
  <meta property="og:local" content="ja_JP"/>
<!-- 詳細設定 -->
<?php if(is_home()) : ?>
  <meta property="og:type" content="website"/>
  <meta property="og:title" content="<?php bloginfo('name'); ?>"/>
  <meta property="og:description" content="<?php bloginfo('description'); ?>" />
  <meta property="og:url" content="<?php bloginfo('url'); ?>" />
  <!-- 画像の設定がしてあること -->
  <?php if(!empty(get_option('ogp_picture'))) : ?>
    <meta property="og:image" content="<?php echo esc_attr(get_option('ogp_picture')) ?>" />
  <?php endif; ?>
  <!-- twitterIDが登録されていること -->
  <?php if(!empty(get_option('twitter_id'))) : ?>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@<?php echo esc_attr(get_option('twitter_id')) ?>" />
    <meta name="twitter:image" content="<?php echo esc_attr(get_option('ogp_picture')) ?>">
  <?php endif; ?>
<?php endif; ?>
<?php if(is_single() || is_page()) : ?>
  <meta property="og:type" content="article" />
  <meta property="og:title" content="<?php the_title(); ?>" />
  <meta property="og:description" content="<?php echo wp_trim_words($post->post_content,100,'...'); ?>" />
  <meta property="og:url" content="<?php the_permalink(); ?>" />
  <!-- 画像の設定がしてあること -->
  <?php if( has_post_thumbnail()) : ?>
    <?php $pt = wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
    <meta property="og:image" content="<?php echo $pt[0]; ?>" />
  <?php elseif(!empty(get_option('ogp_picture'))) : ?>
    <meta property="og:image" content="<?php echo esc_attr(get_option('ogp_picture')) ?>" />
  <?php endif; ?>
  <!-- twitterIDが登録されていること -->
  <?php if(!empty(get_option('twitter_id'))) : ?>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@<?php echo esc_attr(get_option('twitter_id')) ?>" />
    <?php if( has_post_thumbnail()) : ?>
      <?php $pt = wp_get_attachment_image_src(get_post_thumbnail_id()); ?>
      <meta property="og:image" content="<?php echo $pt[0]; ?>" />
    <?php elseif(!empty(get_option('ogp_picture'))) : ?>
      <meta property="twitter:image" content="<?php echo esc_attr(get_option('ogp_picture')) ?>" />
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>
<!-- end ogp -->
