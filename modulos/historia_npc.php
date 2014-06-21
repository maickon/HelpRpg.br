<?php
require_once(dirname(dirname(__FILE__))."/init.php");
protegeArquivo(basename(__FILE__));
$tag = new tags();
$objeto = 'hist_npc';
$classe = 'historias';
$modulo = 'historia_npc';

$inputLabel = array("Nome de personagem[somente história completa]");
$inputName = array('nome');

$textAreaLabel1 = array('Inicio');
$textAreaText1  = array('inicio');

$textAreaLabel2 = array('Meio');
$textAreaText2  = array('meio');

$textAreaLabel3 = array('Fim');
$textAreaText3  = array('fim');

$textAreaLabel4 = array('História Completa');
$textAreaText4  = array('completa');

$pagina_nome = 'História de personagem.';
$descriacao= array('create'=>'Criando uma história de NPC no Help Rpg.',
				   'edit'=>'Editando uma história de NPC no Help Rpg.',
				   'destroy'=>'Apagando uma história de NPC no Help Rpg.');

switch ($tela):
	case 'incluir':
		$tag->open('h2');
			$tag->inprime($descriacao['create']);
		$tag->close('h2');
		if(isset($_POST['cadastrar'])):
			$objeto = new $classe(array(
				"nome" 		=> $_POST['nome'],
				"inicio" 	=> $_POST['inicio'],
				"meio"	 	=> $_POST['meio'],
				"fim"		=> $_POST['fim'],
				"completa"	=> $_POST['completa']
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg('História criada com sucesso <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
				unset($_POST);
			endif;			
		endif;	
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".userForm").validate({
				rules:{
					titulo:{required:true},
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
	            
				input($inputLabel, $inputName);
				
				$tag->open('div','id="accordion"');
					$tag->open('h2');
						$tag->inprime('Inicio');
					$tag->close('h2');
					$tag->open('div','id="caixa"');
						textArea($textAreaLabel1, $textAreaText1);	
					$tag->close('div');
					
					$tag->open('h2');
						$tag->inprime('Meio');
					$tag->close('h2');
						$tag->open('div','id="caixa"');
						textArea($textAreaLabel2, $textAreaText2);
					$tag->close('div');
					
					$tag->open('h2');
						$tag->inprime('Fim');
					$tag->close('h2');
					$tag->open('div','id="caixa"');
						textArea($textAreaLabel3, $textAreaText3);
					$tag->close('div');
					
					$tag->open('h2');
						$tag->inprime('História Completa');
					$tag->close('h2');
						$tag->open('div','id="caixa"');
						textArea($textAreaLabel4, $textAreaText4);
					$tag->close('div');
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
					$tag->inprime('Nova História');
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
                    $labels = array('Nome','Início','Meio','Fim','Completa','Ações');
			 		ths($labels);
			 	$tag->close('tr');
				
			$tag->close('thead');			  
		$tag->close('tbody');
			
			$objeto = new $classe();
			$objeto->seleciona_tudo($objeto);
			while($resp = $objeto->retorna_dados()):
				$tag->open('tr');
					tds($resp->nome);
					tds(limitar($resp->inicio,200));
					tds(limitar($resp->meio,200));
					tds(limitar($resp->fim,200));
					tds(limitar($resp->completa, 200));
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
						"nome" 		=> $_POST['nome'],
						"inicio" 	=> $_POST['inicio'],
						"meio"	 	=> $_POST['meio'],
						"fim"		=> $_POST['fim'],
						"completa"	=> $_POST['completa']
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					$objeto->atualizar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg('História editada com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir História</a>');
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
					titulo:{required:true},	
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
				
				$inputValuesEdit = array(limpar_campo_excluir('nome',$objeto_resp));
				input($inputLabel, $inputName, $inputValuesEdit);
				
				$tag->open('div','id="accordion"');
					$tag->open('h2');
						$tag->inprime('Inicio');
					$tag->close('h2');
					$tag->open('div','id="caixa"');
						textArea($textAreaLabel1, $textAreaText1, $objeto_resp);	
					$tag->close('div');
					
					$tag->open('h2');
						$tag->inprime('Meio');
					$tag->close('h2');
						$tag->open('div','id="caixa"');
						textArea($textAreaLabel2, $textAreaText2, $objeto_resp);
					$tag->close('div');
					
					$tag->open('h2');
						$tag->inprime('Fim');
					$tag->close('h2');
					$tag->open('div','id="caixa"');
						textArea($textAreaLabel3, $textAreaText3, $objeto_resp);
					$tag->close('div');
					
					$tag->open('h2');
						$tag->inprime('História Completa');
					$tag->close('h2');
						$tag->open('div','id="caixa"');
						textArea($textAreaLabel4, $textAreaText4, $objeto_resp);
					$tag->close('div');
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
				input($inputLabel, $inputName, $inputValuesEdit,'disabled');
				
				$tag->open('div','id="accordion"');
					$tag->open('h2');
						$tag->inprime('Inicio');
					$tag->close('h2');
					$tag->open('div','id="caixa"');
						textArea($textAreaLabel1, $textAreaText1, $objeto_resp,'disabled');	
					$tag->close('div');
					
					$tag->open('h2');
						$tag->inprime('Meio');
					$tag->close('h2');
						$tag->open('div','id="caixa"');
						textArea($textAreaLabel2, $textAreaText2, $objeto_resp,'disabled');
					$tag->close('div');
					
					$tag->open('h2');
						$tag->inprime('Fim');
					$tag->close('h2');
					$tag->open('div','id="caixa"');
						textArea($textAreaLabel3, $textAreaText3, $objeto_resp,'disabled');
					$tag->close('div');
					
					$tag->open('h2');
						$tag->inprime('História Completa');
					$tag->close('h2');
						$tag->open('div','id="caixa"');
						textArea($textAreaLabel4, $textAreaText4, $objeto_resp,'disabled');
					$tag->close('div');
				$tag->close('div');
				
				$tag->open('div','class="span12"');
	
				
				btExcluir($modulo);
			$tag->close('fieldset');
		$tag->close('form'); 	
        else:
        	printMsg('Você não tem permissão para acessar esta página. <a href="#" onclik="history.back()">Voltar</a>','erro');
        endif;	
	break;	
endswitch;

?>