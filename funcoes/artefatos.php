<?php
function artefatosMenu(){
	$tag = new tags();
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			$tag->open('div');
				$tag->open('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
					artefatoSelect();
					artefatoBtn();
				$tag->close('form');
			$tag->close('div');
			
			if(isset($_POST["listar"]) && $_POST["listar"] == 'Novos artefatos'):
				$tag->open('div','class="row"');
					$tag->open('div','class="span12"');
						$artefatos = new artefatos();
						$qtd = $_POST['qtd'];
						if($qtd = ' ')$qtd = 3;
						$artefatos->gerar_artefatos($qtd);
						while($objeto_resp = $artefatos->retorna_dados()):
							$tag->open('div','class="span11"');
								$tag->open('div','class="thumbnail"');
									$tag->open('div','class="caption"');
										$tag->open('h3');
											$tag->inprime($objeto_resp->nome);
										$tag->close('h3');
								
										$tag->open('p');
											$tag->inprime($objeto_resp->descricao_hist);
										$tag->close('p');
										$tag->open('p');
											$tag->inprime($objeto_resp->descricao_regra);
										$tag->close('p');
									$tag->close('div');
								$tag->close('div');
							$tag->close('div');
						endwhile;
					$tag->close('div');
				$tag->close('div');	
			endif;
		$tag->close('div');
	$tag->close('div');
	
}

function artefatoSelect($qtd = 9, $label = "Quantidade de artefatos"){
	$tag = new tags();
	$tag->open('div','class="span3"');
		$tag->open('li');
			$tag->open('label');
				$tag->inprime($label);
			$tag->close('label');
			$tag->open('select','name="qtd"');
				$tag->open('option');
					$tag->inprime(' ');
				$tag->close('option');
				for($i=1;$i<=$qtd;$i++):
					$tag->open('option');
						$tag->inprime($i);
					$tag->close('option');
				endfor;
			$tag->close('select');	
		$tag->close('li');
	$tag->close('div');
}

function artefatoBtn(){
	$tag = new tags();
	
	$tag->open('div','class="span4"');
		$tag->open('li');
			$tag->open('label');
				$tag->inprime('Visualize novos artefatos aqui');
			$tag->close('label');
			$tag->open('input','type="submit" name="listar" value="Novos artefatos" class="btn"');
		$tag->close('li');
	$tag->close('div');
}

function apresentacaoArtefatos(){
	$tag = new tags();
	$tag->open('div','class="thumbnail"');
		$tag->open('div','class="page-header"');
			$tag->open('h2');
				$tag->inprime('Página de pesquisa por artefatos.');
			$tag->close('h2');
			
			$tag->open('p');
				$tag->inprime('
						Bem vindo a página de artefatos. Nesta página você poderá simular o encontro de artefatos mágicos ou premiar um grupo
						de jogadores com um dos artefatos que podem ser sorteados nesta página.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Acima vocês podem decidir o número de artefatos que vão aparecer nesta página. Após decidido basta clicar no botão 
						"Novos Artefatos" e visualizar o que foi sorteado de nossa base de dados.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
							Caso deixe o campo de quantidade de artefatos em branco, por padrão serão apresentados três artefatos.');
			$tag->close('p');
			
			$tag->open('p');
				$tag->inprime('
						Além destes artefatos, você pode encontrar um conjunto maior de artefatos que estão disponíveis apenas para usuário com
						uma conta no site do Help RPG. Caso seja do seu interesse, faça logo uma conta.');
			$tag->close('p');
			
			
			
		$tag->close('div');
	$tag->close('div');
	
}
?>