<?php

/*

@package gale

//////////////////////////
      ADMIN PAGE
//////////////////////////



*/



function gale_addadmin_page(){
  /*
  4:スラッグ名（urlのpostパラメータ)
  5:ファンクション名
  6:アイコン名
  7:セパレーター番号（表示順でデフォルトでは最後の番号になる)
  */

  //adminページにGaleOptionPageを作る
  add_menu_page('Kyo','KYO設定','manage_options','galeoptionpage','gale_create_option_page','',110);

  /*
  1:親のスラッグ名
  2:ページタイトル
  3:メニュータイトル
  4:capability
  5:スラッグ名
  6:コールバックメソッド名
  */

  //adminページにGaleOptionPageサブページを作る
  add_submenu_page('galeoptionpage','Kyo','基本設定','manage_options','galeoptionpage','gale_create_option_page');

  //新規サブ設定ページを作る
  //add_submenu_page('galeoptionpage','KYO基本設定','設定','manage_options','galeoptionpage_card','gale_card_options');
  //パララックスデザイン部分
  //add_submenu_page('galeoptionpage','パララックスデザイン部分','パララックス設定','manage_options','galeoptionpage_parallax','gale_parallax_options');

  //カスタム設定を活性化する
  add_action('admin_init','gale_custom_settings');

}
add_action('admin_menu','gale_addadmin_page');


function gale_custom_settings(){

  ///////////////////////////////////////////////
  //register_setting
  ///////////////////////////////////////////////
  //オプションを登録する
  //第三引数はサニタイズが必要な時にコールバックを設定する
  register_setting('gale-settings-group','meta_key');
  register_setting('gale-settings-group','ogp_picture');
  register_setting('gale-settings-group','twitter_id','sanitize_twitter_id');
  //register_setting('gale-settings-group','ogp_picture');
  ////////////////////////////////////////////////////////////////
  //カードのタイトル
  ////////////////////////////////////////////////////////////////
  //別のページにするためにグループをわける
  register_setting('card-group','left-card-title');
  register_setting('card-group','left_picture');
  register_setting('card-group','left-card-desc');
  //真ん中
  register_setting('card-group','center-card-title');
  register_setting('card-group','center_picture');
  register_setting('card-group','center-card-desc');
  //右
  register_setting('card-group','right-card-title');
  register_setting('card-group','right_picture');
  register_setting('card-group','right-card-desc');
  ////////////////////////////////////////////////////////////////
  //パララックスデザイン部分
  ////////////////////////////////////////////////////////////////
  register_setting('parallax-gropu','first-back');
  register_setting('parallax-gropu','first-title');
  register_setting('parallax-gropu','first-desc');

  register_setting('parallax-gropu','second-back');
  register_setting('parallax-gropu','second-title');
  register_setting('parallax-gropu','second-desc');

  ///////////////////////////////////////////////
  //add_settings_section
  ///////////////////////////////////////////////
  //php add_settings_section( $id, $title, $callback, $page );
  //メイン設定ページで使うので4は同じスラッグ？
  //第三引数がコールバック関数
  //第四引数がスラッグ名（ページ名)
  add_settings_section('gale-index-options','ツイッターOGP設定','gale_create_option_page','galeoptionpage');
  add_settings_section('gale-card-options','カード設定','gale_card_options','galeoptionpage_card');
  add_settings_section('gale-parallax-options','パララックスデザイン','gale_parallax_options','galeoptionpage_parallax');
  ///////////////////////////////////////////////
  //add_settings_field
  ///////////////////////////////////////////////
  //これはフィールド要素を出力しているように見える。
  //これで一つの塊的なやつに見える
  //テーブルの左側的なもの
  //( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() )
  //add_settings_field('index-name','MetaKey','gale_index_name','galeoptionpage','gale-index-options');
  //add_settings_field('index-description','Description','gale_index_description','galeoptionpage','gale-index-options');
  add_settings_field('index-ogppicture','OGP画像','gale_ogp_picture','galeoptionpage','gale-index-options');
  add_settings_field('index-twitter','TwitterID','gale_twitter','galeoptionpage','gale-index-options');

  add_settings_field('index-left-card-title','左カードのタイトル','input_left_card_title','galeoptionpage_card','gale-card-options');
  add_settings_field('index-left-card-picture','左画像','input_left_card_picture','galeoptionpage_card','gale-card-options');
  add_settings_field('index-left-card-desc','左カードの説明','input_left_card_desc','galeoptionpage_card','gale-card-options');

  add_settings_field('index-center-card-title','中央ードのタイトル','input_center_card_title','galeoptionpage_card','gale-card-options');
  add_settings_field('index-center-card-picture','中央画像','input_center_card_picture','galeoptionpage_card','gale-card-options');
  add_settings_field('index-center-card-desc','中央カードの説明','input_center_card_desc','galeoptionpage_card','gale-card-options');

  add_settings_field('index-right-card-title','右カードのタイトル','input_right_card_title','galeoptionpage_card','gale-card-options');
  add_settings_field('index-right-card-picture','右画像','input_right_card_picture','galeoptionpage_card','gale-card-options');
  add_settings_field('index-right-card-desc','右カードの説明','input_right_card_desc','galeoptionpage_card','gale-card-options');
  ///////////////////////////////////////////////
  //parallaxデザイン
  ///////////////////////////////////////////////
  add_settings_field('parallax-first_back','パララックス背景上部の画像','input_first_parallax_image','galeoptionpage_parallax','gale-parallax-options');
  add_settings_field('parallax-first_title','パララックス背景上部のタイトル','input_first_parallax_title','galeoptionpage_parallax','gale-parallax-options');
  add_settings_field('parallax-first_desc','パララックス背景上部の説明文','input_first_parallax_desc','galeoptionpage_parallax','gale-parallax-options');

  add_settings_field('parallax-second_back','パララックス背景下部の画像','input_decond_parallax_image','galeoptionpage_parallax','gale-parallax-options');
  add_settings_field('parallax-second_title','パララックス背景下部のタイトル','input_second_parallax_title','galeoptionpage_parallax','gale-parallax-options');
  add_settings_field('parallax-second_desc','パララックス背景下部の説明文','input_second_parallax_desc','galeoptionpage_parallax','gale-parallax-options');

}


//設定画面のメインメニュー的なもの
function gale_create_option_page(){
  //外部ファイルからhtmlを読み込む
  require_once( get_template_directory() . '/inc/template/gale-admin.php' );

}

function gale_card_options(){
  //ここで外部のフォームを読み込む
  require_once( get_template_directory() . '/inc/template/card-admin.php' );
}

function gale_parallax_options(){
  require_once( get_template_directory() . '/inc/template/parallax-admin.php' );
}







function gale_index_name(){
  $firstName = esc_attr(get_option( 'meta_key' ));
  echo '<input type="text" name="meta_key" value="'.$firstName.'" placeholder="first name" />';
}


function gale_index_description(){
  $description = esc_attr(get_option( 'user_description' ));
  echo '<input type="text" name="user_description" value="'.$description.'" placeholder="description" />';
}


function gale_ogp_picture(){
  $picture = esc_attr(get_option('ogp_picture'));
  echo '<input type="button" class="button button-secondary" value="OGP画像のアップロード" id="ogp-picture"><input type="hidden" id="ogpimage" name="ogp_picture" value="'.$picture.'" />：<b>'.$picture.'</b>';

}

function gale_twitter(){
  $twitterID = esc_attr(get_option( 'twitter_id' ));
  echo '<input type="text" name="twitter_id" value="'.$twitterID.'" placeholder="Twitterid" /><p class="description">@は不要です</p>';
}

//サニタイズ処理
function sanitize_twitter_id( $input ){
  $result = sanitize_text_field($input);
  $result = str_replace('@','',$result);
  return $result;
}


////////////////////////////////////////
//　カードのフォームのコールバック
////////////////////////////////////////


function input_left_card_title(){

  $left_card_title = esc_attr(get_option('left-card-title'));
  echo '<input type="text" name="left-card-title" value="'.$left_card_title.'" placeholder="左カードのタイトル" />';
}
function input_left_card_image(){
  $left_card_title = esc_attr(get_option('left-card-image'));
  echo '<input type="text" name="left-card-image" value="'.$left_card_title.'" placeholder="左カードの画像URL" />';
}
function input_left_card_desc(){
  $left_card_title = esc_attr(get_option('left-card-desc'));
  echo '<input type="text" name="left-card-desc" value="'.$left_card_title.'" placeholder="左カードの説明文" />';
}

function input_left_card_picture(){
  $picture = esc_attr(get_option('left_picture'));
  echo '<input type="button" class="button button-secondary" value="左画像のアップロード" id="upload-button"><input type="hidden" id="left-picture" name="left_picture" value="'.$picture.'" />：<b>'.$picture.'</b>';
}

function input_center_card_picture(){
  $picture = esc_attr(get_option('center_picture'));
  echo '<input type="button" class="button button-secondary" value="中央画像のアップロード" id="upload-center-button"><input type="hidden" id="center-picture" name="center_picture" value="'.$picture.'" />：<b>'.$picture.'</b>';
}

function input_right_card_picture(){
  $picture = esc_attr(get_option('right_picture'));
  echo '<input type="button" class="button button-secondary" value="右画像のアップロード" id="upload-right-button"><input type="hidden" id="right-picture" name="right_picture" value="'.$picture.'" />：<b>'.$picture.'</b>';
}


//-------------
function input_center_card_title(){
  $left_card_title = esc_attr(get_option('center-card-title'));
  echo '<input type="text" name="center-card-title" value="'.$left_card_title.'" placeholder="中央カードのタイトル" />';
}
function input_center_card_image(){
  $left_card_title = esc_attr(get_option('center-card-image'));
  echo '<input type="text" name="center-card-image" value="'.$left_card_title.'" placeholder="中央カードの画像URL" />';
}
function input_center_card_desc(){
  $left_card_title = esc_attr(get_option('center-card-desc'));
  echo '<input type="text" name="center-card-desc" value="'.$left_card_title.'" placeholder="中央カードの説明文" />';
}
//----------------
function input_right_card_title(){
  $left_card_title = esc_attr(get_option('right-card-title'));
  echo '<input type="text" name="right-card-title" value="'.$left_card_title.'" placeholder="右カードのタイトル" />';
}
function input_right_card_image(){
  $left_card_title = esc_attr(get_option('right-card-image'));
  echo '<input type="text" name="right-card-image" value="'.$left_card_title.'" placeholder="右カードの画像のURL" />';
}
function input_right_card_desc(){
  $left_card_title = esc_attr(get_option('right-card-desc'));
  echo '<input type="text" name="right-card-desc" value="'.$left_card_title.'" placeholder="右カードの説明文" />';
}


///////////////////////////////////////////////
//parallaxデザイン
///////////////////////////////////////////////
function input_first_parallax_image(){
  $image = esc_attr(get_option('first-back'));
  echo '<input type="button" class="button button-secondary" value="最初のパララックス背景画像" id="parallax-first-image"><input type="hidden" id="parallax-first" name="first-back" value="'.$image.'" />：<b>'.$image.'</b>';
}
function input_decond_parallax_image(){
  $image = esc_attr(get_option('second-back'));
  echo '<input type="button" class="button button-secondary" value="最後のパララックス背景画像" id="parallax-second-image"><input type="hidden" id="parallax-second" name="second-back" value="'.$image.'" />：<b>'.$image.'</b>';
}

function input_first_parallax_title(){
  $text = esc_attr(get_option('first-title'));
  echo '<input type="text" name="first-title" value="'.$text.'" placeholder="上タイトル文字列" style="width:90%;"/>';

}
function input_first_parallax_desc(){
  $text = esc_attr(get_option('first-desc'));
  echo '<textarea type="text" name="first-desc" placeholder="下説明文字列" rows="6" style="width:90%;">'.$text.'</textarea>';
}

function input_second_parallax_title(){
  $text = esc_attr(get_option('second-title'));
  echo '<input type="text" name="second-title" value="'.$text.'" placeholder="下タイトル文字列" style="width:90%;"/>';

}
function input_second_parallax_desc(){
  $text = esc_attr(get_option('second-desc'));
  echo '<textarea type="text" name="second-desc" placeholder="下説明文字列" rows="6" style="width:90%;">'.$text.'</textarea>';

}









//
