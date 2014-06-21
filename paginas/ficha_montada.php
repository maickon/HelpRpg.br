<?php
$tag = new tags();

$sessao = new sessao();
$armadura = new armaduras();
$tipo = array('armaduras','magicas');
$armadura->exibir_armaduras($tipo[rand(0,1)]);		
$objeto_armadura = $armadura->retorna_dados();

if(isset($_POST["ver_char"]) && $_POST["ver_char"] == 'Ver personagem'):
	validacao_de_hablidades(
			$_POST['forca'],  
			$_POST['destreza'],
			$_POST['constituicao'],
			$_POST['inteligencia'], 
			$_POST['sabedoria'], 
			$_POST['carisma']);

	$personagem = gerar_personagem_montado(
			$_POST['nivel'],        
			$_POST['raca'], 	   
			$_POST['classe'], 	   
			'',	//tipo, nao ecessario						   
			$_POST['sexo'], 	       
			$_POST['nome'], 	      
			$_POST['jogador'],  
			$_POST['cabelo'], 	      
			$_POST['olhos'], 
			$_POST['pele'], 	       
			$_POST['tendencia'],    
			$_POST['altura'], 	   
			$_POST['peso'], 
		    $_POST['idade'],        
			$_POST['divindade'],
			'',//religiao     					
			$_POST['lugar'], 	  	  
			$_POST['item_comums'],
		    $_POST['item_magicos'], 
			//armas
			$_POST['arma_descricao'],
			$_POST['arma_nome'],
			$_POST['arma_tipo'],
			$_POST['arma_dano'],
			//armaduras
			$_POST['armadura_nome'],
			$_POST['armadura_bonus_na_ca'],
			$_POST['armadura_tipo'],
			$_POST['armadura_descricao'],
			//historia do char
			$_POST['personagem_historia'],
			$_POST['personagem_grimorio'],
			true, //se todos os campos de atributos foram preenchidos 
			$_POST['forca'],
			$_POST['destreza'],
		    $_POST['constituicao'],     
			$_POST['inteligencia'], 
			$_POST['sabedoria'],       
			$_POST['carisma']);
else:
	$personagem = new Personagem();	
endif;





$tag->open('div','class="row"');
	$tag->open('form','action="index.php?p=fichas" method="POST" class="custom"');
		menuLinkPersonagem();
		itemSelectConjunto();
	$tag->close('form');	
$tag->close('div');



$tag->open('div','class="row"');
	$tag->open('div','class="span12"');
		itemTitulo();
		itemCaracteristicas($sessao,$personagem);
	$tag->close('div');
$tag->close('div');

$tag->open('div','class="row"');
		itemAtributos($personagem);
		itemEstatisticas($personagem,$objeto_armadura);
		itemTestesDeResistencia($personagem);
$tag->close('div');


$tag->open('div','class="row"');
	$tag->open('div','class="span6"');
		$tag->open('div','class="row"');
			itemAtaque($personagem);
			itemArmadura($objeto_armadura,true);
			itemArmas(true);
		$tag->close('div');
	$tag->close('div');
	
	$tag->open('div','class="span6"');
		$tag->open('div','class="row"');
			$historia_inicio = new historias();
			$historia_meio = new historias();
			$historia_fim = new historias();
			itemHistoria($historia_inicio->inicio(),$historia_meio->meio(),$historia_fim->fim(),$personagem);
			itemKitInicial($personagem);
		$tag->close('div');
	$tag->close('div');
$tag->close('div');

$tag->open('div','class="row"');
	itemPericias($personagem);
	itemTalentos($personagem);
$tag->close('div');	

$tag->open('div','class="row"');
	itemGrimorio($personagem,true);
$tag->close('div');



	
?>