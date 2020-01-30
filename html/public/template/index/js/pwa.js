var token=null;
// Initialize Firebase
var config = {
	messagingSenderId: "메시지 아이디"
};
$(function(){
    firebase.initializeApp(config);
    const messaging = firebase.messaging();
    if(agent()!='ios'){
        push();
    }
});
function push(){
	// Retrieve Firebase Messaging object.
	messaging = firebase.messaging();
	// Get Instance ID token. Initially this makes a network call, once retrieved
	// subsequent calls to getToken will return from cache.
	messaging.requestPermission()
	.then(function() {
		$('#alarm').children().first().removeClass('hidden').next().addClass('hidden');
	  	console.log('Notification permission granted.');
		messaging.getToken()
	  	.then(function(firstToken){
	    	console.log('Token maked.');
			token=firstToken;
			tokentoServer(token,true);
			console.log(firstToken);
	  	}).catch(function(err) {
			$('#alarm').children().last().removeClass('hidden').prev().addClass('hidden');
	    	console.log('Unable to make token ', err);
	    	// showToken('Unable to retrieve refreshed token ', err);
	  	});
	  	// TODO(developer): Retrieve an Instance ID token for use with FCM.
	  	// ...
	}).catch(function(err) {
	  	console.log('Unable to get permission to notify.', err);
	});
	messaging.getToken()
	.then(function(currentToken) {
	  	if (currentToken) {
	    	token=currentToken;
			tokentoServer(token,true);
		    // $.ajax({
		    //     url:'/token.php',
		    //     type:'post',
		    //     data:{
		    //         token:currentToken
		    //     }
		    // }).success(function(data){
			//
		    // });
		    // sendTokenToServer(currentToken);
		    // updateUIForPushEnabled(currentToken);
	  	} else {
		    // Show permission request.
		    console.log('No Instance ID token available. Request permission to generate one.');
		    // Show permission UI.
		    // updateUIForPushPermissionRequired();
		    // setTokenSentToServer(false);
	  	}
	}).catch(function(err) {
	  	console.log('An error occurred while retrieving token. ', err);
		//   showToken('Error retrieving Instance ID token. ', err);
		//   setTokenSentToServer(false);
	});
	// Callback fired if Instance ID token is updated.
	messaging.onTokenRefresh(function() {
	  	messaging.getToken()
	  	.then(function(refreshedToken) {
			tokentoServer(token,true);
	    	console.log('Token refreshed.');
	    	// Indicate that the new Instance ID token has not yet been sent to the
	    	// app server.
	    	// setTokenSentToServer(false);
	    	// Send Instance ID token to app server.
	    	// sendTokenToServer(refreshedToken);
	    	// ...
	  	}).catch(function(err) {
	    	console.log('Unable to retrieve refreshed token ', err);
	    	// showToken('Unable to retrieve refreshed token ', err);
	  	});
	});
	messaging.onMessage(function(payload) {
	  	console.log("Message received. ", payload);
	  	alert(payload);
	  	// ...
	});
}
function tokentoServer(token,bool){

}
