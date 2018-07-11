<div class="container">

<?php
   // コメントリストの表示
   if(have_comments()):

      $args = array(
        'style' => 'div',
        'type' => 'comment',
        'avatar_size' => 0,

      );

   ?>
       <h4 id="comments">この記事に対するコメント</h4>

       <ol class="commets-list">
           <?php wp_list_comments($args); ?>
       </ol>
   <?php
 endif; ?>



<?php $defaults = array(
    'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-primary page-link text-dark d-inline-block" value="%4$s" />',
    'title_reply' => '<small>この記事にコメントする</small>',
     'comment_notes_before' => '',/* ここで「メールアドレスが公開されることはありません」を削除 */
     'comment_field'        => '<div class="form-group"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-controll"></textarea></p></div">',
     'fields' => array(
          'author' => '<div class="form-group"><p class="comment-form-author">' . '<label for="author" class="form-controll">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                 '<input id="author" class = "form-controll" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p></div>',/* ここは投稿者名のフォーム */
          'email'  => '',//削除
          'url'    => '',)//削除
); ?>

<?php comment_form( $defaults ); ?>


</div>
