jQuery(document).ready(function($){

  var mediaUploader;
  var mediaUploader_center;
  var mediaUploader_right;
  var mediaUploader_parallax_first;



  $('#ogp-picture').on('click',function(e){

      e.preventDefault();
      if(mediaUploader_parallax_first){
        mediaUploader_parallax_first.open();
        return;
      }

      mediaUploader_parallax_first = wp.media.frames.file_frame = wp.media({
          title: 'OGP画像の設定',
          button: {
            text:'選択'
          },
          multiple:false
      });


      mediaUploader_parallax_first.on('select',function(){
          attachment = mediaUploader_parallax_first.state().get('selection').first().toJSON();
          //hidden項目の値をを設定する
          $('#ogpimage').val(attachment.url);
      });


      mediaUploader_parallax_first.open();


  });


  $('#parallax-second-image').on('click',function(e){

      e.preventDefault();
      if(mediaUploader_parallax_first){
        mediaUploader_parallax_first.open();
        return;
      }

      mediaUploader_parallax_first = wp.media.frames.file_frame = wp.media({
          title: '下部パララック背景画像の選択',
          button: {
            text:'選択'
          },
          multiple:false
      });


      mediaUploader_parallax_first.on('select',function(){
          attachment = mediaUploader_parallax_first.state().get('selection').first().toJSON();
          //hidden項目の値をを設定する
          $('#parallax-second').val(attachment.url);
      });


      mediaUploader_parallax_first.open();


  });


  $('#parallax-first-image').on('click',function(e){

      e.preventDefault();
      if(mediaUploader_parallax_first){
        mediaUploader_parallax_first.open();
        return;
      }

      mediaUploader_parallax_first = wp.media.frames.file_frame = wp.media({
          title: '上部パララック背景画像の選択',
          button: {
            text:'選択'
          },
          multiple:false
      });


      mediaUploader_parallax_first.on('select',function(){
          attachment = mediaUploader_parallax_first.state().get('selection').first().toJSON();
          //hidden項目の値をを設定する
          $('#parallax-first').val(attachment.url);
      });


      mediaUploader_parallax_first.open();


  });


  $('#upload-center-button').on('click',function(e){
      e.preventDefault();
      if(mediaUploader_center){
        mediaUploader_center.open();
        return;
      }

      mediaUploader_center = wp.media.frames.file_frame = wp.media({
          title: 'カード中央画像の選択',
          button: {
            text:'選択'
          },
          multiple:false
      });


      mediaUploader_center.on('select',function(){
          attachment = mediaUploader_center.state().get('selection').first().toJSON();
          //hidden項目の値をを設定する
          $('#center-picture').val(attachment.url);
      });


      mediaUploader_center.open();


  });



    $('#upload-button').on('click',function(e){
        e.preventDefault();
        if(mediaUploader){
          mediaUploader.open();
          return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'カード左画像の選択',
            button: {
              text:'選択'
            },
            multiple:false
        });


        mediaUploader.on('select',function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            //hidden項目の値をを設定する
            $('#left-picture').val(attachment.url);
        });


        mediaUploader.open();


    });



    $('#upload-right-button').on('click',function(e){
        e.preventDefault();
        if(mediaUploader){
          mediaUploader.open();
          return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'カード右画像の選択',
            button: {
              text:'選択'
            },
            multiple:false
        });


        mediaUploader.on('select',function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            //hidden項目の値をを設定する
            $('#right-picture').val(attachment.url);
        });


        mediaUploader.open();


    });
















});
