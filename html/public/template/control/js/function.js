var fn=Array();
function loadAction(){
    $('.on > .ajax').addClass('no');
	editor();
    timer();
    $('body').removeClass('show-menu');
    id=$('article').last().attr('id');
    if(!fn[id]){
        console.log(fn[id]);
        fn[id]=window[id];
        if(typeof fn[id]==='function'){
            fn[id]();
        }
    }
}
function include(){
	date=new Date();
	for(i=0;i<inc_array.length;i++){
		$('head').append('<script src="/public/logic/control/js/'+inc_array[i]+'.js?'+date+'"></script>');
	}
}
function beforeWrite(){
    req=true;
    if($('form').hasClass('app')){
        console.log($('.editor').next().val());
        $('#app_image').remove();
        imgs=new Array();
        $('.editor').find('img').each(function(){
            imgs.push($(this).attr('src'));
        });
        $('<input type="text" id="app_image" name="image" class="hidden" value="'+imgs.join(',')+'">').appendTo($('form'));
    }
    $('.editor').next().val($('.editor').html());
    $('form').find('.req').each(function(){
        if(!$(this).val().trim()){
            req=false;
            return false;
        }
    });
    if(!req){
        return false;
    }
    if($('#form_pass.req').length){
        if($('#form_pass').val().length<8){
            console.log('aaa');
            return false;
        }else{
            return true;
        }
    }else{
        return true;
    }
}
function menuAction(){

}

function moveAction(){

}
function scrollAction(){

}
function resizeAction(){

}
