function membertony(){
    $('body').on('click','.tonya',function(){
        var idx = $(this).attr('data-idx');
          $.ajax({
              url:'/admin/member/update_tony',
              type:'post',
              data:{idx:idx}
          }).success(function(data){
              var result = JSON.parse(data).return;
              if(result == 'success'){
                  alert('수정되었습니다');
                  location.reload();
              }
              else{
                  alert('다시 시도해주세요');
              }
          });
    });

    $('body').on('click','.member_dela',function(){
        var idx = $(this).attr('data-idx');
        var text = prompt('신고 사유를 입력해주세요','');
        if(text){
            $.ajax({
                url:'/admin/member/insert_text',
                type:'post',
                data:{idx:idx,text:text}
            }).success(function(data){
                var result = JSON.parse(data).return;
                if(result == 'success'){
                    alert('수정되었습니다');
                    location.reload();
                }
                else{
                    alert('다시 시도해주세요');
                }
            });
        }

    });
    $('body').on('click','#search_btna',function(){
        // var type = $('input[name=list_type]:checked').val();
        var name = $('#name').val();
        var kind = $(this).attr('data-kind');
        console.log(kind);
        if(kind == 'list'){
            url = '/admin/member/list';
        }
        else{
            url = '/admin/member/list_tony';
        }
            console.log(url);
        $.ajax({
            url:url,
            type:'post',
            data:{name:name,kind:kind}
        }).success(function(data){
            location.reload();
        });
    });
    $('body').on('click','#listset',function(){
        var kind = $(this).attr('data-kind');
        console.log(kind);
        if(kind == 'list'){
            url = '/admin/member/list';
        }
        else{
            url = '/admin/member/list_tony';
        }

        $.ajax({
            url:url,
            type:'post',
            data:{set:'set'}
        }).success(function(data){
            location.reload();
        });
    });

}
