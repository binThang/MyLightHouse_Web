var count=2,stop=false;
var link = document.location.href;
var array = link.split('/');
$(function(){
    $('body').on('click','.newpage',function(){
        var url = $(this).attr('data-url');
        var category = $(this).attr('data-category');
        var text = '';
        console.log(array);
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.newpage(url,text,'');
         }else{
             var array = [url,text,''];
           window.webkit.messageHandlers.newpage.postMessage(array);
         }
     });

        $('article').scroll(function(){
    		if($(window).scrollTop()>$(document).height()-($(window).height()*1.5)){
    			if(!stop){
    				stop=true;
    				scroll1();
    			}
    		}
    	})

});
function scroll1(){
    $.ajax({
        url:'/search/list2/'+array[5]+'/'+array[6]+'/'+count,
          type:'GET'
    }).success(function(data){
        $('#listup').append(data);
        count++;
        stop=false;
    });
}

function search(word){
    $.ajax({
        url:'/search/index',
        type:'post',
        data:{word:word}
    }).success(function(data){
        $('html').html(data);
        $('.info-txt').removeClass('hidden');
        $('#word').text(word);

    });
}

function nosearch(){
    $('.info-txt').addClass('hidden');
}
