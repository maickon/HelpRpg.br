<?php
function linksArmasGuia(){
	$tag = new tags();
	$tag->open('br');
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			if(isset($_GET['c']) && $_GET['c'] == 'armas_simples'):
				$tag->open('a','href="index.php?p=armas&c=armas_simples"');
					$tag->open('b');
						$tag->inprime('Armas Simples &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=armas&c=armas_simples"');
					$tag->inprime('Armas Simples &rArr;');
				$tag->close('a');	
			endif;
			
			if(isset($_GET['c']) && $_GET['c'] == 'armas_comuns'):
				$tag->open('a','href="index.php?p=armas&c=armas_comuns"');
					$tag->open('b');
						$tag->inprime('Armas Comuns &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=armas&c=armas_comuns"');
					$tag->inprime('Armas Comum &rArr;');
				$tag->close('a');
			endif;
			
			if(isset($_GET['c']) && $_GET['c'] == 'armas_exoticas'):
				$tag->open('a','href="index.php?p=armas&c=armas_exoticas"');
					$tag->open('b');
						$tag->inprime('Armas Exóticas &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=armas&c=armas_exoticas"');
					$tag->inprime('Armas Exóticas &rArr;');
				$tag->close('a');
			endif;
			
			if(isset($_GET['c']) && $_GET['c'] == 'todos'):
				$tag->open('a','href="index.php?p=armas&c=todos"');
					$tag->open('b');
						$tag->inprime('Qualquer tipo de arma &rArr;');
					$tag->close('b');
				$tag->close('a');
			else:
				$tag->open('a','href="index.php?p=armas&c=todos"');
					$tag->inprime('Qualquer tipo de arma &rArr;');
				$tag->close('a');
			endif;			
		
			$tag->open('br');	
			$tag->open('br');
		$tag->close('div');
	$tag->close('div');	
}

function armasMenu(){
	$tag = new tags();
	$objeto = null;
	if(isset($_GET["c"])):
		switch($_GET["c"]):
			case 'armas_simples':
				$armas = new armas();
				$armas->exibir_armas($_GET["c"]);
				while($objeto_resp = $armas->retorna_dados()):
					exibirArmas($objeto_resp);
				endwhile;
			break;
	
			case 'armas_comuns':
				$armas = new armas();
				$armas->exibir_armas($_GET["c"]);
				while($objeto_resp = $armas->retorna_dados()):
					exibirArmas($objeto_resp);
				endwhile;
				break;
				
			case 'armas_exoticas':
				$armas = new armas();
				$armas->exibir_armas($_GET["c"]);
				while($objeto_resp = $armas->retorna_dados()):
					exibirArmas($objeto_resp);
				endwhile;
				break;
				
			case 'todos':
				$armas = new armas();
				$armas->exibir_armas($_GET["c"]);
				while($objeto_resp = $armas->retorna_dados()):
					exibirArmas($objeto_resp);
				endwhile;
				break;
				
			default :
				armasApresentacao();
				break;
				
			endswitch;
	else:
		armasApresentacao();
	endif;	
}

function exibirArmas($objeto_armas){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime($objeto_armas->nome.', Indicada para nível '.$objeto_armas->lv);
			$tag->close('h2');
			
			$tag->open('table','class="table table-condensed"');
				$tag->open('tr','class="fundo_armadura"');
					$tag->open('td');
						$tag->inprime('<b>Categoria</b> '.$objeto_armas->categoria);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Tipo</b> '.$objeto_armas->tipo);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>PO (custo em peças de ouro)</b> '.$objeto_armas->preco);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Margem de acerto crítico</b> '.$objeto_armas->decisivo);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Alcance</b> '.$objeto_armas->distancia);
					$tag->close('td');
					
					$tag->open('td');
						$tag->inprime('<b>Peso</b> '.$objeto_armas->peso);
					$tag->close('td');
				
				$tag->close('tr');
			$tag->close('table');
			
			$tag->open('p','class="fundo_armadura"');
				$tag->inprime('<b>Descrição</b><br /> '.$objeto_armas->descricao);
			$tag->close('p');
		$tag->close('div');
	$tag->close('div');
}

function armasApresentacao(){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('Página de pesquisa por armas.');
			$tag->close('h2');
			
			$tag->open('p');
				$tag->inprime('
						Seja bem vindo amigo. Aqui você pode pesquisar por uma arma simulando o seu encontro ou simplesmente 
						vasculhando a base de dados por curiosidade.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Os links acima indicam uma pesquisa por categoria, dessa forma é possível pesquisar apenas por categorias como "armas simple, comuns e exóticas"
						caso seja do seu interesse ou simplesmente pesquisar por todos os tipos de categoria.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
							Ao clicar num link serão exibidos três armas sorteadas de nossa base de dados. Assim para cada vez que você clicar
							em um dos links acima, três novas armas serão exibidas aleatóriamente.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Além das categorias de armas persentes acima, você pode encontrar armas mágicas que estão disponíveis apenas para usuário com
						uma conta no site do Help RPG. Caso seja do seu interesse, faça logo uma conta.');
			$tag->close('p');
			
			
			
		$tag->close('div');
	$tag->close('div');
	
}
?>