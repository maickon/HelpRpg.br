<?php
require_once(dirname(dirname(__FILE__))."/init.php");
protegeArquivo(basename(__FILE__));
$tag = new tags();
$objeto = 'aventuras';
$classe = 'aventuras';
$modulo = 'aventuras';

$inputLabel = array('T�tulo');
$inputName = array('titulo');

$textAreaLabel = array('Id�ia da aventura');
$textAreaText = array('texto');


$pagina_nome = 'Aventuras.';
$descriacao= array('create'=>'Cria��o de uma nova id�ia de aventura no Help Rpg.',
				   'edit'=>'Editando uma aventura no Help Rpg.',
				   'destroy'=>'Apagando uma aventura no Help Rpg.');

switch ($tela):
	case 'incluir':
		$tag->open('h2');
			$tag->inprime($descriacao['create']);
		$tag->close('h2');
		if(isset($_POST['cadastrar'])):
			$objeto = new $classe(array(
				"titulo" => $_POST['titulo'],
				"texto"	 => $_POST['texto']
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg('Aventura criada com sucesso <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
				unset($_POST);
			endif;			
		endif;	
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".userForm").validate({
				rules:{
					titulo:{required:true},
					texto:{required:true}
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
				textArea($textAreaLabel, $textAreaText);		
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
					$tag->inprime('Nova Aventura');
				$tag->close('a');
			$tag->close('h2'); 	
		$tag->close('div'); 
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#listausers').dataTable({
				"oLanguage":{
					"sLengthMenu": "Mostrar _MENU_ elementos por p�gina",
					"sZeroRecords": "Nenhum dado encontrado para exibi��o",
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
                    $labels = array('T�tulo','Hist�ris','A��es');
			 		ths($labels);
			 	$tag->close('tr');
				
			$tag->close('thead');			  
		$tag->close('tbody');
			
			$objeto = new $classe();
			$objeto->seleciona_tudo($objeto);
			while($resp = $objeto->retorna_dados()):
				$tag->open('tr');
					tds($resp->titulo); 
					tds($resp->texto);
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
						"titulo" => $_POST['titulo'],
						"texto" => $_POST['texto']
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					$objeto->atualizar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg('Aventura editada com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir hist�ria de aventura</a>');
						unset($_POST);
					else:
						printMsg('Nenhum dado foi alterado. <a href="?m='.$modulo.'&t=listar">Exibir hist�ria de aventura</a>','alerta');	
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
					texto:{required:true}
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
				
				$inputValuesEdit = array($objeto_resp->titulo);
				input($inputLabel, $inputName,$inputValuesEdit);
				textArea($textAreaLabel, $textAreaText,$objeto_resp);
				btEditar($modulo);
				
				$tag->close('fieldset');
		$tag->close('form'); 
		else:
			printMsg('Voc� n�o tem permiss�o para acessar esta p�gina. <a href="#" onclik="history.back()">Voltar</a>','erro');
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
						printMsg('Dados deletados com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir p�gina</a>');
						unset($_POST);
					else:
						printMsg('Nenhum dado foi deletado. <a href="?m='.$modulo.'&t=listar">Exibir p�gina</a>','alerta');	
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
				
				$inputValuesEdit = array(limpar_campo_excluir('titulo',$objeto_resp));
				input($inputLabel, $inputName,$inputValuesEdit,'disabled');
				textArea($textAreaLabel, $textAreaText,$objeto_resp,'disabled');
				btExcluir($modulo);
			$tag->close('fieldset');
		$tag->close('form'); 	
        else:
        	printMsg('Voc� n�o tem permiss�o para acessar esta p�gina. <a href="#" onclik="history.back()">Voltar</a>','erro');
        endif;	
	break;	
endswitch;

?>