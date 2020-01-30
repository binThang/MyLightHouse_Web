
function qna(){
    $('body').on('click','#write_qna',function(){
      var email = $('.email').text();
      var content = $('#content').val();
      var qna_idx = $('#qna_idx').val();
      if(content){
          $.ajax({
              url:'/admin/qna/reply_qna',
              type:'post',
              data:{email:email,content:content,qna_idx:qna_idx}
          }).success(function(data){
              var result = JSON.parse(data).result;
              console.log(result);
              if(result == 'true'){
                  alert('입력되었습니다');
                  location.reload();
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
