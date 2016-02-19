<?php

if(isset($_GET['modo_linguagem'])){
	if($_GET['modo_linguagem'] == 2){
		setcookie("lang_cookie", 2, time()+3600*24*30);
		header('Location: '.$_GET['return']);
	}elseif($_GET['modo_linguagem'] == 1){
		setcookie ("lang_cookie", 1, time() - 3600);
		header('Location: '.$_GET['return']);
	}
}

?>