<?php
require_once 'classes/tags.class.php';
inicializa();
function inicializa(){
	$init = 1;
	$tag = new tags();
	if(file_exists(dirname(__FILE__).'/config.php') && file_exists(dirname(__FILE__).'/constantes.php')):
		require_once(dirname(__FILE__).'/config.php');
		require_once(dirname(__FILE__).'/constantes.php');
	else:
		$init = 0;
		$tag->open('div','class="alert-box alert"');
			die($tag->inprime('O Arquivode configuração não foi inicializado, contate o adminstrador.','decode'));
		$tag->close('div');
	endif;

	if(!defined('BASEPATH') || !defined('BASEURL')):
		$init = 0;
		$tag->open('div','class="alert-box alert"');
			die($tag->inprime('Faltam configurações básicas do sistema, contate o adminstrador.','decode'));
		$tag->close('div');
	endif;

	if($init == 1):
		$classes = array(
					'base.class',
					'banco.class',
					'sessao.class',
					'usuario.class',
					'usuarioAdmin.class',
					'tags.class',
					'home_page.class',
					'sobre_page.class',
					'hist_page.class',
					'blog_page.class',
					'comentario_blog.class',
					'msg_anuncio.class',
					'parceiros.class',
					'armaduras.class',
					'armas.class',
					'artefatos.class',
					'aventuras.class',
					'escudos.class',
					'historias.class',
					'msg_anuncio.class',
					'personagem.class',
					'usuarioAventureiro.class',
					'personagem_db.class'
				);
		_autoload($classes,CLASSESPATH);
		
		$Iclasses = array(
				'habilidades.class'
		);
		_autoload($Iclasses,ICLASSESPATH);
		
		$interfaces = array(
				'habilidades',
				'Nivel'
		);
		_autoload($interfaces,INTERFACEPATH);
		
		$funcoes = array(
				'arquivos',
				'inprimir',
				'loadModulos',
				'formularios',
				'loadPages',
				'menus',
				'seguranca',
				'rotas',
				'tratar_erros',
				'sliders',
				'blog',
				'tempo',
				'string',
				'loadItensPages',
				'ficha',
				'artefatos',
				'armaduras',
				'historias',
				'aventuras',
				'armas',
				'escudos',
				'personagem',
				'email',
				'personagem_montado',
				'personagem_db'
			);
		_autoload($funcoes,FUNCOESPATH);
	endif;

	if(isset($_GET['logoff']) == TRUE):
		$user = new usuarioAdmin();
		$user->logoff();
		exit;
	endif;
}

function load_class($className){	
	$pasta = opendir(CLASSESPATH);
	$classes = array();
	$i=0;
	while($p = readdir($pasta)):
		if($p != '.' and $p != '..'):
			$classes[$i] = $p;
			$i++;
		endif;
	endwhile;
	$arqClasse = $classes;
	for($i=0;$i<count($arqClasse);$i++):
		if($arqClasse[$i] == $className):
			//echo CLASSESPATH.$arqClasse[$i].'<br/>';
			require_once CLASSESPATH.$arqClasse[$i];
		else:
		endif;
	endfor;
}

function load_Iclass($interfaceClassName){	
	$pasta = opendir(ICLASSESPATH);
	$iclasses = array();
	$i=0;
	while($p = readdir($pasta)):
		if($p != '.' and $p != '..'):
			$iclasses[$i] = $p;
			$i++;
		endif;
	endwhile;
	$arqIClasse = $iclasses;
	for($i=0;$i<count($arqIClasse);$i++):
		if($arqIClasse[$i] == $interfaceClassName):
			//echo CLASSESPATH.$arqClasse[$i].'<br/>';
			require_once ICLASSESPATH.$arqIClasse[$i];
		else:
		endif;
	endfor;
}


function _autoload(array $list_file, $dir=''){
	$tag = new tags();
	if(!empty($dir)): 
		$dir_ = $dir;
	else:
		$tag->open('div','class="alert-box alert"');
			die($tag->inprime('Deretório de classe não definido no arquivo de configuração, contate o adminstrador.','decode'));
		$tag->close('div');
	endif;
	for($c=0; $c<count($list_file); $c++):
		if(file_exists(BASEPATH.$dir_.$list_file[$c].'.php')):
			require_once(dirname(__FILE__).'/'.$dir_.$list_file[$c].'.php');
		else:
			$tag->open('div','class="alert-box alert"');
				die($tag->inprime('Diretório '.$list_file[$c].' inválido, contate o adminstrador.'));
			$tag->close('div');
		endif;
	endfor;
}

function limpar_campo_excluir($propriedade,$objeto){
	if($objeto):
		$campo=$objeto->$propriedade;
		return $campo;
	else:
		$campo='';
		return $campo;
	endif;
}

function protegeArquivo($nome_arquivo, $redir_para='index.php?p=adm&erro=3'){
	$url = $_SERVER["PHP_SELF"];
	if(preg_match("/$nome_arquivo/i", $url)):
	//redireciona para outra URL
	redireciona($redir_para);
	endif;
}//fim protegeArquivo
?>
