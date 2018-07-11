<P>ここではトップページに表示されるパララックスデザイン部分の設定を行います<br />
  パララックスデザインとは、インデックスページの巨大な背景画像とテキストがセットになっている部分のデザインです</p>
<!-- 基本設定項目 -->
<?php settings_errors(); ?>
<form method="post" action="options.php">
  <?php
    //ここでグループ名を指定する
  ?>
  <?php settings_fields('parallax-gropu'); ?>
  <?php do_settings_sections('galeoptionpage_parallax'); ?>
  <?php submit_button(); ?>
</form>
