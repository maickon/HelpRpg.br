<?php
$tag = new tags();

$sessao = new sessao();
$armadura = new armaduras();
$tipo = array('armaduras','magicas');
$armadura->exibir_armaduras($tipo[rand(0,1)]);		
$objeto_armadura = $armadura->retorna_dados();

if(isset($_POST["botao"]) && $_POST["botao"] == 'Visualizar personagem'):
	$personagem = gerar_personagem_montado($_POST['nivel'], $_POST['racas'], $_POST['classes'], $_POST['tipo']);
elseif(isset($_POST["ver_char"]) && $_POST["ver_char"] == 'Ver personagem'):
	validacao_de_hablidades($_POST['forca'], $_POST['constituicao'], $_POST['destreza'], $_POST['inteligencia'], $_POST['sabedoria'], $_POST['carisma']);
	$personagem = gerar_personagem_montado($_POST['nivel'],        $_POST['racas'], 	   $_POST['classes'], 	   '',
										   $_POST['sexo'], 	       $_POST['nome'], 	       $_POST['player_nome'],  $_POST['cabelos'], 	      $_POST['olhos'], 
										   $_POST['pele'], 	       $_POST['tendencia'],    $_POST['altura'], 	   $_POST['peso'], 
										   $_POST['idade'],        $_POST['divindade'],    '',     					$_POST['local'], 	  	  $_POST['equipamentos'],
										   $_POST['itens'],        $_POST['armas'], 	   $_POST['armaduras'],    $_POST['historia'], true,  $_POST['forca'],
										   $_POST['constituicao'], $_POST['destreza'],     $_POST['inteligencia'], $_POST['sabedoria'],       $_POST['carisma']);
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
			itemArmadura($objeto_armadura);
			itemArmas();
		$tag->close('div');
	$tag->close('div');
	
	$tag->open('div','class="span6"');
		$tag->open('div','class="row"');
			$historia_inicio = new historias();
			$historia_meio = new historias();
			$historia_fim = new historias();
			itemHistoria(false,$historia_inicio->inicio(),$historia_meio->meio(),$historia_fim->fim(),$personagem);
			itemKitInicial(false,$personagem);
		$tag->close('div');
	$tag->close('div');
$tag->close('div');

$tag->open('div','class="row"');
	itemPericias($personagem);
	itemTalentos($personagem);
$tag->close('div');	



	
?>