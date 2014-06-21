<?php

function gerar_personagem_montado(
		$nivel='', 
		$racas='', 
		$classes='', 
		$tipo='', 
		$sexo='', 
		$nome='', 
		$player_nome='', 
		$cabelos='', 
		$olhos='', 
		$pele='',
		$tendencia='', 
		$altura='', 
		$peso='', 
		$idade='', 
		$divindade='', 
		$religiao='', 
		$local='', 
		$itens_comuns='', 
		$itens_magicos='',
		$descricao_armas='', 
		$arma_nome = '',
		$arma_bonus_magico = '',
		$arma_dano = '',
		$armadura_nome = '', 
		$armadura_bonus_na_ca = '',
		$armadura_tipo = '',
		$descricao_armaduras='',
		$historias='', 
		$grimorio = '',
		$atributos=false, 
		$for='', 
		$des='', 
		$con='', 
		$int='', 
		$sab='', 
		$car=''){
	$personagem = new Personagem();
	$personagem->construtor_montado(
			$nivel,
			$racas, 
			$classes, 
			$tipo, 
			$sexo, 
			$nome, 
			$player_nome, 
			$cabelos, 
			$olhos, 
			$pele,
			$tendencia, 
			$altura, 
			$peso, 
			$idade, 
			$divindade, 
			$religiao, 
			$local, 
			$itens_comuns, 
			$itens_magicos,
			$descricao_armas, 
			$arma_nome,
			$arma_bonus_magico,
			$arma_dano,
			$armadura_nome,
			$armadura_bonus_na_ca,
			$armadura_tipo, 
			$descricao_armaduras,
			$historias, 
			$grimorio,
			$atributos,
			$for, 
			$des, 
			$con, 
			$int, 
			$sab, 
			$car);

	return $personagem;
}

function validacao_de_hablidades($for,$con,$des,$int,$sab,$car){
	if($for == '' || $con == '' || $des == '' || $int == '' || $sab == '' || $car == ''):
		header('Location:index.php?p=montar_ficha&alert=true');
	endif;
}

?>