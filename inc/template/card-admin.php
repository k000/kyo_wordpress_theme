<P>ここではトップページに表示される３枚の画像カードの設定を行います</P>
<!-- 基本設定項目 -->
<?php settings_errors(); ?>
<form method="post" action="options.php">
  <?php
    //ここでグループ名を指定する
  ?>
  <?php settings_fields('card-group'); ?>
  <?php do_settings_sections('galeoptionpage_card'); ?>
  <?php submit_button(); ?>
</form>
