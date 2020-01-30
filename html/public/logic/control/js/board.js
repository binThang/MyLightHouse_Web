function board(){
    show_hashtag(1);
    $('body').on('click','#write_bcategory',function(){
      var category = $('#bigcategory').val();
      console.log(category);
      $.ajax({
          url:'/admin/board/insert_category',
          type:'post',
          data:{category:category}
      }).success(function(data){
          var result = JSON.parse(data).return;
          if(result == 'success'){
              alert('입력되었습니다');
          }
      });
    });
    $('body').on('click','#write_scategory',function(){
        var category = $('#category').val();
        var hashtag = $('#hashtag').val();
      console.log(category);
      $.ajax({
          url:'/admin/board/insert_hashtag',
          type:'post',
          data:{category:category,hashtag:hashtag}
      }).success(function(data){
          var result = JSON.parse(data).return;
          if(result == 'success'){
              alert('입력되었습니다');
              location.reload();
          }
      });
    });

    var editor = $('#imgzone');
    var form = $('#form');
    $('body').on('click','button#backphoto',function(){
        $('#backfile').trigger('click');
    });
    $('body').on('change','#backfile',function(){
        var image = new FormData();
        for(var i=0;i<$(this)[0].files.length;i++){
            image.append('images[]',$(this)[0].files[i]);
        }
        if($(this).attr('data-width')){
            image.append('x',$(this).attr('data-width'));
            if($(this).attr('data-height')){
                image.append('y',$(this).attr('data-height'));
            }
        }
        $.ajax({
            url:'/upload/image',
            type:'post',
            contentType:false,
            processData:false,
            data:image
        }).success(function(data){
            if(JSON.parse(data).return="success"){
                images=JSON.parse(data).url;
                editor.append('<img src="/public/uploads/web/image/'+images+'">');
                $('#form').append('<input type = "hidden" class = "img" name = "img[]" value = "'+images+'">');
            }
        });
    });
    // $('body').on('click','#write_btna',function (){
    //     var video = $('#video').val();
    //     var kind = $('input[name=kind]:checked').val();
    //     var img = Array(); i = 0;
    //     $(".img").each(function(){
    //         img[i] = $(this).val();
    //         i++;
    //     });
    //     console.log(img);
    //     var check = false;
    //     if($('#videoradio').prop("checked") && video){
    //         check = true;
    //     }
    //     if($('#novideo').prop("checked") || $('#novideo_').prop("checked")){
    //         check = true;
    //     }
    //     if(($('.img').length || video) && check){
    //         if($('#videoradio').prop("checked")){
    //             $('.imgdiv').html('');
    //         }
    //         $.ajax({
    //             url:'/admin/fun/insert',
    //             type:'post',
    //             data:{
    //                 img: img,
    //                 video: video,
    //                 kind: kind
    //             }
    //         }).success(function(data){
    //             var result = JSON.parse(data).return;
    //             if(result == 'success'){
    //                 alert('등록되었습니다');
    //                 location.reload();
    //             }
    //             else{
    //                 alert('다시 시도해주세요');
    //             }
    //         });
    //         // $('#form').submit();
    //
    //     }
    //     else{ alert('사진 또는 영상을 등록해주세요');}
    //     console.log(check);
    // });
    $('body').on('click','#write_btnaa',function (){
        var img = Array(); i = 0;
        $(".img").each(function(){
            img[i] = $(this).val();
            i++;
        });

        if($('.img').length){
            $.ajax({
                url:'/admin/board/insert',
                type:'post',
                data:{
                    img: img
                }
            }).success(function(data){
                var result = JSON.parse(data).return;
                if(result == 'success'){
                    alert('등록되었습니다');
                    location.reload();
                }
                else{
                    alert('다시 시도해주세요');
                }
            });
            // $('#form').submit();

        }
        else{ alert('사진을 등록해주세요');}

    });
    $('#category').change(function() {
        // console.log($(this).val());
        var category = $(this).val();
        show_hashtag(category);
    });



    $('body').on('click','.hashtag',function(){
        var con = confirm('삭제하시겠습니까?');
        if(con){
            var hashtag_idx = $(this).attr('data-idx');
            $.ajax({
                url:'/admin/board/del_hashtag',
                type:'post',
                data:{
                    hashtag_idx : hashtag_idx
                }
            }).success(function(data){
                alert('삭제되었습니다');
                location.reload();
            });
        }
    });

}
function show_hashtag(idx){
    $('#hashtagzone').html('');
    $.ajax({
        url:'/admin/board/show_hashtag',
        type:'post',
        data:{
            idx : idx
        }
    }).success(function(data){
        var hashtext = '';
        console.log(data);
        var hashtag_idx = JSON.parse(data).hashtag_idx;
        var hashtag = JSON.parse(data).hashtag;
        var i = 0;
        while(hashtag_idx[i]){
            hashtext += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style = "display:inline-block;" class = "hashtag float left" data-idx = "'+hashtag_idx[i]+'">#'+hashtag[i]+'</div>';
            i++;
        }
        $('#hashtagzone').append(hashtext);
    });

}
