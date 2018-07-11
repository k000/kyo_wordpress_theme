(function() {
  //WordPress のエディタは TinyMCE  という外部のエディターが使われている
  //GaleEditorという名前にしている
	tinymce.create('tinymce.plugins.GaleEditor', {
    // ed : 現在開いているエディタの情報
    // url: このjsファイルのパス
		init : function(ed, url) {
			// two_col_gridというボタン名
			ed.addButton( 'two_col_grid', {
				title : '２カラム(レスポンシブ)', //ボタンのタイトル
				image : url + '/grid.png',  //アイコン画像
				cmd: '2grid_cmd'  //コマンド名下記と関連付けされている
			});
			// 2grid_cmdのコマンド内容
			ed.addCommand( '2grid_cmd', function() {
				result = "<div class='row'><div class='col-md-6 col-left'><P>コンテンツ左</P></div><div class='col-md-6 col-right'><P>コンテンツ右</P></div></div><P></P>";
        //決まり文句。return_textが処理内容。第二引数はfalseでも可（javascriptなので)
        ed.execCommand('mceInsertContent', 0, result);
			});


			// テーブルボタン設定
			ed.addButton( '3_col_grid', {
				title : '3カラム(レスポンシブ)',
				image : url + '/three-col.png',
				cmd: '3_col_cmd'
			});
			// テーブルボタンの動作
			ed.addCommand( '3_col_cmd', function() {
				result = '\
                    <div class="row">\
                      <div class="col-md-4 three-col-left"><p>左コンテツ</p></div>\
                      <div class="col-md-4 three-col-center"><p>中央コンテンツ</p></div>\
                      <div class="col-md-4 three-col-right"><p>右コンテンツ</p></div>\
                    </div>\
                    <P></P>\
                  ';

				ed.execCommand('mceInsertContent', 0, result);
			});

      ed.addButton('table_btn',{
        title : 'テーブル2カラム',
        image : url + '/table.png',
        cmd : 'table_cmd'
      });
      ed.addCommand('table_cmd',function(){
        result = '\
<table class="table">\
<thead class="thead">\
<tr>\
<td>1</td>\
<td>2</td>\
</tr>\
</thead>\
<tbody>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
</tbody>\
</table>\
<P></P>\
        ';
        ed.execCommand('mceInsertContent',0,result);
      });

      ed.addButton('table3_btn',{
        title : 'テーブル3カラム',
        image : url + '/table3.png',
        cmd : 'table3_cmd'
      });
      ed.addCommand('table3_cmd',function(){
        result = '\
<table class="table">\
<thead class="thead">\
<tr>\
<td>1</td>\
<td>2</td>\
<td>3</td>\
</tr>\
</thead>\
<tbody>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
<tr>\
<td>Cell</td>\
<td>Cell</td>\
<td>Cell</td>\
</tr>\
</tbody>\
</table>\
<P></P>\
        ';
        ed.execCommand('mceInsertContent',0,result);
      });


      ed.addButton( '4_col_grid', {
				title : '4カラム(レスポンシブ)', //ボタンのタイトル
				image : url + '/grid4.png',  //アイコン画像
				cmd: '4grid_cmd'  //コマンド名下記と関連付けされている
			});
			// 2grid_cmdのコマンド内容
			ed.addCommand( '4grid_cmd', function() {
				result = '\
          <div class="row">\
            <div class="col-sm-6 col-md-3 four-one"><p>左コンテンツ</p></div>\
            <div class="col-sm-6 col-md-3 four-two"><p>中央左コンテンツ</p></div>\
            <div class="col-sm-6 col-md-3 four-three"><p>中央右コンテンツ</p></div>\
            <div class="col-sm-6 col-md-3 four-four"><p>右コンテンツ</p></div>\
          </div>\
          <P></P>\
        ';
        //決まり文句。return_textが処理内容。第二引数はfalseでも可（javascriptなので)
        ed.execCommand('mceInsertContent', 0, result);
			});


      ed.addButton( '4_image_col_grid', {
				title : '3カラム(画像250*250で表示)', //ボタンのタイトル
				image : url + '/grid4.png',  //アイコン画像
				cmd: '4grid_image_cmd'  //コマンド名下記と関連付けされている
			});
			// 2grid_cmdのコマンド内容
			ed.addCommand( '4grid_image_cmd', function() {
				result = '\
          <div class="row image-fix text-center">\
					<div class="col-sm-6 col-md-3 four-one"><P>左コンテンツ</p></div>\
					<div class="col-sm-6 col-md-3 four-two"><p>中央左コンテンツ</p></div>\
					<div class="col-sm-6 col-md-3 four-three"><p>中央右コンテンツ</p></div>\
					<div class="col-sm-6 col-md-3 four-four"><p>右コンテンツ</p></div>\
          </div>\
          <P></P>\
        ';
        //決まり文句。return_textが処理内容。第二引数はfalseでも可（javascriptなので)
        ed.execCommand('mceInsertContent', 0, result);
			});

      //end




		},
		createControl : function(n, cm) {
			return null;
		},
	});
	/* プラグインに情報を登録する */
	tinymce.PluginManager.add( 'custom_button_script', tinymce.plugins.GaleEditor );
})();
