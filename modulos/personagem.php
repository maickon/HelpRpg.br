<?php
require_once(dirname(dirname(__FILE__))."/init.php");
protegeArquivo(basename(__FILE__));
$tag = new tags();
$objeto = 'personagem_db';
$classe = 'personagem_db';
$modulo = 'personagem';

$pagina_nome = 'Criação de personagem.';
$descriacao= array('create'=>'Criando personagem no Help Rpg.',
				   'edit'=>'Editando personagem do Help Rpg.',
				   'destroy'=>'Apagando um personagem do Help Rpg.');

switch ($tela):
	case 'incluir':
		$tag->open('h2');
			$tag->inprime($descriacao['create']);
		$tag->close('h2');
		if(isset($_POST['cadastrar'])):
			$objeto = new $classe(array(
				//Atributos fisicos
				"forca" 				=> $_POST['forca'],
				"destreza" 				=> $_POST['destreza'],
				"constituicao" 			=> $_POST['constituicao'],
				"inteligencia" 			=> $_POST['inteligencia'],
				"sabedoria" 			=> $_POST['sabedoria'],
				"carisma" 				=> $_POST['carisma'],
				//descrição do personagem
				"nome" 					=> $_POST['nome'],
				"jogador" 				=> $_POST['jogador'],
				"raca" 					=> $_POST['raca'],
				"classe" 				=> $_POST['classe'],
				"nivel" 				=> $_POST['nivel'],
				"altura" 				=> $_POST['altura'],
				"peso" 					=> $_POST['peso'],
				"idade" 				=> $_POST['idade'],
				"olhos" 				=> $_POST['olhos'],
				"pele"		 			=> $_POST['pele'],
				"sexo"	 				=> $_POST['sexo'],
				"tendencia" 			=> $_POST['tendencia'],
				"divindade" 			=> $_POST['divindade'],
				"cabelo" 				=> $_POST['cabelo'],
				"lugar" 				=> $_POST['lugar'],
				//iten que carrega
				"item_comums" 			=> $_POST['item_comums'],
				"item_magicos" 			=> $_POST['item_magicos'],
				"arma_nome" 			=> $_POST['arma_nome'],
				"arma_bonus_magico"		=> $_POST['arma_bonus_magico'],
				"arma_dano" 			=> $_POST['arma_dano'],
				"arma_descricao" 		=> $_POST['arma_descricao'],
				"armadura_bonus_na_ca" 	=> $_POST['armadura_bonus_na_ca'],
				"armadura_tipo" 		=> $_POST['armadura_tipo'],
				"armadura_nome"			=> $_POST['armadura_nome'],
				"armadura_descricao" 	=> $_POST['armadura_descricao'],
				"personagem_historia" 	=> $_POST['personagem_historia'],
				"personagem_grimorio" 	=> $_POST['personagem_grimorio']
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg('Personagem criado com sucesso <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
				unset($_POST);
			endif;			
		endif;	
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".userForm").validate({
				rules:{
					forca:{required:true},
					destreza:{required:true},
					constituicao:{required:true},
					inteligencia:{required:true},
					sabedoria:{required:true},
					carisma:{required:true},

					nome:{required:true},
					jogador:{required:true},
					raca:{required:true},
					classe:{required:true},
					nivel:{required:true},
					altura:{required:true},
					peso:{required:true},
					idade:{required:true},
					olhos:{required:true},
					pele:{required:true},
					sexo:{required:true},
					tendencia:{required:true},
					divindade:{required:true},
					cabelo:{required:true},
					logar:{required:true},

					item_comums:{required:true},
					item_magicos:{required:true},
					arma_nome:{required:true},
					arma_bonus_magico:{required:true},
					arma_dano:{required:true},
					arma_descricao:{required:true},
					armadura_bonus_na_ca:{required:true},
					armadura_tipo:{required:true},
					armadura_nome:{required:true},
					armadura_descricao:{required:true},
					personagem_historia:{required:true}
				}
			});
		});
	</script>
    <?php
    $tag->open('div','class="span12"');
	    $tag->open('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
	        $tag->open('fieldset');
				$tag->open('legend');
					 $tag->inprime($pagina_nome);
				$tag->close('legend');
            	$tag->open('div','class="row"');
					$tag->open('div','class="span12"');
						itemTitulo();
					$tag->close('div');
				$tag->close('div');
				
				$tag->open('div','class="row"');
					habilidades_input();
					descricao_part_A($tag);
					descricao_part_B($tag);
					descricao_part_C($tag);
				$tag->close('div');
				
				$tag->open('div','class="row"');
					descricao_arma_earmadura_usada_A($tag);
					descricao_arma_earmadura_usada_B($tag);
					descricao_arma_earmadura_usada_C($tag);
				$tag->close('div');
				
				$tag->open('div','class="row"');
					descricao_arma($tag);
					descricao_armadura($tag);
				$tag->close('div');
				
				$tag->open('div','class="row"');
					descricao_iten_comum($tag);
					descricao_iten_magico($tag);
				$tag->close('div');
				
				$tag->open('div','class="row"');
					descricao_historia($tag);
					descricao_grimorio($tag);
				$tag->close('div');
						
				btCadastrar($modulo);
				
	        $tag->close('fieldset');
	    $tag->close('form');
	$tag->close('div');
	break;	
	
	case 'listar':
		$tag->open('div','align="right"');
			$tag->open('h2','align="left"');
				$tag->open('a','href="?m='.$modulo.'&t=incluir" title="Novo cadastro" class="link_incluir"');
					$tag->open('img','src="img/plus.png" alt="Novo cadastro"');
					$tag->inprime('Nova Página');
				$tag->close('a');
			$tag->close('h2'); 	
		$tag->close('div'); 
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#listausers').dataTable({
				"oLanguage":{
					"sLengthMenu": "Mostrar _MENU_ elementos por página",
					"sZeroRecords": "Nenhum dado encontrado para exibição",
					"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ de registros",
					"sInfoEmpty": "Nenhum registro para ser exibido",
					"sInfoFiltered": "(filtrado de _MAX_ registros no total)",
					"sSearch": "Pesquisar"
				}, 
					"sSrollY": "400px",
					"bPaginatc": false,
					"aaSorting": [[0, "asc"]]
				});
			});
		</script>
        <?php 
		$tag->open('table','cellspacing="0" cellpadding="0" border="0" class="display" id="listausers" ');
			$tag->open('thead');
			 	$tag->open('tr');
                    $labels = array('Personagem','Jogador','Raça','Classe','Ações');
			 		ths($labels);
			 	$tag->close('tr');
				
			$tag->close('thead');			  
		$tag->close('tbody');
			
			$objeto = new $classe();
			$objeto->seleciona_tudo($objeto);
			while($resp = $objeto->retorna_dados()):
				$tag->open('tr');
					tds($resp->nome.' Nivel '.$resp->nivel); 
					tds($resp->jogador);
					tds($resp->raca);
					tds($resp->classe);
					botoesCrud($resp->id, $modulo);
				$tag->close('tr');									
			endwhile;	
       $tag->close('tbody');	
	$tag->close('table');	

	break;	
		
	case 'editar':
		$tag->open('h2');
			echo ($descriacao['edit']);
		$tag->close('h2');	 
		if(isAdmin() == TRUE || $sessao->getVar('id_user') == $_GET['id']):
			if(isset($_GET['id'])):
				$id = $_GET['id'];
				if(isset($_POST['editar'])):
					$objeto = new $classe(array(
						//Atributos fisicos
						"forca" 				=> $_POST['forca'],
						"destreza" 				=> $_POST['destreza'],
						"constituicao" 			=> $_POST['constituicao'],
						"inteligencia" 			=> $_POST['inteligencia'],
						"sabedoria" 			=> $_POST['sabedoria'],
						"carisma" 				=> $_POST['carisma'],
						//descrição do personagem
						"nome" 					=> $_POST['nome'],
						"jogador" 				=> $_POST['jogador'],
						"raca" 					=> $_POST['raca'],
						"classe" 				=> $_POST['classe'],
						"nivel" 				=> $_POST['nivel'],
						"altura" 				=> $_POST['altura'],
						"peso" 					=> $_POST['peso'],
						"idade" 				=> $_POST['idade'],
						"olhos" 				=> $_POST['olhos'],
						"pele"		 			=> $_POST['pele'],
						"sexo"	 				=> $_POST['sexo'],
						"tendencia" 			=> $_POST['tendencia'],
						"divindade" 			=> $_POST['divindade'],
						"cabelo" 				=> $_POST['cabelo'],
						"lugar" 				=> $_POST['lugar'],
						//iten que carrega
						"item_comums" 			=> $_POST['item_comums'],
						"item_magicos" 			=> $_POST['item_magicos'],
						"arma_nome" 			=> $_POST['arma_nome'],
						"arma_bonus_magico"		=> $_POST['arma_bonus_magico'],
						"arma_dano" 			=> $_POST['arma_dano'],
						"arma_descricao" 		=> $_POST['arma_descricao'],
						"armadura_bonus_na_ca" 	=> $_POST['armadura_bonus_na_ca'],
						"armadura_tipo" 		=> $_POST['armadura_tipo'],
						"armadura_nome"			=> $_POST['armadura_nome'],
						"armadura_descricao" 	=> $_POST['armadura_descricao'],
						"personagem_historia" 	=> $_POST['personagem_historia'],
						"personagem_grimorio" 	=> $_POST['personagem_grimorio']
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					$objeto->atualizar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg('Página editada com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir página</a>');
						unset($_POST);
					else:
						printMsg('Nenhum dado foi alterado. <a href="?m='.$modulo.'&t=listar">Exibir página</a>','alerta');	
					endif;
				endif;				
				$objeto_exibir = new $classe();
				$objeto_exibir->extras_select = " WHERE id=$id";
				$objeto_exibir->seleciona_tudo($objeto_exibir);
				$objeto_resp = $objeto_exibir->retorna_dados();
			endif;
		?>
		
		<script type="text/javascript">
		$(document).ready(function(){
			$(".userForm").validate({
				rules:{
					forca:{required:true},
					destreza:{required:true},
					constituicao:{required:true},
					inteligencia:{required:true},
					sabedoria:{required:true},
					carisma:{required:true},

					nome:{required:true},
					jogador:{required:true},
					raca:{required:true},
					classe:{required:true},
					nivel:{required:true},
					altura:{required:true},
					peso:{required:true},
					idade:{required:true},
					olhos:{required:true},
					pele:{required:true},
					sexo:{required:true},
					tendencia:{required:true},
					divindade:{required:true},
					cabelo:{required:true},
					logar:{required:true},

					item_comums:{required:true},
					item_magicos:{required:true},
					arma_nome:{required:true},
					arma_bonus_magico:{required:true},
					arma_dano:{required:true},
					arma_descricao:{required:true},
					armadura_bonus_na_ca:{required:true},
					armadura_tipo:{required:true},
					armadura_nome:{required:true},
					armadura_descricao:{required:true},
					personagem_historia:{required:true}
				}
			});
		});
		</script>
		<?php
		 $tag->open('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
			$tag->open('fieldset');
				$tag->open('legend');
					 $tag->inprime($pagina_nome);
				$tag->close('legend');
				
				$tag->open('div','class="row"');
					$tag->open('div','class="span12"');
						itemTitulo();
					$tag->close('div');
				$tag->close('div');
				
				$tag->open('div','class="row"');
					habilidades_input($objeto_resp);
					descricao_part_A($tag,$objeto_resp);
					descricao_part_B($tag,$objeto_resp);
					descricao_part_C($tag,$objeto_resp);
				$tag->close('div');
				
				$tag->open('div','class="row"');
					descricao_arma_earmadura_usada_A($tag,$objeto_resp);
					descricao_arma_earmadura_usada_B($tag,$objeto_resp);
					descricao_arma_earmadura_usada_C($tag,$objeto_resp);
				$tag->close('div');
				
				$tag->open('div','class="row"');
					descricao_arma($tag,$objeto_resp);
					descricao_armadura($tag,$objeto_resp);
				$tag->close('div');
				
				$tag->open('div','class="row"');
					descricao_iten_comum($tag,$objeto_resp);
					descricao_iten_magico($tag,$objeto_resp);
				$tag->close('div');
				
				$tag->open('div','class="row"');
					descricao_historia($tag,$objeto_resp);
					descricao_grimorio($tag,$objeto_resp);
				$tag->close('div');
				btEditar($modulo);
				
				$tag->close('fieldset');
		$tag->close('form'); 
		else:
			printMsg('Você não tem permissão para acessar esta página. <a href="#" onclik="history.back()">Voltar</a>','erro');
		endif;
	break;	
	
	case 'excluir':
		$tag->open('h2');
			echo ($descriacao['destroy']);
		$tag->close('h2');
		$sessao = new sessao();
		if(isAdmin() == TRUE || $sessao->getVar('id_user') == $_GET['id']):
			if(isset($_GET['id'])):
				$id = $_GET['id'];
				if(isset($_POST['excluir'])):
					$objeto = new $classe(array());
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					
					$objeto->deletar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg('Dados deletados com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir página</a>');
						unset($_POST);
					else:
						printMsg('Nenhum dado foi deletado. <a href="?m='.$modulo.'&t=listar">Exibir página</a>','alerta');	
					endif;
				endif;
				$objeto_exibir = new $classe();
				$objeto_exibir->extras_select = " WHERE id=$id";
				$objeto_exibir->seleciona_tudo($objeto_exibir);
				$objeto_resp = $objeto_exibir->retorna_dados();
			endif;
			
		 $tag->open('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
			$tag->open('fieldset');
				$tag->open('legend');
					 $tag->inprime($pagina_nome);
				$tag->close('legend');
				$tag->open('div','class="row"');
					habilidades_input($objeto_resp,'disabled="disabled"');
					descricao_part_A($tag,$objeto_resp,'disabled="disabled"');
					descricao_part_B($tag,$objeto_resp,'disabled="disabled"');
					descricao_part_C($tag,$objeto_resp,'disabled="disabled"');
				$tag->close('div');
				btExcluir($modulo);
			$tag->close('fieldset');
		$tag->close('form'); 	
        else:
        	printMsg('Você não tem permissão para acessar esta página. <a href="#" onclik="history.back()">Voltar</a>','erro');
        endif;	
	break;	
	
	case 'marcador':
		if(isset($_POST['botao_marcador'])):
			$objeto = new $classe(array(
				//Atributos fisicos
				"marcador" 				=> $_POST['marcador'],
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg('Personagem marcado com sucesso!');
				unset($_POST);
			endif;			
		endif;	
	
	    $tag->open('div','class="span4"');
		    $tag->open('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
		        $tag->open('fieldset');
	            	$tag->open('div','class="row"');
						$tag->open('div','class="span12"');
							itemBotao();
						$tag->close('div');
					$tag->close('div');		
		        $tag->close('fieldset');
		    $tag->close('form');
		$tag->close('div');
	break;	
	
endswitch;

?>