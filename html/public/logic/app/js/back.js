$(document).bind("mobileinit", function () {
	$.event.special.swipe.scrollSupressionThreshold = (screen.availWidth) / 5;
	$.event.special.swipe.horizontalDistanceThreshold = (screen.availWidth) / 3;
	$.event.special.swipe.verticalDistanceThreshold = (screen.availHeight) / 5;
});

$(document).on({
    ajaxStart: function() { $('body').addClass("loading");    },
     ajaxStop: function() { $('body').removeClass("loading"); }    
});

var count=2,stop=false;
var link = document.location.href;
var array = link.split('/');
$(function(){
    //브릿지
    $('body').on('click','.sajin',function(){
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.sajin();
       }else if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
           window.webkit.messageHandlers.sajin.postMessage('');
       }
     });

    $('body').on('click','.tag',function(){
        if($(this).hasClass('on')){
            $(this).removeClass('on');
        }
        else{
            $(this).addClass('on');
        }
    });
    //플로팅버튼
    $('body').on('click', '.btn-plus button', function(){
        if ($('.btn-box').hasClass('hidden')) {
            $(this).find('img').css({'transform':'rotate(45deg)'});
            $('.btn-box').removeClass('hidden');
        } else {
            $(this).find('img').css({'transform':'rotate(90deg)'});
            $('.btn-box').addClass('hidden');
        }
    });

    //사진이미지고르기
    $('body').on('click', '.btn-photo', function(){
        $('.photo-con').removeClass('hidden');
        $.ajax({
            url:'/back/select_gallery'
        }).success(function(data){
            var idx = JSON.parse(data).gallery_idx;
            var image = JSON.parse(data).image;
            var color = JSON.parse(data).color;
            var i = 0, str = '';
            while(idx[i]){
                str += '<li><button type="button" class = "selectpic"><img src="/public/uploads/mobile/image/'+image[i]+'" data-idx = "'+idx[i]+'" data-color = "'+color[i]+'" alt="사진 이미지"></button></li>';
                i++;
            }
            $('#gallery').html(str);
        });
    });
    //사진 선택
     $('body').on('click','.selectpic',function(){
        if( /Android/i.test(navigator.userAgent)) {
            window.lighthouse.selectpic();
        }else if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
            window.webkit.messageHandlers.selectpic.postMessage('');
        }
        $('.photo-con').addClass('hidden');
        $(this).children().attr('src');
        var img = $(this).children().attr('src');
        var idx = $(this).children().attr('data-idx');
        var color = $(this).children().attr('data-color');
        $('#backimg').css("background-image", "url("+img+")");
        $('#backimg').attr('data-idx',idx);
        console.log(color);
        if(color == 1){
            $('.colorwhite').addClass('hidden');
            $('.colorblack').removeClass('hidden');
            $('#text').removeClass('textblack');
            $('#text').addClass('textwhite');
            $('.colorwhite').attr('data-on','');
            $('.colorblack').attr('data-on','on');
            $('.hashtag').removeClass('textblack');
            $('.hashtag').addClass('textwhite');
        }else {
            $('.colorblack').addClass('hidden');
            $('.colorwhite').removeClass('hidden');
            $('#text').removeClass('textwhite');
            $('#text').addClass('textblack');
            $('.colorblack').attr('data-on','');
            $('.colorwhite').attr('data-on','on');
            $('.hashtag').removeClass('textwhite');
            $('.hashtag').addClass('textblack');
        }
      });
      //색 변경
    $('body').on('click','.colorwhite',function(){
        $(this).addClass('hidden');
        $('.colorblack').removeClass('hidden');
        $('#text').removeClass('textblack');
        $('#text').addClass('textwhite');
        $(this).attr('data-on','');
        $('.colorblack').attr('data-on','on');
    });
    $('body').on('click','.colorblack',function(){
        $(this).addClass('hidden');
        $('.colorwhite').removeClass('hidden');
        $('#text').removeClass('textwhite');
        $('#text').addClass('textblack');
        $(this).attr('data-on','');
        $('.colorwhite').attr('data-on','on');
    });
    $('body').on('click','.boardlike',function(){
        var board_idx = $(this).attr('data-board');
        $.ajax({
            url:'/back/favorite',
            type:'post',
            data:{board_idx:board_idx}
        }).success(function(data){
            console.log(data);
            var result = JSON.parse(data).return;
            if(result == 'true'){
                console.log(array[4]);
                if(array[4] == 'list'){
                    reload(board_idx);
                }
                else if(array[4] == 'view'){
                    location.reload();
                }
            }
        });
    });

    $('body').on('change', '#replyimage', function(){
  	var image_path = $('#replyimage').val();
	//alert(image_path);
  	if(image_path)
    	{
  		$('#image-div').css('visibility', 'visible');
  		$('#image-div').css('display', 'inline');
  		$('#image-label').text($('#replyimage').val())
    	}
  	else
    	{
      		$('#image-div').css('visibility', 'hidden');
  		$('#image-div').css('display', 'none');
    	}
    });

    $('body').on('click','#replybutton',function(){
        var reply = $('#reply').val();
        if($('#reply').hasClass('update')){
            var reply_idx = $('#reply').attr('data-reply');
            if(reply){
                $.ajax({
                    url:'/back/update_reply',
                    type:'post',
                    data:{content:reply, reply_idx:reply_idx}
                }).success(function(data){
                    console.log(data);
                    var result = JSON.parse(data).result;
                    if(result == 'true'){
                        alert('수정되었습니다');
                        location.reload();
                    }
                });
            }else{
                alert('댓글을 입력해주세요');
            }
        }
        else{
            var board_idx = $(this).attr('data-idx');
            var parent_idx = $(this).attr('data-parent-idx');
            var fileSelector = $('#replyimage');
            var reply_image = new FormData();
	//console.log(parent_idx);
            if(reply){
		if(fileSelector[0].files.length > 0){
		    reply_image.append('replyImage', fileSelector[0].files[0]);
            	    
                    $.ajax({
                        url:'/upload/image',
                        type:'post',
                        contentType:false,
                        processData:false,
                        data:reply_image
                    }).success(function(data){
			//alert(data);
			var images = JSON.parse(data).url;
			$.ajax({
                            url:'/back/insert_reply',
                            type:'post',
                            data:{board_idx:board_idx,reply:reply,parent_idx:parent_idx,content_image:images[0]}
                        }).success(function(data){
                            var result = JSON.parse(data).return;
                            if(result == 'true'){
                                alert('등록되었습니다');
                                location.reload();
                            }
                        }).error(function(data){
				alert(data);
			});
                    });
                } else{
                $.ajax({
                    url:'/back/insert_reply',
                    type:'post',
                    data:{board_idx:board_idx,reply:reply,parent_idx:parent_idx}
                }).success(function(data){
                    console.log(data);
                    var result = JSON.parse(data).return;
                    if(result == 'true'){
                        alert('등록되었습니다');
                        location.reload();
                    }
                });
		}
            }else{
                alert('댓글을 입력해주세요');
            }
        }
    });
    $('#reply').focus(function() {
        $('.content .txt').addClass('txtform');
        $('#replybutton').addClass('on');
    });
    $('#reply').focusout(function() {
        $('.content .txt').removeClass('txtform');
        $('#replybutton').removeClass('on');
    });

    $('body').on('click','.reply_re',function(){
        var myboard = $(this).attr('data-my');
        if($(this).children().first().hasClass('select')){
            $(this).children().first().removeClass('select');
            $('#replybutton').attr('data-parent-idx','');
        }
        else{
            $('.name').removeClass('select');
            if(!$(this).hasClass('reply') && myboard == 1){
                var parent_idx = $(this).attr('data-idx');
                $('#replybutton').attr('data-parent-idx',parent_idx);
                $(this).children('.name').addClass('select');
            }else{
                $('#replybutton').attr('data-parent-idx','');
            }
        }
    });
    $('body').on('click','.singo',function(){
            var board_idx = $(this).attr('data-board');
            if($(this).hasClass('board')){
                var ifreply = 0;
            }
            else{
                var ifreply = 1;
            }
            $.ajax({
                url:'/back/singo_page',
                type:'post',
                data:{board_idx:board_idx,ifreply:ifreply}
            }).success(function(data){
                $('section').html(data);
                // location.href = '/back/singo_page'
                // console.log(data);
                // var result = JSON.parse(data).return;
                // if(result == 'true'){
                //     alert('신고되었습니다');
                //     location.reload();
                // }
                // else{
                //     alert('이미 신고하셨습니다');
                //     location.reload();
                // }
            });
    });
    $('body').on('click','#singo',function(){
        var board_idx = $('#board_idx').val();
        var ifreply = $('#ifreply').val();
        var text = $('input[name=singo1]:checked').next().text();
        $.ajax({
                url:'/back/singo',
                type:'post',
                data:{board_idx:board_idx,ifreply:ifreply,text:text}
            }).success(function(data){
                var result = JSON.parse(data).return;
                if(result == 'true'){
                    alert('신고되었습니다');
                    location.reload();
                }
                else{
                    alert('이미 신고하셨습니다');
                    location.reload();
                }
            });
    });

    $('body').on('click','.replylike',function(){
        var board_idx = $(this).attr('data-board');
        $.ajax({
            url:'/back/favorite',
            type:'post',
            data:{board_idx:board_idx,ifreply:1}
        }).success(function(data){
            console.log(data);
            var result = JSON.parse(data).return;
            if(result == 'true'){
                location.reload();
            }
        });
    });
    $('body').on('click','#ifshow',function(){
        if($(this).hasClass('on')){
            $(this).removeClass('on');
            $(this).attr('value',1);
            $(this).children().attr('src','/public/template/app/img/secret_off.png');
        }
        else{
            $(this).addClass('on');
            $(this).attr('value',0);
            $(this).children().attr('src','/public/template/app/img/secret_on.png');
        }
    });
    $('body').on('click','.newpage',function(){
        var url = $(this).attr('data-url');
        var category = $(this).attr('data-category');
        var text = '';
        var urlarray = url.split('/');
        if(category==1)text='내 등에 기대'; else text = '토니가 들어줄게';
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.newpage(url,text,urlarray[3]);
         }else{
             var array = [url,text,urlarray[3],$('#list').val()];
            window.webkit.messageHandlers.newpage.postMessage(array);
         }
     });
     $('body').on('click','.tony',function(){
        alert('토니만 댓글 입력 가능합니다');
        $(this).blur();
     });
     $('body').on('click','.my',function(){
         var idx = $(this).attr('data-board');
         console.log(idx);
         if( /Android/i.test(navigator.userAgent)) {
            window.lighthouse.updatee(idx);
          }else{
                window.webkit.messageHandlers.updatee.postMessage(idx);
          }
     });
      $('body').on('click','.myreply',function(){
          var idx = $(this).attr('data-board');
          console.log(idx);
          if( /Android/i.test(navigator.userAgent)) {
             window.lighthouse.updateee(idx);
           }else{
             window.webkit.messageHandlers.updateee.postMessage(idx);
           }
       });
     $('article').scroll(function(){
         if($(window).scrollTop()>$(document).height()-($(window).height()*2)){
             if(!stop){
                 stop=true;
                 scroll();
             }
         }
     })
});

var img1;

// 이미지 클릭시 원본 크기로 팝업 보기
function doImgPop(img){ 
 img1= new Image(); 
 img1.src=(img); 
 imgControll(img); 
} 
  
function imgControll(img){ 
	if((img1.width!=0)&&(img1.height!=0)){ 
    		viewImage(img); 
  	} 
  	else
	{ 
     		controller="imgControll('"+img+"')"; 
     		intervalID=setTimeout(controller,2000000000); 
  	} 
}
function viewImage(img){ 
 W=$(document).outerWidth(); 
 H=$(document).outerHeight(); 
 O="width="+W+",height="+H+",scrollbars=no,fullscreen=yes"; 
 imgWin=window.open("","",O); 
 imgWin.document.write("<html><head><title>:*:*:*: 이미지상세보기 :*:*:*:*:*:*:</title></head>");
 imgWin.document.write("<body topmargin=0 leftmargin=0>");
 imgWin.document.write("<img src="+img+" width=100% height='auto' onclick='self.close()' style='cursor:pointer;' title ='클릭하시면 창이 닫힙니다.'>");
 //imgWin.document.close();
}

function scroll(){
    $.ajax({
        url:'/back/list2/'+array[5]+'/'+array[6]+'/'+count,
          type:'GET'
    }).success(function(data){
        $('#listup').append(data);
        count++;
        stop=false;
    });

}


function select_hashtag(category){
    $.ajax({
        url:'/back/select_hashtag',
        type:'post',
        data:{category:category},
        async : false
    }).success(function(data){
        var result = JSON.parse(data).result;
        if(result == 'true'){
            var idx = JSON.parse(data).idx;
            var hashtag = JSON.parse(data).hashtag;
            var i = 0;
            var str = '';
            while(idx[i]){
                str += '<a class = "tag" data-idx = "'+idx[i]+'">&#35;'+hashtag[i]+'</a>';
                i++;
            }
            $('.hashtag').html(str);
        }
    });
}

function insert_board(category){
//    var backimg = $('#backimg').attr('data-idx');
    var content = $('#text').val();
    var ifshow = $('#ifshow').attr('value');
    var hashtagarray = new Array();
    $('.tag').each(function(index) {
        if($(this).hasClass('on')){
            hashtagarray.push($(this).text());
        }
    });
    var hashtag = hashtagarray.join();
    var color;
    ($('#text').hasClass('textblack'))?color=1:color=0;
    var link = document.location.href;
    var urlarray = link.split('/');
    if(urlarray[4] == 'write')
    {
        ifshow = 1; var tony = 0;
    }
    else
    {
        var tony = 1;
    }
    $.ajax({
        url:'/back/insert_board',
        type:'post',
        data:{
//            backimg:backimg,
            category:category,
            hashtag:hashtag,
            content:content,
//            color:color,
//            ifshow:ifshow,
            tony:tony
        },
        async : false
    }).success(function(data){
        var result = JSON.parse(data).result;
        if(result == 'true'){
            alert('등록 되었습니다');
            if(tony == 0){
                location.href = '/back/list/1/1';
            }
            else{
                location.href = '/back/list/2/1';
            }
        }
    });
}
function prev(){
    console.log(array[6]);
    if(array[6] == 3){
        location.href = '/back/list/'+array[5]+'/2';
    }
    else if(array[6] == 2){
        location.href = '/back/list/'+array[5]+'/1';
    }
}
function next(){
    console.log(array[6]);
    if(array[6] == 1){
        location.href = '/back/list/'+array[5]+'/2';
    }
    else if(array[6] == 2){
        location.href = '/back/list/'+array[5]+'/3';
    }
}
function viewnext(type){
    var idx = array[5];
    $.ajax({
        url:'/back/select_idx/'+type,
        type:'post',
        data:{idx:idx},
        async : false
    }).success(function(data){
        var board_idx = JSON.parse(data).board_idx;
        // alert(board_idx);
        var idx = JSON.parse(data).idx;
        if(board_idx && board_idx != 0){
            location.href = '/back/view/'+board_idx;
        }
    });

}

function reload(idx){
    $.ajax({
        url:'/back/reload/'+idx
    }).success(function(data){
        var con = JSON.parse(data).con;
        console.log(con);
        var allcount = JSON.parse(data).allcount;
        var replycon = JSON.parse(data).replycon;
        var img = '';
        (con == 1)?img = '/public/template/app/img/like_on.png':img = '/public/template/app/img/like_off.png';
        console.log(img);
        $('#list'+idx).children().children().first().attr('src',img);
        $('#list'+idx).children().children().next().text(allcount);
        $('#list'+idx).children().next().children().next().text(replycon);
    });
}

function select_hashtag_ck(category, board_idx){
    $.ajax({
        url:'/back/select_hashtag',
        type:'post',
        data:{category:category},
        async : false
    }).success(function(data){
        var result = JSON.parse(data).result;
        if(result == 'true'){
            var idx = JSON.parse(data).idx;
            var hashtag = JSON.parse(data).hashtag;
            $.ajax({
                url:'/back/selected_hashtag',
                type:'post',
                data:{board_idx:board_idx},
                async : false
            }).success(function(data){
                var hashtext = JSON.parse(data).hashtag;
                var selected = hashtext.split(',');
                console.log(selected);
                var i = 0;
                var str = '';
                while(idx[i]){
                    var same = '';
                    for(var j = 0; j < selected.length; j++){
                        if('#'+hashtag[i] == selected[j]){
                            same = 'on';
                        }
                    }
                    str += '<a class = "tag '+same+'" data-idx = "'+idx[i]+'">&#35;'+hashtag[i]+'</a>';
                    i++;
                }
                $('.hashtag').html(str);
                // alert(str);
                // document.write('a')
            });
        }
    });
}

function update_board(category){
    $('.content .txt').removeClass('txtform');
    var backimg = $('#backimg').attr('data-idx');
    var content = $('#text').val();
    var ifshow = $('#ifshow').attr('value');
    var board_idx = $('#board_idx').val();
    var hashtagarray = new Array();
    $('.tag').each(function(index) {
        if($(this).hasClass('on')){
            hashtagarray.push($(this).text());
        }
    });
    var hashtag = hashtagarray.join();
    var color;
    ($('#text').hasClass('textblack'))?color=1:color=0;
    var link = document.location.href;
    var urlarray = link.split('/');
    if(urlarray[4] == 'write'){
        ifshow = 1; var tony = 0;
    }
    else{
        var tony = 1;
    }
    $.ajax({
        url:'/back/update_board',
        type:'post',
        data:{
            backimg:backimg,
            category:category,
            hashtag:hashtag,
            content:content,
            color:color,
            ifshow:ifshow,
            tony:tony,
            board_idx : board_idx
        },
        async : false
    }).success(function(data){
        var result = JSON.parse(data).result;
        if(result == 'true'){
            alert('변경 되었습니다');
            location.href = '/back/view/'+board_idx;
        }
    });
}

function del_board(idx){
    var ck = confirm('삭제하시겠습니까?');
    if(ck){
        $.ajax({
            url:'/back/del_board/',
            type:'POST',
            data:{board_idx:idx}
        }).success(function(data){
            var result = JSON.parse(data).result;
            if(result == "true"){
                alert('삭제되었습니다');
                // location.href = '/back/list/1/1';
            }
        });
    }
}

function reload_update(idx){
    $.ajax({
        url:'/back/update_reload',
        type:'post',
        data:{board_idx:idx},
        async : false
    }).success(function(data){
        var img = JSON.parse(data).img;
        var content = JSON.parse(data).content;
        var category = JSON.parse(data).category;
        var hashtag = JSON.parse(data).hashtag;
        var color = JSON.parse(data).color;
        var colorclass = '';
        (color == 1)?colorclass = 'textblack':colorclass = 'textwhite';
        $('#content'+idx).children().first().attr('background-image','url('+img+')');
        $('#content'+idx).children().first().next().removeClass('textwhite');
        $('#content'+idx).children().first().next().removeClass('textblack');
        $('#content'+idx).children().first().next().addClass(colorclass);
        $('#content'+idx).children().first().next().children().text(category);

        $('#content'+idx).children().first().next().next().removeClass('textwhite');
        $('#content'+idx).children().first().next().next().removeClass('textblack');
        $('#content'+idx).children().first().next().next().addClass(colorclass);
        $('#content'+idx).children().first().next().next().text(content);

        $('#content'+idx).children().first().next().next().next().removeClass('textwhite');
        $('#content'+idx).children().first().next().next().next().removeClass('textblack');
        $('#content'+idx).children().first().next().next().next().addClass(colorclass);
        var text = '';
        var hashtagarray = hashtag.split(',');
        var i = 0;
        while(hashtagarray[i]){
            text += '<span>'+hashtagarray[i]+'</span>';
            i++;
        }
        $('#content'+idx).children().first().next().next().next().html(text);
    });
}

function update_reply(idx){
    $.ajax({
        url:'/back/select_reply',
        type:'post',
        data:{reply_idx:idx},
        async : false
    }).success(function(data){
        var content = JSON.parse(data).content;
        $('#reply').text(content);
        $('#reply').addClass('update');
        $('#reply').attr('data-reply',idx);
        $('#replybutton').text('수정');
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.keyboardup();
         }else{
             try {
                 window.webkit.messageHandlers.keyboardup.postMessage('');
             } catch (e) {

             }
         }
    });
}

//수정해야함
// function update_replyy(idx){
//     $.ajax({
//         url:'/back/select_reply',
//         type:'post',
//         data:{reply_idx:idx},
//         async : false
//     }).success(function(data){
//         var content = JSON.parse(data).content;
//         $('#reply').text(content);
//         $('#reply').addClass('update');
//         $('#reply').attr('data-reply',idx);
//         $('#replybutton').text('수정');
//         if( /Android/i.test(navigator.userAgent)) {
//            window.lighthouse.keyboardup();
//          }else{
//              try {
//                  window.webkit.messageHandlers.keyboardup.postMessage('');
//              } catch (e) {
//
//              }
//          }
//     });
// }

function update_ios_reply(reply_idx, content){
    console.log(reply_idx);
    console.log(content);
    $.ajax({
        url:'/back/update_reply',
        type:'post',
        data:{content:content, reply_idx:reply_idx}
    }).success(function(data){
        console.log(data);
        var result = JSON.parse(data).result;
        if(result == 'true'){
            alert('수정되었습니다');
            location.reload();
        }
    });
}

function del_reply(idx){
    var ck = confirm('삭제하시겠습니까?');
    if(ck){
        $.ajax({
            url:'/back/del_reply',
            type:'POST',
            data:{reply_idx:idx}
        }).success(function(data){
            var result = JSON.parse(data).result;
            if(result == "true"){
                alert('삭제되었습니다');
                location.reload();
            }
        });
    }
}

function del_rereply(idx){
    var ck = confirm('삭제하시겠습니까?');
    if(ck){
        $.ajax({
            url:'/back/del_rereply/',
            type:'POST',
            data:{reply_idx:idx}
        }).success(function(data){
            var result = JSON.parse(data).result;
            if(result == "true"){
                alert('삭제되었습니다');
                location.reload();
            }
        });
    }
}

function select_rereply(idx){
    $('.lireply'+idx).children().first().next().children().first().children().first().addClass('select');
}

function show_update(idx){
    var text = $('.lireply'+idx).children().next().children().first().text();
    console.log(text);
    $('#reply').val(text);
}

function show_update_(idx){
    var text = $('.lireply'+idx).children().first().next().children().first().next().text();
    console.log(text.trim());
    $('#reply').val(text.trim());
}
function ioskeyboard(){
    $('#reply').focus();
}
function ioskeyboardhidden(){
    $('.reply-write').addClass('hidden');
}
