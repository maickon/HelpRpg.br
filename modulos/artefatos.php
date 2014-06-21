<?php
require_once(dirname(dirname(__FILE__))."/init.php");
protegeArquivo(basename(__FILE__));
$tag = new tags();
$objeto = 'artefatos';
$classe = 'artefatos';
$modulo = 'artefatos';

$inputLabel = array('Nome');
$inputName = array('nome');

$selectLabels1 = array('Este artefato é público ou privado?');
$selectNames1 = array('dominio');
$selectOptions1 = array('Publico','Privado');

$textAreaLabel = array('Descrição histórica');
$textAreaText = array('descricao_hist');

$textAreaLabel2 = array('Descrição em regras');
$textAreaText2 = array('descricao_regra');


$pagina_nome = 'Artefatos.';
$descriacao= array('create'=>'Criando um novo artefato no Help Rpg.',
				   'edit'=>'Editando um artefato no Help Rpg.',
				   'destroy'=>'Apagando um artefato no Help Rpg.');

switch ($tela):
	case 'incluir':
		$tag->open('h2');
			$tag->inprime($descriacao['create']);
		$tag->close('h2');
		if(isset($_POST['cadastrar'])):
			$objeto = new $classe(array(
				"nome" 				=> $_POST['nome'],
				"dominio"	 		=> $_POST['dominio'],
				"descricao_hist"	=> $_POST['descricao_hist'],
				"descricao_regra" 	=> $_POST['descricao_regra']
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg('Artefato criado com sucesso <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
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
					descricao_hist:{required:true},
					descricao_regra:{required:true}
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

				$tag->open('div','class="span12"');
				input($inputLabel, $inputName);
				select($selectLabels1, $selectNames1, $selectOptions1);
				$tag->close('div');
				
				$tag->open('div','class="span6"');
					textArea($textAreaLabel, $textAreaText);
				$tag->close('div');
				
				$tag->open('div','class="span6"');
					textArea($textAreaLabel2, $textAreaText2);
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
					$tag->inprime('Novo Artefato');
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
                    $labels = array('Nome','Domínio','Sua história','Regras','Ações');
			 		ths($labels);
			 	$tag->close('tr');
				
			$tag->close('thead');			  
		$tag->close('tbody');
			
			$objeto = new $classe();
			$objeto->seleciona_tudo($objeto);
			while($resp = $objeto->retorna_dados()):
				$tag->open('tr');
					tds($resp->nome); 
					tds($resp->dominio);
					tds($resp->descricao_hist);
					tds($resp->descricao_regra);
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
						"nome" 				=> $_POST['nome'],
						"dominio"	 		=> $_POST['dominio'],
						"descricao_hist"	=> $_POST['descricao_hist'],
						"descricao_regra" 	=> $_POST['descricao_regra']
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					$objeto->atualizar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg('Artefato editado com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir página</a>');
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
					descricao_hist:{required:true},
					descricao_regra:{required:true}
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
				
				$inputValuesEdit = array($objeto_resp->nome);
				
				$tag->open('div','class="span12"');
					select($selectLabels1, $selectNames1, $selectOptions1,true,$objeto_resp);
					input($inputLabel, $inputName,$inputValuesEdit);
				$tag->close('div');
				
				$tag->open('div','class="span6"');
					textArea($textAreaLabel, $textAreaText,$objeto_resp);
				$tag->close('div');
				
				$tag->open('div','class="span6"');
					textArea($textAreaLabel2, $textAreaText2,$objeto_resp);
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
				
				$inputValuesEdit = array(limpar_campo_excluir('nome',$objeto_resp));
				
				$tag->open('div','class="span12"');
					select($selectLabels1, $selectNames1, $selectOptions1,true,$objeto_resp,'disabled');
					input($inputLabel, $inputName,$inputValuesEdit,'disabled');
				$tag->close('div');
				
				$tag->open('div','class="span6"');
					textArea($textAreaLabel,$textAreaText,$objeto_resp,'disabled');
				$tag->close('div');
				
				$tag->open('div','class="span6"');
					textArea($textAreaLabel2, $textAreaText2,$objeto_resp,'disabled');
				$tag->close('div');
				
				$tag->open('div','class="span6"');
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