<?php
$tag = new tags();
$tag->open('div','class="container-fluid"');
	$tag->open('div','class="large-12 columns"');
		$tag->open('h1');
			echo '<small>Blog Help Rpg - Sejam bem vindos aventureiros.</small>';
		$tag->close('h1');
		$tag->open('hr');
	$tag->close('div');
$tag->close('div');;

	$tag->open('div','class="row"');
		$tag->open('div','class="span9" role="content"');
		$blog_page = new blog_page();

		if(isset($_GET['id'])):
			$blog_page->exibir_post($_GET['id']);
		else:	
			$blog_page->exibir_blog();
		endif;
		while($objeto_resp = $blog_page->retorna_dados()):
			$tag->open('article');
				$tag->open('h3');
					$tag->open('a','href="#"');
						echo $objeto_resp->titulo;
					$tag->close('a');
				$tag->close('h3');
	
				$tag->open('h6');
					echo data_postagem($objeto_resp->usuario,$objeto_resp->data);
				$tag->close('h6');
				
				$tag->open('div','class="row"');
					$tag->open('div','class="span9"');
							
						echo $objeto_resp->texto;
						
					$tag->close('div');
				
					$comentario_blog = new comentario_blog();
					$comentario_blog->listar_comentarios($_GET['id']);
					$tag->open('h4');
						echo $tag->inprime('Comentários');
					$tag->close('h4');
					while($objeto_resp = $comentario_blog->retorna_dados()):
						$tag->open('div','class="span9"');
							$tag->open('div','class="well"');
								$tag->open('h6');
									if($objeto_resp->usuario == ''):
										echo data_comentario('um fan',$objeto_resp->data);
									else:
										echo data_comentario($objeto_resp->usuario,$objeto_resp->data);
									endif;
								$tag->close('h6');
				
								$tag->open('div','class="row"');
									$tag->open('div','class="span9"');
										echo $objeto_resp->texto;
									$tag->close('div');	
								$tag->close('div');
							$tag->close('div');
						$tag->close('div');
					endwhile;
				$tag->close('div');
				
				loadModuo('comentario_blog','postar');
				
			$tag->close('article');	

	$tag->open('hr');
endwhile;
	anuncio_menu();
$tag->close('div');		
		
?>
	