function getInternetExplorerVersion() {
	 var rv = -1; // Return value assumes failure.
	 if (navigator.appName == 'Microsoft Internet Explorer') {
		  var ua = navigator.userAgent;
		  var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
		  if (re.exec(ua) != null)
			  rv = parseFloat(RegExp.$1);
		 }
	 return rv;
}
function iecheck(){
    var version = getInternetExplorerVersion();
    if (version > 5 && version < 10) {
        if (confirm('이 페이지는 Internet Explorer 11 이상부터 지원합니다. \n 크롬 설치 페이지로 이동합니다.')) {
            location.href = 'https://www.google.co.kr/chrome/browser/desktop/index.html';
        }
    }
}
function drawHTML(data, state) {
	if(data.substring(0,1)!='<'){
		if(JSON.parse(data).return){
			admin=link.split('/')[1];
			console.log(admin);
			if(admin=='admin'){
				location.href="/"+admin;
			}else{
				location.href="/login";
			}
		}
	}
	if (state) history.pushState(data, '', link);
	$('section').before(data).remove();
	menuAction(link);
	$('body').scrollTop(0);
	loadaction();
	$('footer > .loading-frame').addClass('hidden');
}

function ajaxmove(first){
	$('footer > .loading-frame').removeClass('hidden');
	if (typeof (history.pushState) != "undefined") { //브라우저가 지원하는 경우
		if(!first){
			$.ajax({
				url:link,
				type:'post',
				data:{
					type:'ajax'
				}
			}).success(drawHTML);
		}else{
			data=$('section').html();
			history.pushState(data, '', link);
			$('footer > .loading-frame').addClass('hidden');
		}
		return false;
	}
	else {
		location.href = url;
	}
}
function modal(){
	$('footer > .loading-frame').removeClass('hidden');
	if (typeof (history.pushState) != "undefined") { //브라우저가 지원하는 경우
		$.ajax({
			url:link,
			type:'post',
			data:{
				type:'ajax'
			}
		}).success(function(data){
			$('header').after($(data)[1]);
			$('section').append($(data)[3]);
			$('footer > .loading-frame').addClass('hidden');
			setTimeout(function(){$('.modal').removeClass('active');},50);
		});
		return false;
	}
	else {
		location.href = url;
	}
}
function agent(){
	if( /Android/i.test(navigator.userAgent)) {
		ag='and';
	}else if( /(iphone|ipad)/i.test(navigator.userAgent)) {
		ag='ios';
	}else{
		ag='pc';
	}
	return ag;
}
function init(){
	iecheck();
	ajaxmove('first');
	loadaction();
	$(window).bind("popstate", function(event) {
		 var data = event.originalEvent.state;
		 if (data) drawHTML(data, false);
		 loadaction();
	});
	$(window).resize(function(){
		resizeAction();
	});
	$(window).scroll(function(){
		scrollAction();
	});
	$('body').on('click','a:not(.ajax)',function(){
		if(!$(this).hasClass('href')){
			$(this).attr('target','_blank');
		}
	});
	$('body').on('click','a.ajax,button.ajax',function(){
		if($(this).hasClass('modal')){
			if(!$('article.modal').length){
				link=$(this).attr('href');
				if($('.btn-tab').hasClass('btn_on')){
					$('.btn-tab').trigger('click');
					setTimeout(function(){
						moveAction();
						modal();
					},500);
				}else{
					moveAction();
					modal();
				}
			}
		}else if(!$(this).hasClass('no')){
			moveAction();
			link=$(this).attr('href');
			ajaxmove();
			if($('.btn-tab').hasClass('btn_on')){
				$('.btn-tab').trigger('click');
			};
		}
		return false;
	});
	$('body').on('click','#modal_btn',function(){
		$('.modal:not(button)').addClass('active');
		setTimeout(function(){
			$('.modal.active').remove();
		},500);
	});
}
