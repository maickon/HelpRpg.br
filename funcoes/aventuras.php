<?php

function menuAventuras(){
	$tag = new tags();
	$tag->open('br');
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			if(isset($_GET['a']) && $_GET['a'] == 'novo'):
				$tag->open('a','href="index.php?p=aventuras&a=novo"');
					$tag->open('b');
						$tag->inprime('Nova id�ia para sua aventura &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=aventuras&a=novo"');
					$tag->inprime('Nova id�ia para sua aventura &rArr;');
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
				$tag->inprime('P�gina de pesquisa por id�ias de aventura.');
			$tag->close('h2');
			
			$tag->open('p');
				$tag->inprime('
						Esta � a p�gina que apresenta a voc�s uma vasta infinidade de id�ias para sua aventura. Sabemos que todo
						mestre possui aqueles dias em que sua cabe�a est� sem inspira��o.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Ent�o atrav�s de um clique voc� encontrar� uma id�ia para sua aventura, se n�o gostou, clique de novo
						at� vir algo interessante.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Contamos com uma grande base de id�ias, v�rias foram pesquisadas na internet em blogs de RPG.
						Entretanto a maioria das aventuras encontradas ser�o criadas pela pr�pria equipe do Help RPG.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Espero que tenham um bom divetimento e at� mais..');
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