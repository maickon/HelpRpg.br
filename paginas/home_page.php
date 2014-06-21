<?php
$tag = new tags();
$tag->open('div','class="countainer"');
	$tag->open('div','class="span4" slide');
		contatador();
		slide();
	$tag->close('div');
	
	$tag->open('div','class="span6" slide');
	
		$tag->open('h2','align="center"');
			exibir_titulo($page='home_page',$classe='home_page');
		$tag->close('h2');
		
		exibir_pagina($page='home_page',$classe='home_page');

	$tag->close('div');
$tag->close('div');
?>