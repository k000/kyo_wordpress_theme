<?php






//incフォルダのファイルを読み込む
//カスタムオプション関連（アドミンメニュー)
require get_template_directory() . '/inc/function-admin.php';
//カスタムウィジェット関連
require get_template_directory() . '/inc/custom-widget.php';
//ショートコード関連
require get_template_directory() . '/inc/short-codes.php';


////////////////////////////////////////////
//  cssの登録（ビジュアルエディタ用)
////////////////////////////////////////////
add_editor_style('editor-style.css');




function custom_editor_settings( $initArray ) {
    $initArray['body_class'] = 'editor-area';
    return $initArray;
}

add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );


//////////////////////////////////
//
//////////////////////////////////
add_action( 'admin_enqueue_scripts', function(){
wp_enqueue_media();
} );

// ＜？php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ？＞
wp_register_script('gale-script',get_template_directory_uri() . '/js/gale.js',array('jquery'),'1.0.0',true);
wp_enqueue_script('gale-script');





function new_excerpt_mblength($length) {
     return 150; //抜粋する文字数を50文字に設定
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');


function new_excerpt_more($more) {
    return '　...';
}
add_filter('excerpt_more', 'new_excerpt_more');


add_theme_support('custom-header',array(
    'width' => 1000,
    'height' => 250,
    'header-text' => false,
    'default-image' => get_template_directory_uri() . '/img/1.jpg',

));

//wp-headerのせいでできる管理バーの28px空間を削除する
add_filter( 'show_admin_bar', '__return_false' );



add_theme_support( 'post-thumbnails', array('post','page'));



//アイキャッチ画像を返却する関数
function mythumb( $size ) {

	if( has_post_thumbnail() ) {
		$postthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );
		$url = $postthumb[0];
	} else {
		$url = get_template_directory_uri() . '/noimage.png';
	}

	return $url;

}


//カスタムメニュー
register_nav_menus(array(
  'headmenu' => 'トップページに表示する３つの記事。推奨数３記事。アイキャッチ画像は必ずつけてください',
  'pickuppost' => 'オススメ記事。投稿記事本文下に出力されます'
));


//タグクラウドのstyleを削除する
function delete_tag_cloud_size($tags){
  $match = array(
    "/ style='font-size: \d+(\.)*\d*(pt|px|em|\%);'/i"
  );
  return preg_replace( $match, '',  $tags );
}
add_filter( 'tagcloud', 'delete_tag_cloud_size' );




//クラス名の削除
add_filter('post_thumbnail_html','custom_attribute');
function custom_attribute($html){
  $html = preg_replace('/class=".*\w+"\s/','',$html);
  return $html;
}


function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }

     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
		 echo "<div class=\"pagenation\">\n";
		 echo "<ul>\n";
		 //Prev：現在のページ値が１より大きい場合は表示
         if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }
		//Next：総ページ数より現在のページ値が小さい場合は表示
		if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
		echo "</ul>\n";
		echo "</div>\n";
     }
}








//wp head の余計なものを削除する

remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head');
// Since 4.4
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','rest_output_link_wp_head');





///////////////////////////////////////
// 投稿本文中ウィジェットの追加
///////////////////////////////////////
register_sidebars(1,
  array(
  'name'=>'投稿本文中',
  'id' => 'widget-in-article',
  'description' => '投稿本文中に表示されるウイジェット。文中最初のH2タグの手前に表示されます。',
  'before_widget' => '<div id="%1$s" class="widget-in-article %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<div class="widget-in-article-title">',
  'after_title' => '</div>',
));

///////////////////////////////////////
//H2見出しを判別する正規表現を定数にする
///////////////////////////////////////
define('H2_REG', '/<h2.*?>/i');//H2見出しのパターン

///////////////////////////////////////
//本文中にH2見出しが最初に含まれている箇所を返す（含まれない場合はnullを返す）
//H3-H6しか使っていない場合は、h2部分を変更してください
///////////////////////////////////////
function get_h2_included_in_body( $the_content ){
  if ( preg_match( H2_REG, $the_content, $h2results )) {//H2見出しが本文中にあるかどうか
    return $h2results[0];
  }
}

///////////////////////////////////////
// 投稿本文中の最初のH2見出し手前にウィジェットを追加する処理
///////////////////////////////////////
function add_widget_before_1st_h2($the_content) {
  if ( is_single() && //投稿ページのとき、固定ページも表示する場合はis_singular()にする
       is_active_sidebar( 'widget-in-article' ) //ウィジェットが設定されているとき
  ) {
    //広告（AdSense）タグを記入
    ob_start();//バッファリング
    dynamic_sidebar( 'widget-in-article' );//本文中ウィジェットの表示
    $ad_template = ob_get_clean();
    $h2result = get_h2_included_in_body( $the_content );//本文にH2タグが含まれていれば取得
    if ( $h2result ) {//H2見出しが本文中にある場合のみ
      //最初のH2の手前に広告を挿入（最初のH2を置換）
      $count = 1;
      $the_content = preg_replace(H2_REG, $ad_template.$h2result, $the_content, 1);
    }
  }
  return $the_content;
}
add_filter('the_content','add_widget_before_1st_h2');



//hotpost
function getPostViews($postID){
  //メタネーム(カスタムフィールド名)
  $count_key = 'post_views_count';
  //カスタムフィールド情報を取得する
  //1:投稿ID 2:カスタムフィールドの名前
  //3:単一のカスタムフィールドの値を取得する場合はtrue、複数のカスタムフィールドの値を取得する場合はfalseを指定（省略時は''）。
  $count = get_post_meta($postID,$count_key,true);
  if($count == ''){
      //投稿から指定したキー（もしくはキーと値）を持つカスタムフィールドをすべて削除します。
      delete_post_meta($postID,$count_key);
      //投稿や固定ページにカスタムフィールドを追加します（メタデータとも呼ばれています)
      add_post_meta($postID,$count_key,'0');
      return '0 View';
  }
  return $count.' View';
}


function setPostViews($postiD){
  $count_key = 'post_views_count';

  $count = get_post_meta($postID,$count_key,true);
  if($count == ''){
    $count = 0;
    delete_post_meta($postID,$count_key);
    add_post_meta($postID,$count_key,'0');
  }else{
    $count++;
    update_post_meta($postID,$count_key,$count);
  }
}



function setpostViewsCount($postID){
  $count_key = "postviews_count";
  $count = get_post_meta($postID,$count_key,true);
  $count ++;
  update_post_meta($postID,$count_key,$count);
}
