var count=2,stop=false;
var link = document.location.href;
var array = link.split('/');
$(function(){
    $('body').on('click','.newpage',function(){
        var url = $(this).attr('data-url');
        var category = $(this).attr('data-category');
        var text = '';
        console.log(array[3]);
        var urlarray = url.split('/');
        if(category==0)text='내 등에 기대'; else if(category==1) text = '토니가 들어줄게';else text = '뻔해도 좋은';
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.newpage(url,text,urlarray[3]);
         }else{
             var arraya = [url,text,urlarray[3],$('#list').val()];
           window.webkit.messageHandlers.newpage.postMessage(arraya);
         }
     });
     $('body').on('click','.alert',function(){
        var board_idx = $(this).attr('data-idx');
        $.ajax({
            url:'/diary/read',
            type:'post',
            data:{board_idx:board_idx},
            async : false
        }).success(function(data){
        });
      });

      if(array[5] ==1 || array[5] == 2){
          $('article').scroll(function(){
              if($(window).scrollTop()>$(document).height()-($(window).height()*2)){
                  if(!stop){
                      stop=true;
                      scroll1();
                  }
              }
          })
      }
      else{
          $('article').scroll(function(){
              if($(window).scrollTop()>$(document).height()-($(window).height()*2)){
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
        url:'/diary/list2/'+array[5]+'/'+count,
          type:'GET'
    }).success(function(data){
        $('#listup').append(data);
        count++;
        stop=false;
    });

}


function scroll2(){
    $.ajax({
        url:'/diary/list2/3/'+count,
        type:'GET'
    }).success(function(data){
        console.log(data);
        $('#listup').append(data);
        count++;
        stop=false;
    });

}
function prev(){
    console.log(array[5]);
    if(array[5] == 3){
        location.href = '/diary/list/2';
    }
    else if(array[5] == 2){
        location.href = '/diary/list/1';
    }
}
function next(){
    console.log(array[5]);
    if(array[5] == 1){
        location.href = '/diary/list/2';
    }
    else if(array[5] == 2){
        location.href = '/diary/list/3';
    }
}
function viewprev(){
    console.log(array[5]);
    if(array[5] == 3){
        location.href = '/diary/list/2';
    }
    else if(array[5] == 2){
        location.href = '/diary/list/1';
    }
}
function viewnext(type){
    console.log(type);
    var idx = array[3];
    $.ajax({
        url:'/back/select_idx/'+type,
        type:'post',
        data:{idx:idx},
        async : false
    }).success(function(data){
        var board_idx = JSON.parse(data).board_idx;

    });

}

function reload(idx){
        $('#list'+idx).addClass('read');
}

function reload_move(idx){
    $('#list'+idx).remove();
}

function reload_list(){
    location.href = '/diary/list/1';
}
