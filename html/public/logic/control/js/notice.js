
function notice(){
    $('body').on('click','#write_notice',function(){
      var title = $('#title').val();
      var content = $('#content').val();
      if(title && content){
          $.ajax({
              url:'/admin/notice/insert_notice',
              type:'post',
              data:{title:title,content:content}
          }).success(function(data){
              var result = JSON.parse(data).return;
            //   if(result == 'success'){
                  alert('입력되었습니다');
                  location.reload();
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
    $('body').on('click','#update_notice',function(){
      var title = $('#title').val();
      var content = $('#content').val();
      var notice_idx = $('#notice_idx').val();
      if(title && content){
          $.ajax({
              url:'/admin/notice/update_notice',
              type:'post',
              data:{title:title,content:content,notice_idx:notice_idx}
          }).success(function(data){
              var result = JSON.parse(data).return;
              if(result == 'success'){
                  alert('수정되었습니다');
                  location.href = '/admin/notice/list';
              }
              else{
                  alert('다시 시도해주세요');
              }
          });
      }
      else{
          alert('입력해주세요');
      }
    });
}
