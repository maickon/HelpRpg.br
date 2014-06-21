<?php
$tag = new tags();
$tag->open('div','class="span12"');	
	$tag->open('div','class="row"');
		$tag->open('form','action="index.php?p=fichas" method="POST" class="custom"');
			menuLinkPersonagem();
		$tag->close('form');	
	$tag->close('div');
$tag->close('div');

$tag->open('div','class="span12"');
	$tag->open('form','action="index.php?p=ficha_montada" method="POST" class="custom"');
		$tag->open('div','class="row"');
			$tag->open('div','class="span12"');
				itemTitulo();
			$tag->close('div');
		$tag->close('div');
		
		$tag->open('div','class="row"');
			habilidades_input();
			descricao_part_A($tag);
			descricao_part_B($tag);
			descricao_part_C($tag);
		$tag->close('div');
		
		$tag->open('div','class="row"');
			descricao_arma_earmadura_usada_A($tag);
			descricao_arma_earmadura_usada_B($tag);
			descricao_arma_earmadura_usada_C($tag);
		$tag->close('div');
		
		$tag->open('div','class="row"');
			descricao_arma($tag);
			descricao_armadura($tag);
		$tag->close('div');
		
		$tag->open('div','class="row"');
			descricao_iten_comum($tag);
			descricao_iten_magico($tag);
		$tag->close('div');
		
		$tag->open('div','class="row"');
			descricao_historia($tag);
			descricao_grimorio($tag);
		$tag->close('div');
		
		$tag->open('div','class="row"');
			item_botao_save_char();
		$tag->close('div');
	$tag->close('form');
$tag->close('div');

?>