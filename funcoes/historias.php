<?php
function apresentacaoHistoria(){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('P�gina de pesquisa por hist�rias de NPC.');
			$tag->close('h2');
			
			$tag->open('p');
				$tag->inprime('
						Ol� aventureiro. Nesta p�gina voc� vai encontrar refer�ncias sobre hist�ras de NPC para suas aventuras.
						');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Os links acima indicam uma pesquisa por hist�ria montada ou hist�ria completa de forma serteada. 
						A diferen�a entre eles � que uma hist�ria montada � composta de tr�s elementos distintos(inicio,meio e fim)
						que s�o sorteados e juntos montam a hist�ria.
						Uma hist�ria completa � uma hist�ria �nica, ela n�o � montada por tr�s partes. (Ela � mais consistente)');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Ao clicar num link ser� exibido o tipo de hist�ria escolido. Caso n�o se importe com o tipo de hist�ria
						poder� clicar no link "qualquer um"	para retornar um sorteio de qualquer tipo de hist�ria de nosso banco 
						de dados..');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Um conjunto maior de hist�rias est� dispon�vel apenas para usu�rios com
						uma conta no site do Help RPG. Caso seja do seu interesse, fa�a logo uma conta.');
			$tag->close('p');
			
			
			
		$tag->close('div');
	$tag->close('div');
	
}

function montarHistoria($inicio,$meio,$fim,$nome){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('A hist�ria de '.$nome);
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
				$tag->inprime('A hist�ria de '.$nome);
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
						$tag->inprime('Hist�ria Montada &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=historias&h=montada"');
					$tag->inprime('Hist�ria Montada &rArr;');
				$tag->close('a');	
			endif;
			
			if(isset($_GET['h']) && $_GET['h'] == 'completa'):
				$tag->open('a','href="index.php?p=historias&h=completa"');
					$tag->open('b');
						$tag->inprime('Hist�ria Completa &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=historias&h=completa"');
					$tag->inprime('Hist�ria Completa &rArr;');
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