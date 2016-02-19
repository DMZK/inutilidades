<?php

if(isset($_COOKIE['lang_cookie']) && $_COOKIE['lang_cookie'] == 2){
	$lang_file = file_get_contents("config/lang/informal.json");
	$lang_mode = 2;
}else{
	$lang_file = file_get_contents("config/lang/formal.json");
	$lang_mode = 1;
}
$lang = json_decode($lang_file);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inutilidades - Ferramentas feitas para nerds brasileiros</title>
	<link rel="stylesheet" type="text/css" href="css/css.inutil.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<meta name="theme-color" content="#f1c40f">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="Encontre ferramentas inúteis feitas para verdadeiros usuários da internet! E sim... essa é uma descrição inútil.">

	<meta property="og:title" content="Inutilidades - Ferramentas feitas para nerds brasileiros" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.inutilidades.cf/" />
	<meta property="og:image" content="http://exemplo.com/imagem.jpg" />
	<meta property="og:description" content="Encontre ferramentas inúteis feitas para verdadeiros usuários da internet! E sim... essa é uma descrição inútil." />
	<meta property="og:site_name" content="Inutilidades" />

	<link rel="shortcut icon" type="image/png" href="img/logo.png"/>

	<script type="text/javascript">
		function callBackMudancasStatus(response){

			if(response.status === "connected"){

				$("#logar").hide();
				testAPI();
			}else if(response.status === "not_authorized"){
				alert("Nao ta logado no app");
			}else{
				alert("nao logado em nada");
			}

		}
	</script>
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '989895847742738',
      xfbml      : true,
      cookie 	 : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  FB.getLoginStatus(function(response){
  	callBackMudancasStatus(response);
  });

  function testAPI(){
  	FB.api("/me", function(response){
  		alert(response.name);
  		console.log(response);
  	});
  }

  function logout(){
  	FB.logout(function(response){
  		callBackMudancasStatus(response);
  		alert("deslogado");
  	});
  }

  function login(){
  	FB.login(function(response){
  		callBackMudancasStatus(response);
  	});
  }
</script>

<header>
	<div class="inner_header">
		<div class="logo"><img src="img/logo.png"></div>
		<a class="open_menu mobile"><i class="fa fa-tasks"></i></a>
		<div class="menu">
			<ul>
				<li><a href="#" class="fade"><?php echo$lang->{'ferramentas_menu'}; ?> <i class="fa fa-angle-down"></i></a>
					<div class="submenu fade">
						<ul>
							<li><a href="#" class="fade">Este site está online?</a></li>
							<li><a href="#" class="fade">WHOIS</a></li>
							<li><a href="#" class="fade"><?php echo$lang->{'get_images_menu'}; ?></a></li>
						</ul>
					</div>
				</li>
				<li><a href="#" class="fade"><?php echo$lang->{'apis_menu'}; ?> <i class="fa fa-angle-down"></i></a>
					<div class="submenu fade">
						<ul>
							<li><a href="#" class="fade"><i class="fa fa-youtube-play"></i> YouTube</a></li>
							<li><a href="#" class="fade"><i class="fa fa-facebook-official"></i> Facebook</a></li>
							<li><a href="#" class="fade"><i class="fa fa-twitter-square"></i> Twitter</a></li>
						</ul>
					</div>
				</li>
				<li><a href="#" class="fade">Mais <i class="fa fa-angle-down"></i></a>
					<div class="submenu fade">
						<ul>
							<li><a href="#" class="fade"><i class="fa fa-list-ol"></i> <?php echo$lang->{'faq_menu'}; ?></a></li>
							<li><a href="#" class="fade"><i class="fa fa-thumbs-up"></i> <?php echo$lang->{'donate_menu'}; ?></a></li>
						</ul>
					</div>
				</li>
				<li><a id="login" class="fade"><?php echo$lang->{'login_menu'}; ?> <i class="fa fa-user"></i></a></li>
				<li><a href="#" class="fade"><?php echo$lang->{'cadastro_menu'}; ?> <i class="fa fa-user-plus"></i></a></li>

				<a href="#modo_linguagem" class="mudar_lingua"><i class="fa fa-language"></i></a>
				<div id="modo_linguagem_box">
					<a href="core.php?modo_linguagem=1&return=index.php" <?php if($lang_mode == 1): ?>class="ativo"<?php endif; ?>><i class="fa fa-graduation-cap"></i> Linguagem Formal <i class="fa fa-question-circle" title="Escrita comum."></i></a>
					<a href="core.php?modo_linguagem=2&return=index.php" <?php if($lang_mode == 2): ?>class="ativo"<?php endif; ?>><i class="fa fa-warning"></i> Linguagem Informal (Beta) <i class="fa fa-question-circle" title="Escrita com girias, palavras de baixo calão e etc."></i></a>
				</div>
			</ul>
		</div>
	</div>

	<div id="login_screen">
		<div class="login_form">
			<a id="fechar_btn"><i class="fa fa-times"></i></a>
			<form>
				<div class="social_login_btns">
					<a href="#" class="facebook_login_btn"><i class="fa fa-facebook-official"></i> Logar-se via Facebook</a>
					<a href="#" class="google_login_btn"><i class="fa fa-google-plus-square"></i> Logar-se via Google+</a>
					<a href="#" class="twitter_login_btn"><i class="fa fa-twitter-square"></i> Logar-se via Twitter</a>
				</div>

				<label>Ou use sua conta Inútil:</label>
				<input type="text" placeholder="Nome de usuário ou email">
				<input type="password" placeholder="Digite sua senha">
				<button type="submit">Entrar</button> 
			</form>
		</div>
	</div>
</header>

<div id="wrapper">
	
	<div class="conteudo">
		<div class="left_column">

			<div class="widget">
				<div class="widget_title" data-title="<?php echo$lang->{'widget_log'}; ?>"><i class="fa fa-home"></i></div>
				<div class="widget_body">
					<ul>
						<li>O site agora está aberto.</li>
					</ul>
				</div>
			</div>

		</div>

		<div class="right_column">

			<div class="widget">
				<div class="widget_title" data-title="<?php echo$lang->{'widget_definicao_apis'}; ?>"><i class="fa fa-home"></i></div>
				<div class="widget_body">
					<?php echo$lang->{'widget_text_def_apis'}; ?>
				</div>
			</div>

			<div class="widget">
				<div class="widget_title cur_pointer" data-title="Preciso de uma API" id="pedido_api_open"><i class="fa fa-plus"></i></div>
				<div class="hidden" id="pedido_api">
					<div class="widget_body">
						<form method="post" class="widget_form">
							<textarea placeholder="Faça seu pedido..."></textarea>
							<button type="submit">Enviar pedido <i class="fa fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<script type="text/javascript">
	$(".mudar_lingua").click(function(){
		$("#modo_linguagem_box").fadeToggle(200);
	});

	$(".open_menu").click(function(){
		$(".menu").slideToggle();
	});

	$("#login").click(function(){
		$("#login_screen").fadeToggle(200);
	});

	$("#fechar_btn").click(function(){
		$("#login_screen").fadeOut(200);
	});

	$("#pedido_api_open").click(function(){
		$("#pedido_api").slideToggle();
	});
</script>

</body>
</html>