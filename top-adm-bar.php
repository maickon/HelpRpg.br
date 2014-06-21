<?php
	require_once 'init.php';
	inicializa();
	$sessao = new sessao();
	$meu_id = $sessao->getVar('id_user');
	$tag = new tags();
	menu_bar('Painel Administrativo',
		 array(
		 	array('Usuários','Cadastrar','Exibir','Usuario aventureiro'),
		 	array('Personagens','Cadastrar','Exibir'),
			array('Páginas','Home Page','Sobre','Histórias','Blog','Comentários blog','Anuncios','Parceiros'),
			array('Armas','Nova Arma','Exibir Armas'),
			array('Armaduras','Nova Armadura','Exibir Armaduras'),
			array('Escudos','Novo Escudo','Exibir Escudos'),
			array('Artefatos','Novo Artefato','Exibir Artefatos'),
			array('Histórias','Nova História','Exibir Histórias'),
			array('Aventuras','Nova Aventura','Exibir Aventuras'),
			array('Sair','Alterar Senha','Sair')
		 ),
		 array(
		 	array('#','?m=usuario&t=incluir','?m=usuario&t=listar','?m=usuario_aventureiro&t=listar'),
		 	array('#','?m=personagem&t=incluir','?m=personagem&t=listar'),
		 	array('#','?m=home_page&t=listar','?m=sobre_page&t=listar','?m=historias_page&t=listar','?m=blog_page&t=listar','?m=comentario_blog&t=listar','?m=msg_anuncio&t=listar','?m=parceiros&t=listar'),
			array('#','?m=armas&t=incluir','?m=armas&t=listar'),
			array('#','?m=armaduras&t=incluir','?m=armaduras&t=listar'),
			array('#','?m=escudos&t=incluir','?m=escudos&t=listar'),
			array('#','?m=artefatos&t=incluir','?m=artefatos&t=listar'),
			array('#','?m=historia_npc&t=incluir','?m=historia_npc&t=listar'),
			array('#','?m=aventuras&t=incluir','?m=aventuras&t=listar'),
			array('#','?m=usuario&t=senha&id='.$meu_id.'','index.php?logoff=true')
			)
			);

?>