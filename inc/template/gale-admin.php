<!-- 基本設定項目 -->

<P>OGP画像とはツイッターでシェアした時に表示される画像です。投稿記事のリンクにはアイキャッチ画像が反映されます</P>
<?php settings_errors(); ?>
<form method="post" action="options.php">
  <?php
    //ここでグループ名を指定する
  ?>
  <?php settings_fields('gale-settings-group'); ?>
  <?php do_settings_sections('galeoptionpage'); ?>
  <?php submit_button(); ?>
</form>
