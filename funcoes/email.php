<?php

function email(){
	$ql = "\n";
	$emailSender = "contato@helprpg.com.br";
	$nomeRemetente = "Help RPG";
	$emailDestinatario = "maickonmaickon@hotmail.com";
	$comCopia = "contato@helprpg.com.br";
	$assundo = "Cadatro de conta aventureiro";
	$mensagem = "Você acabou de fazer um cadastro no site do Help RPG. Acesse o link abaixo para efetivar o pagamento e tenha sua conta liberada";
	$mensagemHTML = "<p>'.$mensagem.'</p>";
	
	$headers = "MIME-Version: 1.1".$ql;
	$headers .="content-type: text/html; charset=iso-8859-1".$ql;
	$headers .="From: ".$emailSender.$ql;
	$headers .="Return-Path: ".$emailSender.$ql;
	$headers .="Cc: ".$comCopia.$ql;
	$headers .="Reply-To ".$emailSender.$ql;
	
	if(mail($emailDestinatario, $assundo, $mensagemHTML, $headers, "-r".$emailSender)):
		print "Mensagem enviado com total sucesso!";
	else:
		print "Mensagem nao enviada com sucesso!";
	endif;
}

//email();

?>