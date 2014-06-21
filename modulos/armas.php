<?php
require_once(dirname(dirname(__FILE__))."/init.php");
protegeArquivo(basename(__FILE__));
$tag = new tags();
$objeto = 'armas';
$classe = 'armas';
$modulo = 'armas';

$inputLabel = array('Nome',
					'Dano',
					'Preço',
					'Decisivo',
					'Distância',
					'Peso');
$inputName = array('nome',
				   'dano',
				   'preco',
				   'decisivo',
				   'distancia',
				   'peso');

$selectLabels1 = array('Esta arma é pública ou privada?');
$selectNames1 = array('dominio');
$selectOptions1 = array('Publico','Privado');

$selectLabels2 = array('Categoria');
$selectNames2 = array('categoria');
$selectOptions2 = array('Armas Simples','Armas Comuns','Armas Exóticas','Armas Mágicas');

$selectLabels3 = array('Tipo');
$selectNames3 = array('tipo');
$selectOptions3 = array('Armas Leves - Corpo a Corpo','Armas de Uma Mão - Corpo a Corpo','Armas de Duas Mãos - Corpo a Corpo','Armas de Ataque à Distância');

$selectLabels4 = array('Nivel da arma');
$selectNames4 = array('lv');
$selectOptions4 = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21 ou >');

$textAreaLabel = array('Descrição');
$textAreaText = array('descricao');


$pagina_nome = 'Cadastrando armas no sistema.';
$descriacao= array('create'=>'Cadastrando uma arma no sistema do Help Rpg.',
				   'edit'=>'Editando uma arma no sistema do Help Rpg',
				   'destroy'=>'Apagando uma arma no sistema do Help Rpg');

switch ($tela):
	case 'incluir':
		$tag->open('h2');
			$tag->inprime($descriacao['create']);
		$tag->close('h2');
		if(isset($_POST['cadastrar'])):
			$objeto = new $classe(array(
				"nome"			=> $_POST['nome'],
				"dominio"		=> $_POST['dominio'],
				"dano" 			=> $_POST['dano'],
				"preco" 		=> $_POST['preco'],
				"decisivo" 		=> $_POST['decisivo'],
				"distancia" 	=> $_POST['distancia'],
				"peso" 			=> $_POST['peso'],
				"tipo" 			=> $_POST['tipo'],
				"descricao" 	=> $_POST['descricao'],
				"categoria" 	=> $_POST['categoria'],
				"lv" 			=> $_POST['lv']
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
					decisivo:{required:true},
					distancia:{required:true},
					peso:{required:true},
					tipo:{required:true},
					descricao:{required:true},
					categoria:{required:true},
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
					$tag->inprime('Nova Arma');
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
                    $labels = array('Nome','Domínio','Dano','Preço','Decisivo','Distância','Peso','Tipo','Descrição','Categoria','Ações');
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
					tds($resp->dano);
					tds($resp->preco);
					tds($resp->decisivo);
					tds($resp->distancia);
					tds($resp->peso);
					tds($resp->tipo);
					tds($resp->descricao);
					tds($resp->categoria);
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
						"nome"			=> $_POST['nome'],
						"dominio"		=> $_POST['dominio'],
						"dano" 			=> $_POST['dano'],
						"preco" 		=> $_POST['preco'],
						"decisivo" 		=> $_POST['decisivo'],
						"distancia" 	=> $_POST['distancia'],
						"peso" 			=> $_POST['peso'],
						"tipo" 			=> $_POST['tipo'],
						"descricao" 	=> $_POST['descricao'],
						"categoria" 	=> $_POST['categoria'],
						"lv" 			=> $_POST['lv']
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
					nome:{required:true},
					dominio:{required:true},
					dano:{required:true},
					preco:{required:true},
					decisivo:{required:true},
					distancia:{required:true},
					peso:{required:true},
					tipo:{required:true},
					descricao:{required:true},
					categoria:{required:true},
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
										 $objeto_resp->dano,
										 $objeto_resp->preco,
										 $objeto_resp->decisivo,
										 $objeto_resp->distancia,
										 $objeto_resp->peso,
										 $objeto_resp->tipo,
						);
				$tag->open('div','class="span12"');
					
				$tag->close('div');
				
				$tag->open('div','class="span3"');
					select($selectLabels1, $selectNames1, $selectOptions1,true,$objeto_resp);
					select($selectLabels2, $selectNames2, $selectOptions2,true,$objeto_resp);
					select($selectLabels3, $selectNames3, $selectOptions3,true,$objeto_resp);
					select($selectLabels4, $selectNames4, $selectOptions4,true,$objeto_resp);
					
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
						limpar_campo_excluir('dano',$objeto_resp),
						limpar_campo_excluir('preco',$objeto_resp),
						limpar_campo_excluir('decisivo',$objeto_resp),
						limpar_campo_excluir('distancia',$objeto_resp),
						limpar_campo_excluir('peso',$objeto_resp),
						limpar_campo_excluir('tipo',$objeto_resp),	
						);
				
				$tag->open('div','class="span3"');
					select($selectLabels1, $selectNames1, $selectOptions1,true,$objeto_resp,'disabled');
					select($selectLabels2, $selectNames2, $selectOptions2,true,$objeto_resp,'disabled');
					select($selectLabels3, $selectNames3, $selectOptions3,true,$objeto_resp,'disabled');
					select($selectLabels4, $selectNames4, $selectOptions4,true,$objeto_resp,'disabled');
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