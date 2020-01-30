var link=null,times=0,first=true,password=null,passchk=false;
var inc_array=Array('time', 'fun', 'board', 'notice','member','qna','img','pusha','membertony');
$(function(){
	include();
	init();
	// fun();
	// board();
	// notice();
	// member();
	// qna();
	// img();
	// push();
	$('aside .gnb button').first().addClass('on');
	$('aside .gnb ul').first().addClass('on').siblings('ul').slideUp();
	// $(window).bind("popstate", function(event) {
	// 	 var data = event.originalEvent.state;
	// 	 if (data) drawHTML(data, false);
	// 	 loadAction();
	// });
	// $('body').on('click','a:not(.ajax)',function(){
	// 	if(!$(this).hasClass('href')){
	// 		$(this).attr('target','_blank');
	// 	}
	// });
	// $('body').on('click','a.ajax, button.ajax',function(){
	// 	link=$(this).attr('href');
	// 	ajaxmove();
	// 	return false;
	// });
	$('body').on('click','#paging button:not(.no)',function(){
		link=$(this).parents('#paging').attr('href')+$(this).attr('data-value');
		ajaxmove();
	});

	$(window).resize(function(){
		$('article.list').css('min-width',$('article.list table').css('min-width'));
	});
	$('body').on('click','.menu-bar', function(){
		$('body').addClass('show-menu');
	});
	$('body').on('click','.btn-close', function(){
		$('body').removeClass('show-menu');
	});
	$('body').on('click','.gnb>button',function(){
		$(this).addClass('on').siblings('button').removeClass('on');
		$(this).next().addClass('on').slideDown().siblings('ul').removeClass('on').slideUp();
	});
	$('body').on('click','.btn-etc button',function(){
		link=$(this).attr('href');
		if($(this).hasClass('edit')||$(this).hasClass('view')){
			ajaxmove();
		}else if($(this).hasClass('delete')){
			if(confirm('삭제합니까?')){
				$.ajax({
					url:link,
				}).success(function(data){
					var returnUrl=link.split('/');
					returnUrl.pop();
					link=returnUrl.join('/').replace('delete','list');
					if(JSON.parse(data).return=='success'){
						ajaxmove();
					}
				});
			}
		}
		return false;
	});
	$('body').on('change','#banner + input',function(){
		var image = new FormData();
		for(var i=0;i<$(this)[0].files.length;i++){
			image.append('images[]',$(this)[0].files[i]);
		}
        $.ajax({
            url:'/upload/image',
            type:'post',
            contentType:false,
            processData:false,
            data:image
        }).success(function(data){
            if(JSON.parse(data).return="success"){
				list=new Array();
                images=JSON.parse(data).url;
                for(var i=0;i<images.length;i++){
                    $('#banner_list').append('<img src="/public/uploads/index/image/'+images[i]+'">');
                }
				$('#banner_list').find('img').each(function(){
					list.push($(this).attr('src'));
				});
				$('#banner_list').children().first().val(list);
            }
        });
	});
	$('body').on('click','#banner_list > img',function(){
		if(confirm('이 이미지를 제거합니까?')){
			$(this).remove();
			list=new Array();
			$('#banner_list').find('img').each(function(){
				list.push($(this).attr('src'));
			});
			$('#banner_list').children().first().val(list);
		}
	});
	$('body').on('change','#popup + input',function(){
		var image = new FormData();
		for(var i=0;i<$(this)[0].files.length;i++){
			image.append('images[]',$(this)[0].files[i]);
		}
        $.ajax({
            url:'/upload/image',
            type:'post',
            contentType:false,
            processData:false,
            data:image
        }).success(function(data){
            if(JSON.parse(data).return="success"){
				list=new Array();
                images=JSON.parse(data).url;
                for(var i=0;i<images.length;i++){
                    $('#popup_list').append('<img src="/public/uploads/index/image/'+images[i]+'"><input type="text" class="popupalt" placeholder="팝업설명" value="">');
                }
				$('#popup_list').find('img').each(function(){
					list.push($(this).attr('src'));
				});
				$('#popup_list').children().first().val(list);
            }
        });
	});
	$('body').on('click','#popup_list > img',function(){
		if(confirm('이 이미지를 제거합니까?')){
			$(this).next().remove();
			$(this).remove();
			list=new Array();
			$('#popup_list').find('img').each(function(){
				list.push($(this).attr('src'));
			});
			$('#popup_list').children().first().val(list);
		}
	});
	$('body').on('click','#pass_btn',function(){
		btn=$(this);
		form=$(this).parents('form');
		var step=true;
		form.find('.req').each(function(){
			if($(this).val().length<8){
				btn.next().trigger('click');
				step=false;
				return false;
			}
		});
		if(step){
			if(!passchk){
				alert('변경할 비밀번호를 다시 확인해 주세요.');
				step=false;
			}
		}
		if(step){
			fd=new FormData(form[0]);
			$.ajax({
				url:form.attr('action'),
				type:'post',
				contentType:false,
				processData:false,
				data:fd
			}).success(function(data){
				alert(JSON.parse(data).text);
				if(JSON.parse(data).return=='success'){
					location.href='/admin';
				}
			});
		}
	});
	$('body').on('keyup','#password',function(){
		if($(this).val().length>7){
			$(this).parent().next().children('.checko').removeClass('hidden').siblings().addClass('hidden');
			password=$(this).val();
		}else if($(this).val().length>0){
			$(this).parent().next().children('.checkx').removeClass('hidden').siblings().addClass('hidden');
		}else{
			$(this).parent().next().children().addClass('hidden');
		}
	});
	$('body').on('keyup','#password_verify',function(){
		if($(this).val().length>0){
			if($(this).val()==password){
				$(this).parent().next().children('.checko').removeClass('hidden').siblings().addClass('hidden');
				passchk=true;
			}else{
				$(this).parent().next().children('.checkx').removeClass('hidden').siblings().addClass('hidden');
				passchk=false;
			}
		}else{
			$(this).parent().next().children().addClass('hidden');
			passchk=false;
		}
	});
	$('body').on('keydown','input',function(e){
		if(e.keyCode=='13'){
			return false;
		}
	});
	$('body').on('click','#write_form_btn',function(){
		link=$(this).attr('data-link');
		ajaxmove();
	});
	$('body').on('click','#write_btn',function(){
		form=$(this).parents('form');
		if(!beforeWrite()){
			$(this).next().trigger('click');
		}else{
			data=new FormData(form[0]);
			$.ajax({
				url:form.attr('action'),
				type:'post',
				contentType:false,
				processData:false,
				data:data
			}).success(function(data){
				alert(JSON.parse(data).text);
				if(JSON.parse(data).return=='success'){
					href=JSON.parse(data).href;
					link=form.attr('data-success');
					if(href){
						link+='/'+href;
					}
					ajaxmove();
				}
			});
		}
	});
	$('body').on('click','.search #search_btn',function(){
		form=$(this).parents('form');
		fd=new FormData(form[0]);
		$.ajax({
		    url:form.attr('action'),
		    type:'POST',
		    contentType:false,
		    processData:false,
		    data:fd
		}).success(function(){
			link=form.attr('data-list');
			ajaxmove();
		});
	});
	$('body').on('change','#form_type',function(){
		boardType($(this));
	});
});
