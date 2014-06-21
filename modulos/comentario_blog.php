<?php
require_once(dirname(dirname(__FILE__))."/init.php");
protegeArquivo(basename(__FILE__));
$tag = new tags();
$objeto = 'comentario_blog';
$classe = 'comentario_blog';
$modulo = 'comentario_blog';


$inputLabels = array('Titulo','Categoria');
$inputNames  = array('titulo','categoria');

$textAreaLabel = array('Comentário');
$textAreaText = array('texto');


$pagina_nome = 'Configuração de Comentários Page.';
$descriacao= array('create'=>'Criação da página de Comentários do Help Rpg.',
				   'edit'=>'Editando a página de Comentários do Help Rpg.',
				   'destroy'=>'Apagando a página de Comentários do Help Rpg.');

switch ($tela):
	case 'incluir':
		$tag->open('h2');
			$tag->inprime($descriacao['create']);
		$tag->close('h2');
		if(isset($_POST['cadastrar'])):
			$sessao = new Sessao();
			$objeto = new $classe(array(
				"blog_id" 			=> $_GET['id'],
				"usuario" 			=> $sessao->getVar('nome_user'),
				"texto" 			=> $_POST['texto']
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
					texto:{required:true},
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
	            
				textArea($textAreaLabel, $textAreaText);		
				btCadastrar($modulo);
				
	        $tag->close('fieldset');
	    $tag->close('form');
	$tag->close('div');
	break;	
	
	case 'postar':
		if(isset($_POST['cadastrar'])):
			$sessao = new Sessao();
			$objeto = new $classe(array(
					"blog_id" 			=> $_GET['id'],
					"usuario" 			=> $sessao->getVar('nome_user'),
					"texto" 			=> $_POST['texto']
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg('Comentário feito com sucesso!');
				//redir_para('index.php?p=post&id='.$_GET['id'].'');
				unset($_POST);
			endif;
		endif;
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".userForm").validate({
					rules:{
						texto:{required:true},
					}
				});
			});
		</script>
	    <?php
	    $tag->open('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');     
	            $objeto = new $classe();
				$tag->open('label');
					echo ('Comentário:');
				$tag->close('label');
				$tag->open('textarea',' name="texto" class="TextAreaComent"');
				$tag->close('textarea');
				
				$tag->open('input','type="button" onclick="location.href=\'?p=post&id='.$_GET['id'].'\'" value="Visualizar meu post" class="btn "'); 
				echo ' ';     
				$tag->open('input','type="submit" name="cadastrar" value="Comentar" class="btn"');     
				                   
	    $tag->close('form');
	    
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
                    $labels = array('Título','Post ID','Data','Usuário','Comentário','Ações');
			 		ths($labels);
			 	$tag->close('tr');
				
			$tag->close('thead');			  
		$tag->close('tbody');
			
			$objeto = new $classe();
			$objeto->seleciona_tudo($objeto);
			while($resp = $objeto->retorna_dados()):
				$blog = blog_status($resp);
				$tag->open('tr');
					tds($blog->titulo);
					tds($resp->blog_id); 
					tds(date("d/m/Y",strtotime($resp->data)));
					tds($resp->usuario);
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
					$sessao = new Sessao();
					$objeto = new $classe(array(
						"texto" 			=> $_POST['texto']
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
					img:{required:true}
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
				$blog = blog_status($objeto_resp);
				$inputValuesEdit = array($blog->titulo,$blog->categoria);
				input($inputLabels, $inputNames,$inputValuesEdit);
				textArea($textAreaLabel, $textAreaText,$objeto_resp);
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
				
				$blog = blog_status($objeto_resp);
				$inputValuesEdit = array(limpar_campo_excluir('titulo',$blog),
										 limpar_campo_excluir('categoria',$blog));
				input($inputLabels, $inputNames,$inputValuesEdit,'disabled');
				textArea($textAreaLabel, $textAreaText,$objeto_resp,'disabled');
				btExcluir($modulo);
			$tag->close('fieldset');
		$tag->close('form'); 	
        else:
        	printMsg('Você não tem permissão para acessar esta página. <a href="#" onclik="history.back()">Voltar</a>','erro');
        endif;	
	break;	
endswitch;

?>