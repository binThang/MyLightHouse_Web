
function fun(){
    var editor = $('#imgzone');
    var form = $('#form');
    $('body').on('click','button#photo',function(){
        $('#file1').trigger('click');
        console.log('a');
    });
    $('body').on('change','#file1',function(){
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
                    $('#form').append('<input type = "hidden" class = "img" name = "img[]" value = "'+images[i]+'">');
                }
            }
        });
    });
    $('body').on('click','#write_btna',function (){
        var video = $('#video').val();
        var kind = $('input[name=kind]:checked').val();
        var img = Array(); i = 0;
        $(".img").each(function(){
            img[i] = $(this).val();
            i++;
        });
        console.log(img);
        var check = false;
        if($('#videoradio').prop("checked") && video){
            check = true;
        }
        if($('#novideo').prop("checked") || $('#novideo_').prop("checked")){
            check = true;
        }
        if(($('.img').length || video) && check){
            if($('#videoradio').prop("checked")){
                $('.imgdiv').html('');
            }
            $.ajax({
                url:'/admin/fun/insert',
                type:'post',
                data:{
                    img: img,
                    video: video,
                    kind: kind
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
        else{ alert('사진 또는 영상을 등록해주세요');}
        console.log(check);
    });
    $('body').on('click','#update_btna',function (){
        var funboard_idx = $('#funboard_idx').val();
        console.log(funboard_idx);
        var video = $('#video').val();
        var kind = $('input[name=kind]:checked').val();
        var img = Array(); i = 0;
        $(".img").each(function(){
            img[i] = $(this).val();
            i++;
        });
        console.log(img);
        var check = false;
        if($('#videoradio').prop("checked") && video){
            check = true;
        }
        if($('#novideo').prop("checked") || $('#novideo_').prop("checked")){
            check = true;
        }
        if(($('.img').length || video) && check){
            if($('#videoradio').prop("checked")){
                $('.imgdiv').html('');
            }
            $.ajax({
                url:'/admin/fun/update',
                type:'post',
                data:{
                    img: img,
                    video: video,
                    kind: kind,
                    funboard_idx : funboard_idx
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
        else{ alert('사진 또는 영상을 등록해주세요');}
        console.log(check);
    });

// $(test1).prop("checked");
    $('body').on('click','#videoradio',function (){
        if($(this).prop("checked")){
            $('#video').prop('disabled', false);
            $('#file').prop('disabled', true);
            $('.imgdiv').addClass('hidden');
        }
    });
    $('body').on('click','#novideo',function (){
        if($(this).prop("checked")){
            $('#video').prop('disabled', true);
            $('#file').prop('disabled', false);
            $('.imgdiv').removeClass('hidden');
        }
    });
    $('body').on('click','#novideo_',function (){
        if($(this).prop("checked")){
            $('#video').prop('disabled', true);
            $('#file').prop('disabled', false);
            $('.imgdiv').removeClass('hidden');
        }
    });
    $('body').on('click','.click',function (){
        if(confirm('삭제하시겠습니까?'))
            $(this).parent().remove();

    });

}
