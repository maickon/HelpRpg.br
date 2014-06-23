<?php
$tag = new tags();
$tag->open('div','class="row"');
	$tag->open('div','class="span4" slide');
		slide();
	$tag->close('div');
	
	$tag->open('div','class="span6"');
	
		$tag->open('h2','align="center"');
			plugins();
		$tag->close('h2');
		
		exibir_pagina($page='home_page',$classe='home_page');
	
		social_plugin_group();
	$tag->close('div');
$tag->close('div');
?>