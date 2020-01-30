
function pusha(){
    var editor = $('#imgzone');
    $('body').on('click','#write_push',function(){
      var title = $('#title').val();
      var img = $('#img').val();
      console.log(img);
      if(title){
          $.ajax({
              url:'/admin/push/insert_push',
              type:'post',
              data:{title:title,img:img}
          }).success(function(data){
              var result = JSON.parse(data).return;
              alert(result);
            //   if(result == 'success'){
                  alert('입력되었습니다');
                //   location.reload();
            //   }
            //   else{
            //       alert('다시 시도해주세요');
            //   }
          });
      }
      else{
          alert('입력해주세요');
      }
    });
    $('body').on('click','button#photopush',function(){
        $('#filepush').trigger('click');
        console.log('a');
    });

    $('body').on('change','#filepush',function(){
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
                for(var i=0;i<images.length;i++){
                    editor.append('<img src="/public/uploads/web/image/'+images[i]+'">');
                    $('#imgzone').append('<input type = "hidden" id = "img" class = "img" name = "img[]" value = "'+images[i]+'">');
                }
            }
        });
    });
}
