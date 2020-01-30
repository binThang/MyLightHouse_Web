var count=2,stop=false;
var link = document.location.href;
var array = link.split('/');
$(function(){
    $('body').on('click','.newpage',function(){
        var url = $(this).attr('data-url');
        var category = $(this).attr('data-category');
        var text = '';
        var urlarray = url.split('/');
        if(category == 1){
            text = '나도 그래';
        }
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.newpage(url,text,urlarray[3]);
         }else{
             var array = [url,text,urlarray[3],$('#list').val()];
           window.webkit.messageHandlers.newpage.postMessage(array);
         }
     });
     $('body').on('click','#share',function(){
         var url = document.location.href;
         var array = url.split('/');
         if( /Android/i.test(navigator.userAgent)) {
            window.lighthouse.share(array[5]);
          }else{
            window.webkit.messageHandlers.share.postMessage(array[5]);
          }
      });
    $('body').on('click','#like',function(){
        var board_idx = $(this).attr('data-board');
        $.ajax({
            url:'/metoo/favorite',
            type:'post',
            data:{board_idx:board_idx}
        }).success(function(data){
            console.log(data);
            var result = JSON.parse(data).return;
            if(result == 'true'){
                reload(board_idx);
                // location.reload();
            }
        });
    });

    function reload(idx){
        $.ajax({
            url:'/metoo/reload/'+idx
        }).success(function(data){
            console.log(data);
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
            console.log(parent_idx);
            if(reply){
                $.ajax({
                    url:'/metoo/insert_reply',
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
            }else{
                alert('댓글을 입력해주세요');
            }
        }
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
    $('body').on('click','.reply_re',function(){
        if($(this).children().first().hasClass('select')){
            $(this).children().first().removeClass('select');
            $('#replybutton').attr('data-parent-idx','');
        }
        else{
            $('.name').removeClass('select');
            if(!$(this).hasClass('reply')){
                var parent_idx = $(this).attr('data-idx');
                $('#replybutton').attr('data-parent-idx',parent_idx);
                $(this).children('.name').addClass('select');
            }else{
                $('#replybutton').attr('data-parent-idx','');
            }
        }

    });

    $('body').on('click','.replylike',function(){
        var board_idx = $(this).attr('data-board');
        $.ajax({
            url:'/metoo/reply_favorite',
            type:'post',
            data:{board_idx:board_idx}
        }).success(function(data){
            console.log(data);
            var result = JSON.parse(data).return;
            if(result == 'true'){
                location.reload();
            }
        });
    });
    // $('body').on('click','.replysingo',function(){
    //     var board_idx = $(this).attr('data-board');
    //     $.ajax({
    //         url:'/back/singo_page',
    //         type:'post',
    //         data:{board_idx:board_idx}
    //     }).success(function(data){
    //         $('section').html(data);
    //     });
    // });
    // $('body').on('click','#singo',function(){
    //     var board_idx = $('#board_idx').val();
    //     var text = $('input[name=singo1]:checked').next().text();
    //     $.ajax({
    //         url:'/fun/reply_singo',
    //             type:'post',
    //             data:{board_idx:board_idx,text:text}
    //         }).success(function(data){
    //             var result = JSON.parse(data).return;
    //             if(result == 'true'){
    //                 alert('신고되었습니다');
    //                 location.reload();
    //             }
    //             else{
    //                 alert('이미 신고하셨습니다');
    //                 location.reload();
    //             }
    //         });
    // });
    $('body').on('click','.singo',function(){
            var board_idx = $(this).attr('data-board');
            $.ajax({
                url:'/back/singo_page',
                type:'post',
                data:{board_idx:board_idx,ifreply:1}
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

    if(array[5] != 3){
        $('article').scroll(function(){
    		if($(window).scrollTop()>$(document).height()-($(window).height()*1.5)){
    			if(!stop){
    				stop=true;
    				scroll1();
    			}
    		}
    	})
    }
    else{
        $('article').scroll(function(){
    		if($(window).scrollTop()>$(document).height()-($(window).height()*1.5)){
    			if(!stop){
    				stop=true;
    				scroll2();
    			}
    		}
    	})
    }

});
function scroll1(){
    $.ajax({
        url:'/metoo/list2/'+array[5]+'/'+array[6]+'/'+count,
          type:'GET'
    }).success(function(data){
        $('#listup').append(data);
        count++;
        stop=false;
    });

}
function scroll2(){
    $.ajax({
        url:'/metoo/list2/1/'+count,
          type:'GET'
    }).success(function(data){
        console.log(data);
        $('#listupv').append(data);
        count++;
        stop=false;
    });

}
function prev(){
    console.log(array[5]);
    if(array[5] == 3){
        location.href = '/metoo/list/2';
    }
    else if(array[5] == 2){
        location.href = '/metoo/list/1';
    }
}
function next(){
    console.log(array[5]);
    if(array[5] == 1){
        location.href = '/metoo/list/2';
    }
    else if(array[5] == 2){
        location.href = '/metoo/list/3';
    }
}
function viewnext(type){
    var idx = array[5];
    $.ajax({
        url:'/metoo/select_idx/'+type,
        type:'post',
        data:{idx:idx},
        async : false
    }).success(function(data){
        var board_idx = JSON.parse(data).board_idx;
        var idx = JSON.parse(data).idx;
        console.log(idx);
        if(board_idx != 0 && board_idx != null){
            location.href = '/metoo/view/'+board_idx;
        }
    });

}

function reload(idx){
    $.ajax({
        url:'/metoo/reload/'+idx
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



function update_reply(idx){
    $.ajax({
        url:'/metoo/select_reply',
        type:'post',
        data:{reply_idx:idx},
        async : false
    }).success(function(data){
        var content = JSON.parse(data).content;
        $('#reply').val(content);
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

function update_ios_reply(reply_idx, content){
    console.log(reply_idx);
    console.log(content);
    $.ajax({
        url:'/metoo/update_reply',
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
            url:'/metoo/del_reply',
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
            url:'/metoo/del_rereply/',
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
