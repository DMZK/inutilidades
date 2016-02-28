<?php if(isset($_GET['g_inutil_login'])): ?>
<DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aguarde...</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="116454895004-e255eu26vcosjdfk5vqm8a6vtbcgr56p.apps.googleusercontent.com">
</head>
<?php if(isset($_GET['g_signin']): ?>
<body onload="signIn()">
<?php elseif(isset($_GET['g_signout']): ?>
<body onload="signOut()">
<?php endif; ?>
	<script>
	function signIn(googleUser) {
		
		
		var profile = googleUser.getBasicProfile();
		console.log("ID: " + profile.getId()); // Don't send this directly to your server!
		console.log("Name: " + profile.getName());
		console.log("Image URL: " + profile.getImageUrl());
		console.log("Email: " + profile.getEmail());
						
		// The ID token you need to pass to your backend:
		var id_token = googleUser.getAuthResponse().id_token;
		 console.log("ID Token: " + id_token);
		$.get( "response.php?gdata", { email: profile.getEmail(), token: id_token, img: profile.getImageUrl() } ).done(function( data ) {
			alert( "Dados: " + data );
		});
	};
	</script>
						
	<script>
	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {
			alert( "deslogado" );
		});
	}
	</script>
</body>
</html>
<?php endif; ?>
