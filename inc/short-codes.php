<?php
/**
 * 独自ボタンを追加します。
 */
function custom_mce_buttons( $buttons ) {
	$buttons[] = 'two_col_grid'; // jsで指定したボタン名を入れる
	$buttons[] = '3_col_grid';
  $buttons[] = 'table_btn';
  $buttons[] = 'table3_btn';
  $buttons[] = '4_col_grid';
  $buttons[] = '4_image_col_grid';
	return $buttons;
}

/**
 * 独自ボタン用のスクリプトの読み込みを追加します。
 */
function custom_mce_external_plugins( $plugin_array ) {
	$plugin_array['custom_button_script'] = get_template_directory_uri() . "/js/myeditor.js";
	return $plugin_array;
}

add_filter( 'mce_buttons', 'custom_mce_buttons' );
add_filter( 'mce_external_plugins', 'custom_mce_external_plugins' );
