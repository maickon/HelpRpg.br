<?php
function apresentacaoHistoria(){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('Página de pesquisa por histórias de NPC.');
			$tag->close('h2');
			
			$tag->open('p');
				$tag->inprime('
						Olá aventureiro. Nesta página você vai encontrar referências sobre históras de NPC para suas aventuras.
						');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Os links acima indicam uma pesquisa por história montada ou história completa de forma serteada. 
						A diferença entre eles é que uma história montada é composta de três elementos distintos(inicio,meio e fim)
						que são sorteados e juntos montam a história.
						Uma história completa é uma história única, ela não é montada por três partes. (Ela é mais consistente)');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Ao clicar num link será exibido o tipo de história escolido. Caso não se importe com o tipo de história
						poderá clicar no link "qualquer um"	para retornar um sorteio de qualquer tipo de história de nosso banco 
						de dados..');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Um conjunto maior de histórias está disponível apenas para usuários com
						uma conta no site do Help RPG. Caso seja do seu interesse, faça logo uma conta.');
			$tag->close('p');
			
			
			
		$tag->close('div');
	$tag->close('div');
	
}

function montarHistoria($inicio,$meio,$fim,$nome){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('A história de '.$nome);
			$tag->close('h2');
		
			$tag->open('table','class="table table-condensed"');
				$tag->open('tr','class="fundo_armadura"');
					$tag->inprime('<p>'.$inicio.'</p>'.
								  '<p>'.$meio.'</p>'.
								  '<p>'.$fim.'</p>');			
				$tag->close('tr');
			$tag->close('table');
		$tag->close('div');
	$tag->close('div');	
}

function historiaCompleta($historia, $nome){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('A história de '.$nome);
			$tag->close('h2');
			
			$tag->open('table','class="table table-condensed"');
				$tag->open('tr','class="fundo_armadura"');
					$tag->inprime('<p>'.$historia.'</p>');			
				$tag->close('tr');
			$tag->close('table');
		$tag->close('div');
	$tag->close('div');	
}

function historiasMenu(){
	$tag = new tags();
	$objeto = null;
	if(isset($_GET["h"])):
		switch($_GET["h"]):
			case 'montada':
				$historia_inicio = new historias();
				$historia_meio = new historias();
				$historia_fim = new historias();
				$historia_inicio->gerarSexo();
				$historia_inicio->gerarNome($historia_inicio->getSexo());
				montarHistoria($historia_inicio->inicio(),$historia_meio->meio(),$historia_fim->fim(),$historia_inicio->getNome());
				
			break;
	
			case 'completa':
				$historia = new historias();
				$historia->gerarSexo();
				$historia->gerarNome($historia->getSexo());
				historiaCompleta($historia->historia_completa(), $historia->getNome());
				break;
				
			case 'todos':
				$historia_inicio = new historias();
				$historia_meio = new historias();
				$historia_fim = new historias();
				$historia_inicio->gerarSexo();
				$historia_inicio->gerarNome($historia_inicio->getSexo());
				
				$num = rand(1,2);
				if($num == 1):
					montarHistoria($historia_inicio->inicio(),$historia_meio->meio(),$historia_fim->fim(),$historia_inicio->getNome());
				else:
					historiaCompleta($historia_inicio->historia_completa(), $historia_inicio->getNome());
				endif;
				break;				
			default :
				apresentacaoHistoria();
				break;
				
			endswitch;
	else:
		apresentacaoHistoria();
	endif;	
}

function linksGuiaHistoria(){
	$tag = new tags();
	$tag->open('br');
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			if(isset($_GET['h']) && $_GET['h'] == 'montada'):
				$tag->open('a','href="index.php?p=historias&h=montada"');
					$tag->open('b');
						$tag->inprime('História Montada &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=historias&h=montada"');
					$tag->inprime('História Montada &rArr;');
				$tag->close('a');	
			endif;
			
			if(isset($_GET['h']) && $_GET['h'] == 'completa'):
				$tag->open('a','href="index.php?p=historias&h=completa"');
					$tag->open('b');
						$tag->inprime('História Completa &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=historias&h=completa"');
					$tag->inprime('História Completa &rArr;');
				$tag->close('a');
			endif;
			
			if(isset($_GET['h']) && $_GET['h'] == 'todos'):
				$tag->open('a','href="index.php?p=historias&h=todos"');
					$tag->open('b');
						$tag->inprime('Qualquer um &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=historias&h=todos"');
					$tag->inprime('Qualquer um &rArr;');
				$tag->close('a');
			endif;
		
			$tag->open('br');	
			$tag->open('br');
		$tag->close('div');
	$tag->close('div');	
}

?>