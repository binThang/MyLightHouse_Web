function editor(){
    if($('.editor').length){
        $('div.editor').parent().addClass('relative').prepend('<div class="editor_control"></div>');
        $('div.editor_control').prepend('<input type="file" class="hidden image" accept="image/*" multiple="true">');
        $('div.editor_control').prepend('<button type="button" class="image">사진</button>');
    }
    if(first){
        editorInit();
        first=false;
    }
}
function editorInit(){
    $('body').on('click','button.image',function(){
        $(this).next().trigger('click');
    });
    $('body').on('change','div.editor_control input.image',function(){
        var editor=$(this).parent().next();
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
                var sel = document.getSelection();
                select=($(sel.anchorNode).hasClass('editor'))?1:$(sel.anchorNode).parents('.editor').length;
                if(select){
                    var rng  = sel.getRangeAt(0);
                    var frag =document.createDocumentFragment();
                    var div  = document.createElement("div");
                }
                for(var i=0;i<images.length;i++){
                    if (select) {
                        div.innerHTML = '<img src="/public/uploads/web/image/'+images[i]+'">';
                        frag.appendChild(div.firstChild);
                    }else{
                        editor.append('<img src="/public/uploads/web/image/'+images[i]+'">');
                    }
                }
                if(select){
                    rng.deleteContents();
                    rng.insertNode(frag);
                }
            }
        });
    });
}
