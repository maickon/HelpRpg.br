<?php
require_once(dirname(dirname(__FILE__))."/init.php");
protegeArquivo(basename(__FILE__));
$tag = new tags();
$objeto = 'armaduras';
$classe = 'armaduras';
$modulo = 'armaduras';

$inputLabel = array('Nome',
					'Preço',
					'Bônus na CA',
					'Destreza Máxima',
					'Penalidade em pericia',
					'Falha de Magia Arcana');

$inputLabel2 = array('Deslocamento Médio',
					'Deslocamento Pequeno',
					'Peso');

$inputName = array('nome',
				   'preco',
				   'bonusNaCa',
				   'destrezaMaxima',
				   'penalidadeNaPericia',
				   'falhaDeMagiaArcana');

$inputName2 = array('deslocamentoMedio',
				   'deslocamentoPequeno',
				   'peso');

$selectLabels1 = array('Este escudo é público ou privado?');
$selectNames1 = array('dominio');
$selectOptions1 = array('Publico','Privado');

$selectLabels2 = array('Categoria');
$selectNames2 = array('categoria');
$selectOptions2 = array('Armaduras Leves','Armaduras Médias','Armaduras Pesadas');

$selectLabels3 = array('Tipo');
$selectNames3 = array('tipo');
$selectOptions3 = array('Armadura simples','Armadura Mágica');

$selectLabels4 = array('Nivel da armadura');
$selectNames4 = array('lv');
$selectOptions4 = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21 ou >');

$textAreaLabel = array('Descrição');
$textAreaText = array('descricao');


$pagina_nome = 'Cadastrando armaduras no sistema.';
$descriacao= array('create'=>'Cadastrando uma armadura no sistema do Help Rpg.',
				   'edit'=>'Editando uma armadura no sistema do Help Rpg',
				   'destroy'=>'Apagando uma armadura no sistema do Help Rpg');

switch ($tela):
	case 'incluir':
		$tag->open('h2');
			$tag->inprime($descriacao['create']);
		$tag->close('h2');
		if(isset($_POST['cadastrar'])):
			$objeto = new $classe(array(
				"nome"					=> $_POST['nome'],
				"dominio"				=> $_POST['dominio'],
				"categoria" 			=> $_POST['categoria'],
				"tipo"	 				=> $_POST['tipo'],
				"custo" 				=> $_POST['preco'],
				"bonusNaCa" 			=> $_POST['bonusNaCa'],
				"destrezaMaxima" 		=> $_POST['destrezaMaxima'],
				"penalidadeNaPericia"	=> $_POST['penalidadeNaPericia'],
				"falhaDeMagiaArcana" 	=> $_POST['falhaDeMagiaArcana'],
				"deslocamentoMedio" 	=> $_POST['deslocamentoMedio'],
				"deslocamentoPequeno" 	=> $_POST['deslocamentoPequeno'],
				"peso" 					=> $_POST['peso'],
				"descricao" 			=> $_POST['descricao'],
				"lv" 					=> $_POST['lv']
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg('Página criada com sucesso <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
				unset($_POST);
			endif;			
		endif;	
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".userForm").validate({
				rules:{
					nome:{required:true},
					dominio:{required:true},
					dano:{required:true},
					preco:{required:true},
					categoria:{required:true},
					bonusNaCa:{required:true},
					destrezaMaxima:{required:true},
					penalidadeNaPericia:{required:true},
					descricao:{required:true},
					categoria:{required:true},
					deslocamentoMedio:{required:true},
					peso:{required:true},
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
	            
				$tag->open('div','class="span3"');
					select($selectLabels1, $selectNames1, $selectOptions1);
					select($selectLabels2, $selectNames2, $selectOptions2);
					select($selectLabels3, $selectNames3, $selectOptions3);
					select($selectLabels4, $selectNames4, $selectOptions4);
					input($inputLabel2, $inputName2);
				$tag->close('div');	
				
				$tag->open('div','class="span3"');
					input($inputLabel, $inputName);
				$tag->close('div');
				
				$tag->open('div','class="span6"');
					textArea($textAreaLabel, $textAreaText);	
				$tag->close('div');
				
				$tag->open('div','class="span12"');
					btCadastrar($modulo);
				$tag->close('div');
				
	        $tag->close('fieldset');
	    $tag->close('form');
	$tag->close('div');
	break;	
	
	case 'listar':
		$tag->open('div','align="right"');
			$tag->open('h2','align="left"');
				$tag->open('a','href="?m='.$modulo.'&t=incluir" title="Novo cadastro" class="link_incluir"');
					$tag->open('img','src="img/plus.png" alt="Novo cadastro"');
					$tag->inprime('Nova Armadura');
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
                    $labels = array('Nome','Domínio','Categoria','Tipo','Preço','Bônus na CA','Pen. Pericia','Falh.Mag. Arcana','Descl. Médio','Desl. Pequeno','Peso','Descrição','Ações');
			 		ths($labels);
			 	$tag->close('tr');
				
			$tag->close('thead');			  
		$tag->close('tbody');
			
			$objeto = new $classe();
			$objeto->seleciona_tudo($objeto);
			while($resp = $objeto->retorna_dados()):
				$tag->open('tr');
					tds($resp->nome.',Lv '.$resp->lv);
					tds($resp->dominio);
					tds($resp->categoria);
					tds($resp->tipo);
					tds($resp->custo);
					tds($resp->bonusNaCa);
					tds($resp->penalidadeNaPericia);
					tds($resp->falhaDeMagiaArcana);
					tds($resp->deslocamentoMedio);
					tds($resp->deslocamentoPequeno);
					tds($resp->peso);
					tds($resp->descricao);
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
						"nome"					=> $_POST['nome'],
						"dominio"				=> $_POST['dominio'],
						"categoria" 			=> $_POST['categoria'],
						"tipo"	 				=> $_POST['tipo'],
						"custo" 				=> $_POST['preco'],
						"bonusNaCa" 			=> $_POST['bonusNaCa'],
						"destrezaMaxima" 		=> $_POST['destrezaMaxima'],
						"penalidadeNaPericia"	=> $_POST['penalidadeNaPericia'],
						"falhaDeMagiaArcana" 	=> $_POST['falhaDeMagiaArcana'],
						"deslocamentoMedio" 	=> $_POST['deslocamentoMedio'],
						"deslocamentoPequeno" 	=> $_POST['deslocamentoPequeno'],
						"peso" 					=> $_POST['peso'],
						"descricao" 			=> $_POST['descricao'],
						"lv" 					=> $_POST['lv']
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					$objeto->atualizar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg('Armadura editada com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir Armaduras</a>');
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
					nome:{required:true},
					dominio:{required:true},
					dano:{required:true},
					preco:{required:true},
					categoria:{required:true},
					bonusNaCa:{required:true},
					destrezaMaxima:{required:true},
					penalidadeNaPericia:{required:true},
					descricao:{required:true},
					categoria:{required:true},
					deslocamentoMedio:{required:true},
					peso:{required:true}
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
				
				$inputValuesEdit = array($objeto_resp->nome,
										 $objeto_resp->custo,
										 $objeto_resp->bonusNaCa,
										 $objeto_resp->destrezaMaxima,
										 $objeto_resp->penalidadeNaPericia,
										 $objeto_resp->falhaDeMagiaArcana
						);
				$inputValuesEdit2 = array(
										$objeto_resp->deslocamentoMedio,
										$objeto_resp->deslocamentoPequeno,
										$objeto_resp->peso
						);

				$tag->open('div','class="span12"');
					
				$tag->close('div');
				
				$tag->open('div','class="span3"');
					select($selectLabels1, $selectNames1, $selectOptions1,true,$objeto_resp);
					select($selectLabels2, $selectNames2, $selectOptions2,true,$objeto_resp);
					select($selectLabels3, $selectNames3, $selectOptions3,true,$objeto_resp);
					select($selectLabels4, $selectNames4, $selectOptions4,true,$objeto_resp);
					input($inputLabel2, $inputName2,$inputValuesEdit2);
				$tag->close('div');
				
				$tag->open('div','class="span3"');
					input($inputLabel, $inputName,$inputValuesEdit);
				$tag->close('div');
				
				$tag->open('div','class="span6"');
					textArea($textAreaLabel, $textAreaText,$objeto_resp);
				$tag->close('div');
				
				$tag->open('div','class="span12"');
					btEditar($modulo);
				$tag->close('div');
				
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
			
				$inputValuesEdit = array(
						limpar_campo_excluir('nome',$objeto_resp),
						limpar_campo_excluir('custo',$objeto_resp),
						limpar_campo_excluir('bonusNaCa',$objeto_resp),
						limpar_campo_excluir('destrezaMaxima',$objeto_resp),
						limpar_campo_excluir('penalidadeNaPericia',$objeto_resp),
						limpar_campo_excluir('falhaDeMagiaArcana',$objeto_resp)
						);

				$inputValuesEdit2 = array(
						limpar_campo_excluir('deslocamentoMedio',$objeto_resp),
						limpar_campo_excluir('deslocamentoPequeno',$objeto_resp),
						limpar_campo_excluir('peso',$objeto_resp)
						);
				
				$tag->open('div','class="span3"');
					select($selectLabels1, $selectNames1, $selectOptions1,true,$objeto_resp,'disabled');
					select($selectLabels2, $selectNames2, $selectOptions2,true,$objeto_resp,'disabled');
					select($selectLabels3, $selectNames3, $selectOptions3,true,$objeto_resp,'disabled');
					select($selectLabels4, $selectNames4, $selectOptions4,true,$objeto_resp,'disabled');
					input($inputLabel2, $inputName2,$inputValuesEdit2,'disabled');
				$tag->close('div');
				
				$tag->open('div','class="span3"');
					input($inputLabel, $inputName,$inputValuesEdit,'disabled');
				$tag->close('div');
					
				$tag->open('div','class="span6"');
					textArea($textAreaLabel, $textAreaText,$objeto_resp,'disabled');
				$tag->close('div');
				
				$tag->open('div','class="span12"');
					btExcluir($modulo);
				$tag->close('div');
			$tag->close('fieldset');
		$tag->close('form'); 	
        else:
        	printMsg('Você não tem permissão para acessar esta página. <a href="#" onclik="history.back()">Voltar</a>','erro');
        endif;	
	break;	
endswitch;

?>