<?php
require_once '../PagSeguroLibrary/PagSeguroLibrary.php';

function requisicaoDePagamento(){
	$paymentRequest = new PagSeguroPaymentRequest();
	$paymentRequest->addItem('1','Seis meses de acesso ao site Help RPG',1,20.00);
	$paymentRequest->setSender('José Comprador','comprador@uol.com.br','11','56273440');
	$paymentRequest->setCurrency("BRL");
	$paymentRequest->setReference('1');
	
	$credentials = new PagSeguroAccountCredentials("helprpg@gmail.com", "D651F550CD3345809266E56D552E1C37");
	
	$url = $paymentRequest->register($credentials);
	header("Location: $url");
}

requisicaoDePagamento();

?>