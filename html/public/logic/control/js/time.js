var time=false;
function timer(){
    if($('.time-group .time').length){
        setTime();
        time=true;
        mainTimer=setInterval(function(){setTime()},1000);
    }else if(time){
        clearInterval(mainTimer);
        time=false;
    }
}
function setTime(){
    var date=new Date();
    hour=(date.getHours()<10)?'0':'';
    hour+=date.getHours();
    min=(date.getMinutes()<10)?'0':'';
    min+=date.getMinutes();
    sec=(date.getSeconds()<10)?'0':'';
    sec+=date.getSeconds();
    $('.time-group .time').html(hour+':'+min+':'+sec);
}
