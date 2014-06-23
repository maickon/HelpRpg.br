<?php
$tag = new tags();

if(isset($_POST["botao"]) && $_POST["botao"] == 'Visualizar Chefe de fase'):
	$personagem_db = new personagem_db();
	if(isset($_POST['classe']) && isset($_POST['raca']) && isset($_POST['nivel'])):
		//$personagem_db->extras_select = 'WHERE classe ='.$POST['classe'].'';
	endif;
	
	$sessao = new sessao();	
endif;

$tag->open('div','class="row"');
	$tag->open('form','action="index.php?p=boss" method="POST" class="custom"');
		menuLinkPersonagem();
		itensInputConjunto($tag);
	$tag->close('form');	
$tag->close('div');


$tag->open('div','class="row"');
	$tag->open('div','class="span12"');
		itemTitulo();
		itemCaracteristicas($sessao,$personagem_db);
	$tag->close('div');
$tag->close('div');

$tag->open('div','class="row"');
		itemAtributos($personagem_db);
		itemEstatisticas($personagem_db,$personagem_db);
		itemTestesDeResistencia($personagem_db);
$tag->close('div');


$tag->open('div','class="row"');
	$tag->open('div','class="span6"');
		$tag->open('div','class="row"');
			itemAtaque($personagem_db);
			($_POST['armadura_nome'])||($_POST['armadura_bonus_na_ca'])||($_POST['armadura_tipo'])?$armad_preechido=true:$armad_preechido=false;
			itemArmadura($personagem_db,$armad_preechido);
			($_POST['arma_nome'])||($_POST['arma_tipo'])||($_POST['arma_dano'])?$arma_preechido=true:$arma_preechido=false;
			itemArmas($arma_preechido);
		$tag->close('div');
	$tag->close('div');
	
	$tag->open('div','class="span6"');
		$tag->open('div','class="row"');
			($_POST['personagem_historia'])?$hist_preechido=true:$hist_preechido=false;
			$historia_inicio = new historias();
			$historia_meio = new historias();
			$historia_fim = new historias();
			itemHistoria($hist_preechido,$historia_inicio->inicio(),$historia_meio->meio(),$historia_fim->fim(),$personagem);
			
			($_POST['item_comums'])||($_POST['item_magicos'])||($_POST['armadura_descricao'])||($_POST['arma_descricao'])?$kit_inicial_preechido=true:$kit_inicial_preechido=false;
			itemKitInicial($kit_inicial_preechido,$personagem_db);
		$tag->close('div');
	$tag->close('div');
$tag->close('div');

$tag->open('div','class="row"');
	itemPericias($personagem_db);
	itemTalentos($personagem_db);
$tag->close('div');	

$tag->open('div','class="row"');
	itemGrimorio($personagem_db,true);
$tag->close('div');

?>