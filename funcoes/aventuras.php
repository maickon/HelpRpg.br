<?php

function menuAventuras(){
	$tag = new tags();
	$tag->open('br');
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			if(isset($_GET['a']) && $_GET['a'] == 'novo'):
				$tag->open('a','href="index.php?p=aventuras&a=novo"');
					$tag->open('b');
						$tag->inprime('Nova idéia para sua aventura &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=aventuras&a=novo"');
					$tag->inprime('Nova idéia para sua aventura &rArr;');
				$tag->close('a');	
			endif;
		$tag->close('div');
	$tag->close('div');
		
}

function apresentacaoAventura(){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('Página de pesquisa por idéias de aventura.');
			$tag->close('h2');
			
			$tag->open('p');
				$tag->inprime('
						Esta é a página que apresenta a vocês uma vasta infinidade de idéias para sua aventura. Sabemos que todo
						mestre possui aqueles dias em que sua cabeça está sem inspiração.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Então através de um clique você encontrará uma idéia para sua aventura, se não gostou, clique de novo
						até vir algo interessante.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Contamos com uma grande base de idéias, várias foram pesquisadas na internet em blogs de RPG.
						Entretanto a maioria das aventuras encontradas serão criadas pela própria equipe do Help RPG.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Espero que tenham um bom divetimento e até mais..');
			$tag->close('p');
			
			
			
		$tag->close('div');
	$tag->close('div');
	
}

function aventurasMenu(){
	$tag = new tags();
	$objeto = null;
	if(isset($_GET["a"]) && $_GET["a"]== 'novo'):
		$aventura = new aventuras();
		$aventura->retornar_aventura();
		while($aventura_resp = $aventura->retorna_dados()):
			exibirAventuras($aventura_resp->titulo,$aventura_resp->texto);
		endwhile;
	else:
		apresentacaoAventura();
	endif;	
}

function exibirAventuras($nome,$texto){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime($nome);
			$tag->close('h2');
		
			$tag->open('table','class="table table-condensed"');
				$tag->open('tr','class="fundo_armadura"');
					$tag->inprime('<p>'.$texto.'</p>');			
				$tag->close('tr');
			$tag->close('table');
		$tag->close('div');
	$tag->close('div');	
	
}


?>