<?php
function linksGuiaEscudos(){
	$tag = new tags();
	$tag->open('br');
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			if(isset($_GET['c']) && $_GET['c'] == 'leves'):
				$tag->open('a','href="index.php?p=escudos&c=leves"');
					$tag->open('b');
						$tag->inprime('Escudos Leves &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=escudos&c=leves"');
					$tag->inprime('Escudos Leves &rArr;');
				$tag->close('a');	
			endif;
			
			if(isset($_GET['c']) && $_GET['c'] == 'medias'):
				$tag->open('a','href="index.php?p=escudos&c=medias"');
					$tag->open('b');
						$tag->inprime('Escudos Médio &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=escudos&c=medias"');
					$tag->inprime('Escudos Médio &rArr;');
				$tag->close('a');
			endif;
			
			if(isset($_GET['c']) && $_GET['c'] == 'pesadas'):
				$tag->open('a','href="index.php?p=escudos&c=pesadas"');
					$tag->open('b');
						$tag->inprime('Escudos Pesados &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=escudos&c=pesadas"');
					$tag->inprime('Escudos Pesados &rArr;');
				$tag->close('a');
			endif;
			
			if(isset($_GET['c']) && $_GET['c'] == 'todos'):
				$tag->open('a','href="index.php?p=escudos&c=todos"');
					$tag->open('b');
						$tag->inprime('Qualquer tipo de escudo &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=escudos&c=todos"');
					$tag->inprime('Qualquer tipo de escudo &rArr;');
				$tag->close('a');
			endif;			
		
			$tag->open('br');	
			$tag->open('br');
		$tag->close('div');
	$tag->close('div');	
}

function escudoMenu(){
	$tag = new tags();
	$objeto = null;
	if(isset($_GET["c"])):
		switch($_GET["c"]):
			case 'leves':
				$escudo = new escudos();
				$escudo->exibir_escudos($_GET["c"]);
				while($objeto_resp = $escudo->retorna_dados()):
					exibirArmadura($objeto_resp);
				endwhile;
			break;
	
			case 'medias':
				$escudo = new escudos();
				$escudo->exibir_escudos($_GET["c"]);
				while($objeto_resp = $escudo->retorna_dados()):
					exibirArmadura($objeto_resp);
				endwhile;
				break;
				
			case 'pesadas':
				$escudo = new escudos();
				$escudo->exibir_escudos($_GET["c"]);
				while($objeto_resp = $escudo->retorna_dados()):
					exibirArmadura($objeto_resp);
				endwhile;
				break;
				
			case 'todos':
				$escudo = new escudos();
				$escudo->exibir_escudos($_GET["c"]);
				while($objeto_resp = $escudo->retorna_dados()):
					exibirArmadura($objeto_resp);
				endwhile;
				break;
				
			default :
				apresentacao();
				break;
				
			endswitch;
	else:
		apresentacao();
	endif;	
}

function exibir_escudos($objeto_escudo){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime($objeto_escudo->nome.', Indicada para nível '.$objeto_escudo->lv);
			$tag->close('h2');
			
			$tag->open('table','class="table table-condensed"');
				$tag->open('tr','class="fundo_armadura"');
					$tag->open('td');
						$tag->inprime('<b>Categoria</b> '.$objeto_escudo->categoria);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Tipo</b> '.$objeto_escudo->tipo);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>PO (custo em peças de ouro)</b> '.$objeto_escudo->custo);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>CA (Bônus na Classe Armadura)</b> '.$objeto_escudo->bonusNaCa);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Penalidade em pericia</b> '.$objeto_escudo->penalidadeNaPericia);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Falha de Magia Arcana</b> '.$objeto_escudo->falhaDeMagiaArcana);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Deslocamento Médio</b> '.$objeto_escudo->deslocamentoMedio);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Deslocamento Pequeno</b> '.$objeto_escudo->deslocamentoPequeno);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Peso</b> '.$objeto_escudo->peso);
					$tag->close('td');
				
				$tag->close('tr');
			$tag->close('table');
			
			$tag->open('p','class="fundo_armadura"');
				$tag->inprime('<b>Descrição</b><br /> '.$objeto_escudo->descricao);
			$tag->close('p');
		$tag->close('div');
	$tag->close('div');
}

function apresentacao(){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('Página de pesquisa por escudos.');
			$tag->close('h2');
			
			$tag->open('p');
				$tag->inprime('
						Seja bem vindo amigo. Aqui você pode simular encontro de um escudos ou simplesmente 
						vasculhar a base de dados por curiosidade.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Os links acima indicam uma pesquisa por categoria, dessa forma é possível pesquisar apenas por "escudos leves, pesados"
						caso seja do seu interesse ou simplesmente pesquisar por todos os tipos de categoria.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
							Ao clicar num link serão exibidos três escudos sorteadas de nossa base de dados. Assim para cada vez que você clicar
							em um dos links acima, três novos escudos serão exibidos aleatóriamente.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Além dos escudos presentes acima, você pode encontrar escudos mágicas que estão disponíveis apenas para usuário com
						uma conta no site do Help RPG. Caso seja do seu interesse, faça logo uma conta.');
			$tag->close('p');
			
			
			
		$tag->close('div');
	$tag->close('div');
	
}
?>