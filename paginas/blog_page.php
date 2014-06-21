<?php
$tag = new tags();
$tag->open('div','class="container-fluid"');
	$tag->open('div','class="large-12 columns"');
		$tag->open('h1');
			echo '<small>Blog Help Rpg - Sejam bem vindos aventureiros.</small>';
		$tag->close('h1');
		$tag->open('hr');
	$tag->close('div');
$tag->close('div');

$tag->open('div','class="row"');
	$tag->open('div','class="span9" role="content"');
	$blog_page = new blog_page();
	if(isset($_GET['categoria'])):
		$blog_page->exibir_blog($_GET['categoria']);
	else:	
		$blog_page->exibir_blog();
	endif;
	while($objeto_resp = $blog_page->retorna_dados()):
		$tag->open('article');
			$tag->open('h3');
				$tag->open('a','href="?p=post&id='.$objeto_resp->id.'"');
					echo $objeto_resp->titulo;
				$tag->close('a');
			$tag->close('h3');
	
			$tag->open('h6');
				echo data_postagem($objeto_resp->usuario,$objeto_resp->data);
			$tag->close('h6');
				
			$tag->open('div','class="row"');
				$tag->open('div','class="span9"');	
					echo limitar($objeto_resp->texto,200);
				$tag->close('div');	
			$tag->close('div');
				
			$tag->open('h4');
				$tag->open('a','href="?p=post&id='.$objeto_resp->id.'" class="link" ');
					echo utf8_decode('Continuar lendo &raquo;');
				$tag->close('a');
			$tag->close('h4');
				
		$tag->close('article');	
		$tag->open('hr');
	endwhile;
	
	anuncio_menu();
$tag->close('div');
		
?>
	