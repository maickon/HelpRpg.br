<?php
$tag = new tags();

if(isset($_POST["botao"]) && $_POST["botao"] == 'Visualizar Chefe de fase'):
	$personagem_db = new personagem_db();
	
endif;

$tag->open('div','class="row"');
	$tag->open('form','action="index.php?p=fichas" method="POST" class="custom"');
		menuLinkPersonagem();
		itensInputConjunto($tag);
	$tag->close('form');	
$tag->close('div');


?>