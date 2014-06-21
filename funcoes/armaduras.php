<?php
function linksGuia(){
	$tag = new tags();
	$tag->open('br');
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			if(isset($_GET['c']) && $_GET['c'] == 'leves'):
				$tag->open('a','href="index.php?p=armaduras&c=leves"');
					$tag->open('b');
						$tag->inprime('Armaduras Leves &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=armaduras&c=leves"');
					$tag->inprime('Armaduras Leves &rArr;');
				$tag->close('a');	
			endif;
			
			if(isset($_GET['c']) && $_GET['c'] == 'medias'):
				$tag->open('a','href="index.php?p=armaduras&c=medias"');
					$tag->open('b');
						$tag->inprime('Armaduras Médias &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=armaduras&c=medias"');
					$tag->inprime('Armaduras Médias &rArr;');
				$tag->close('a');
			endif;
			
			if(isset($_GET['c']) && $_GET['c'] == 'pesadas'):
				$tag->open('a','href="index.php?p=armaduras&c=pesadas"');
					$tag->open('b');
						$tag->inprime('Armaduras Pesadas &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=armaduras&c=pesadas"');
					$tag->inprime('Armaduras Pesadas &rArr;');
				$tag->close('a');
			endif;
			
			if(isset($_GET['c']) && $_GET['c'] == 'todos'):
				$tag->open('a','href="index.php?p=armaduras&c=todos"');
					$tag->open('b');
						$tag->inprime('Qualquer tipo de armadura &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=armaduras&c=todos"');
					$tag->inprime('Qualquer tipo de armadura &rArr;');
				$tag->close('a');
			endif;			
		
			$tag->open('br');	
			$tag->open('br');
		$tag->close('div');
	$tag->close('div');	
}

function armaduraMenu(){
	$tag = new tags();
	$objeto = null;
	if(isset($_GET["c"])):
		switch($_GET["c"]):
			case 'leves':
				$armadura = new armaduras();
				$armadura->exibir_categoria_armaduras($_GET["c"]);
				while($objeto_resp = $armadura->retorna_dados()):
					exibirArmadura($objeto_resp);
				endwhile;
			break;
	
			case 'medias':
				$armadura = new armaduras();
				$armadura->exibir_categoria_armaduras($_GET["c"]);
				while($objeto_resp = $armadura->retorna_dados()):
					exibirArmadura($objeto_resp);
				endwhile;
				break;
				
			case 'pesadas':
				$armadura = new armaduras();
				$armadura->exibir_categoria_armaduras($_GET["c"]);
				while($objeto_resp = $armadura->retorna_dados()):
					exibirArmadura($objeto_resp);
				endwhile;
				break;
				
			case 'todos':
				$armadura = new armaduras();
				$armadura->exibir_categoria_armaduras($_GET["c"]);
				while($objeto_resp = $armadura->retorna_dados()):
					exibirArmadura($objeto_resp);
				endwhile;
				break;
				
			default :
				apresentacaoescudos();
				break;
				
			endswitch;
	else:
		apresentacaoescudos();
	endif;	
}

function exibirArmadura($objeto_armadura){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime($objeto_armadura->nome.', Indicada para nível '.$objeto_armadura->lv);
			$tag->close('h2');
			
			$tag->open('table','class="table table-condensed"');
				$tag->open('tr','class="fundo_armadura"');
					$tag->open('td');
						$tag->inprime('<b>Categoria</b> '.$objeto_armadura->categoria);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Tipo</b> '.$objeto_armadura->tipo);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>PO (custo em peças de ouro)</b> '.$objeto_armadura->custo);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>CA (Bônus na Classe Armadura)</b> '.$objeto_armadura->bonusNaCa);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Penalidade em pericia</b> '.$objeto_armadura->penalidadeNaPericia);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Falha de Magia Arcana</b> '.$objeto_armadura->falhaDeMagiaArcana);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Deslocamento Médio</b> '.$objeto_armadura->deslocamentoMedio);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Deslocamento Pequeno</b> '.$objeto_armadura->deslocamentoPequeno);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Peso</b> '.$objeto_armadura->peso);
					$tag->close('td');
				
				$tag->close('tr');
			$tag->close('table');
			
			$tag->open('p','class="fundo_armadura"');
				$tag->inprime('<b>Descrição</b><br /> '.$objeto_armadura->descricao);
			$tag->close('p');
		$tag->close('div');
	$tag->close('div');
}

function apresentacaoescudos(){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('Página de pesquisa por armaduras.');
			$tag->close('h2');
			
			$tag->open('p');
				$tag->inprime('
						Seja bem vindo amigo. Aqui você pode pesquisar por uma armadura simulando o seu encontro ou simplesmente 
						vasculhando a base de dados por curiosidade.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Os links acima indicam uma pesquisa por categoria, dessa forma é possível pesquisar apenas por "armaduras pesadas"
						caso seja do seu interesse ou simplesmente pesquisar por todos os tipos de categoria.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
							Ao clicar num link serão exibidos três armadura sorteadas de nossa base de dados. Assim para cada vez que você clicar
							em um dos links acima, três novas armaduras serão exibidas aleatóriamente.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Além das armaduras simples, você pode encontrar armaduras mágicas que estão disponíveis apenas para usuário com
						uma conta no site do Help RPG. Caso seja do seu interesse, faça logo uma conta.');
			$tag->close('p');
			
			
			
		$tag->close('div');
	$tag->close('div');
	
}
?>