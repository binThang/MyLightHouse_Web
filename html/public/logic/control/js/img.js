
function image(){
    var editor1 = '';
    var kind = '';
    $('body').on('click','button#photo1',function(){
        $('#file1').trigger('click');
        kind = 1;
        editor1 = $('#imgzone1');
    });
    $('body').on('click','button#photo2',function(){
        console.log('a');
        $('#file1').trigger('click');
        kind = 2;
        editor1 = $('#imgzone2');
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
                console.log(images[0]);
                console.log(editor1);
                console.log(kind);
                editor1.html('<img src="/public/uploads/web/image/'+images+'">');
                $.ajax({
                    url:'/admin/image/insert',
                    type:'post',
                    data:{
                        images:images[0],
                        kind:kind
                    }
                }).success(function(data){
                    var result = JSON.parse(data).return;
                    console.log(result);
                    if(result == 'success'){
                        // location.reload();
                    }

                });
            }
        });
    });

}
