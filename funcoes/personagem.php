<?php
function menuLinkPersonagem(){
	$tag = new tags();
	$tag->open('br');
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			
				if($_GET['p']=='fichas'):
					$tag->open('a','href="index.php?p=fichas"');
						$tag->open('b');
							$tag->inprime('Novo personagem &rArr;');
						$tag->close('b');
					$tag->close('a');
					
					$tag->open('a','href="index.php?p=montar_ficha"');
						$tag->inprime('Montar o Personagem &rArr;');
					$tag->close('a');	
					/*
					$tag->open('a','href="index.php?p=boss"');
						$tag->inprime('Chefes de fase &rArr;');
					$tag->close('a');
					*/				
				elseif($_GET['p']=='montar_ficha'):
					$tag->open('a','href="index.php?p=fichas"');
						$tag->inprime('Novo personagem &rArr;');						
					$tag->close('a');
					
					$tag->open('a','href="index.php?p=montar_ficha"');
						$tag->open('b');
							$tag->inprime('Montar o Personagem &rArr;');
						$tag->close('b');
					$tag->close('a');
				
					/*
					$tag->open('a','href="index.php?p=boss"');
						$tag->inprime('Chefes de fase &rArr;');
					$tag->close('a');
					*/
				elseif($_GET['p']=='boss'):
					$tag->open('a','href="index.php?p=fichas"');
						$tag->inprime('Novo personagem &rArr;');
					$tag->close('a');
				
					$tag->open('a','href="index.php?p=montar_ficha"');
						$tag->inprime('Montar o Personagem &rArr;');
					$tag->close('a');
					
					/*
					$tag->open('a','href="index.php?p=boss"');
						$tag->open('b');
							$tag->inprime('Chefes de fase &rArr;');
						$tag->close('b');
					$tag->close('a');	
					*/	
				endif;
		
		$tag->close('div');
	$tag->close('div');	
	$tag->open('br');
}

function itemSelectConjunto(){
	$tag = new tags();
	$tag->open('div','class="span12 white"');
		$tag->open('ul','class=""');
			itemSelectRaca();
			itemSelectClasse();
			itemSelectNivel();
			itemSelectTipo();
			itemBotao();
		$tag->close('ul');
	$tag->close('div');
}

function itemSelectRaca($racas = array("Humano","Anão","Elfo","Gnomo","Meio elfo","Meio orc","Halfling",
						   "			Humana","Anã","Elfa","Gnoma","Meio elfa","Meio orc","Halfling")){
	$tag = new tags();
	$tag->open('div','class="span2"');		
		$tag->open('li','class="bullet-item"');
			$tag->open('label');
				$tag->inprime('Buscar por Raça?');
			$tag->close('label');
			$tag->open('select','class="span2" name="racas"');
				$tag->open('option','selected="SELECTED"');
					$tag->inprime('');
				$tag->close('option');	
			for($i=0; $i<count($racas); $i++):
				$tag->open('option');
					$tag->inprime(''.$racas[$i].'');
				$tag->close('option');
			endfor;								
			$tag->close('select');						
		$tag->close('li');
	$tag->close('div');
}

function itemSelectClasse($classes= array("barbaro","guerreiro","paladino","monge","ladino","clerigo","bardo","feiticeiro","mago","druida","ranger",
							"			   barbara","guerreira","paladina","monge","ladina","cleriga","barda","feiticeira","maga","druida","ranger")){
	$tag = new tags();
	$tag->open('div','class="span2"');
		$tag->open('li','class="bullet-item"');
			$tag->open('label');
				$tag->inprime('Buscar por Classe?');
			$tag->close('label');
	
			$tag->open('select','class="span2" name="classes"');
				$tag->open('option','selected="SELECTED"');
					$tag->inprime('');
				$tag->close('option');
				
				for($i=0; $i<count($classes); $i++):
					$tag->open('option');
						$tag->inprime(''.$classes[$i].'');
					$tag->close('option');
				endfor;											
			$tag->close('select');
		$tag->close('li');
	$tag->close('div');
}

function itemSelectNivel(){
	$tag = new tags();
	$tag->open('div','class="span2"');	
		$tag->open('li','class="bullet-item"');
			$tag->open('label');
				$tag->inprime('Buscar por nivel?');
			$tag->close('label');
		
			$tag->open('select','class="span2" name="nivel"');
			
				$tag->open('option','slected="SELECTED"');
					$tag->inprime('');
				$tag->close('option');
				
				for($i=1; $i<=20; $i++):
					$tag->open('option');
						$tag->inprime(''.$i.'');
					$tag->close('option');
				endfor;						
			$tag->close('select');
		$tag->close('li');
	$tag->close('div');
}

function itemSelectTipo($tipo = array('normal','forte','brutal','hardcore','elite')){
	$tag = new tags();
	$tag->open('div','class="span2"');	
		$tag->open('li','class="bullet-item"');
			$tag->open('label');
				$tag->inprime('Tpo de ficha');
			$tag->close('label');
		
			$tag->open('select','class="span2" name="tipo"');
			
				$tag->open('option','selected="SELECTED"');
					$tag->inprime('');
				$tag->close('option');
				
				for($i=0; $i<=count($tipo)-1; $i++):
					$tag->open('option');
						$tag->inprime(''.$tipo[$i].'');
					$tag->close('option');
				endfor;						
			$tag->close('select');
		$tag->close('li');
	$tag->close('div');
}

function itemBotao(){
	$tag = new tags();
	$tag->open('div','class="span3"');	
		$tag->open('li','class="bullet-item"');
			$tag->open('label');
				$tag->inprime('Clique aqui!');
			$tag->close('label');
			$tag->open('input','name="botao" type="submit" value="Visualizar personagem" class="btn"');
		$tag->close('li');
	$tag->close('div');	
}
function itemBotaoMarcador(){
	$tag = new tags();
	$tag->open('div','class="span3"');	
		$tag->open('li','class="bullet-item"');
			$tag->open('label');
				$tag->inprime('Curtir este personagem?');
			$tag->close('label');
			$tag->open('input','name="botao_marcador" type="submit" value="+1 Nivel" class="btn 
					title="Este botão serve para informar quantas curtidas este personagem teve.""');
		$tag->close('li');
	$tag->close('div');	
}

function itemTitulo(){
	$tag = new tags();
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			$tag->open('ul','class="pricing-table"');
				$tag->open('li','class="title"');
					echo utf8_decode('FICHA DO PERSONAGEM');
				$tag->close('li');	
			$tag->close('ul');
		$tag->close('div');
	$tag->close('div');	
}

function itemCaracteristicas($sessao=null,$personagem=null){
	$tag = new tags();
	$tag->open('div','class="row"');	
		$tag->open('div','class="span10"');	
		
			$tag->open('ul','class="pricing-table"');
				$tag->open('li','class="bullet-item"');
					$user = $sessao->getVar('nome_user');
						$tag->inprime(NOME.' '.$personagem->nome.' '.
									JOGADOR.' '.jogador($user).' '.
									RACA.' '.$personagem->raca.' '.
									CLASSE.' '.$personagem->classe.' '.
									XP.' '.$personagem->xp.' '.
									NIVEL.' '.$personagem->nivel);
									
									
				$tag->close('li');
				
				$tag->open('li','class="bullet-item"');
					$tag->inprime(ALTURA.' '.$personagem->altura.' '.
									PESO.' '.$personagem->peso.' '.
									IDADE.' '.$personagem->idade.' '.
									OLHOS.' '.$personagem->olhos.' '.
									CABELOS.' '.$personagem->cabelos.' '.
									PELE.' '.$personagem->pele.' '.
									SEXO.' '.$personagem->sexo);		
				$tag->close('li');
				
				$tag->open('li','class="bullet-item"');
					$tag->inprime(TAMANHO.' '.$personagem->tamanho.' '.
									TENDENCIA.' '.$personagem->tendencia.' '.
									DIVINDADE.' '.$personagem->divindade.' '.
									RELIGIAO.' '.$personagem->religiao.' '.
									DV.$personagem->dv,'decode');												
				$tag->close('li');
				
			$tag->close('ul');
		$tag->close('div');
		//Img personagem
		itemImg($personagem);
		
	$tag->close('div');
}

function itemImg($personagem=null){
	$tag = new tags();	
		$tag->open('div','class="span2"');		
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="title"');
				$tag->open('img','src="img/basicClass/'.$personagem->img.'" class="th radius"');
			$tag->close('li');
		$tag->close('ul');	
	$tag->close('div');
}

function itemAtributos($personagem=null){
	$tag = new tags();
	$tag->open('div','class="span2"');	
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->inprime(FORCA.' '.$personagem->for_.$personagem->gerar_modificador_forca());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(CON.' '.$personagem->con_.$personagem->gerar_modificador_constituicao());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(DES.' '.$personagem->des_.$personagem->gerar_modificador_destreza());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(INT.' '.$personagem->int_.$personagem->gerar_modificador_inteligencia());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(SAB.' '.$personagem->sab_.$personagem->gerar_modificador_sabedoria());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(CAR.' '.$personagem->car_.$personagem->gerar_modificador_carisma());
			$tag->close('li');
		$tag->close('ul');
	$tag->close('div');
}

function itemEstatisticas($personagem=null,$armadura){
	$tag = new tags();
	$tag->open('div','class="span5"');	
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->inprime(PV.' '.$personagem->PV);
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				if($personagem->classe == 'monge'):
					$ca_ = $personagem->gerar_modificador_sabedoria().'(sab)+ 3(deflexão)';
					$total = $personagem->CA;
				else:
					$ca_ = 	limpar_campo_excluir('bonusNaCa', $armadura).'(armadura) ';
					$total = $personagem->CA+limpar_campo_excluir('bonusNaCa', $armadura)-3;
				endif;
				$tag->inprime(CA.' '.$total.' = 10 '.$personagem->gerar_modificador_destreza().'(des)'.$ca_);
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(INICIATIVA.' = '.$personagem->gerar_modificador_destreza());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(BBA.' '.$personagem->exibir_BBA_base());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(RIQUEZA.' '.$personagem->riqueza.' PO');
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime('------------------------------');
			$tag->close('li');
			
		$tag->close('ul');
		
	$tag->close('div');	
}

function itemTestesDeResistencia($personagem=null){
	$tag = new tags();
	$tag->open('div','class="span5"');	
		$tag->open('ul','class="pricing-table"');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(TESTESDERESISTENCIA);
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(VONT.' '.$personagem->gerar_vontade_total().' = '.$personagem->vontade.$personagem->gerar_modificador_sabedoria());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(REFL.' '.$personagem->gerar_reflexo_total().' = '.$personagem->reflexos.$personagem->gerar_modificador_destreza());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(FORT.' '.$personagem->gerar_fortitude_total().' = '.$personagem->fortitude.$personagem->gerar_modificador_constituicao());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(DESLOCAMENTO.' '.$personagem->deslocamento);
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime('------------------------------');
			$tag->close('li');	
		$tag->close('ul');
	$tag->close('div');
}

function itemAtaque($personagem=null){
	$tag = new tags();
	$tag->open('div','class="span6"');	
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->inprime(ATAQUE.' Desarmado');
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(BONUS.' '.$personagem->exibir_ataque_corpo_a_corpo());
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(DANO.' '.$personagem->dado_dano);
			$tag->close('li');			
		$tag->close('ul');
	$tag->close('div');
}

function itemArmadura($armadura=null, $preenchido=false){
	$tag= new tags();
	if($preenchido):
		$armaduraNome = $_POST['armadura_nome'];
		$armaduraBonusNaCa = $_POST['armadura_bonus_na_ca'];
		$armaduraTipo = $_POST['armadura_tipo'];
	else:
		$armaduraNome = limpar_campo_excluir('nome', $armadura);
		$armaduraBonusNaCa = limpar_campo_excluir('bonusNaCa', $armadura);
		$armaduraTipo = limpar_campo_excluir('tipo', $armadura);
	endif;
	$tag->open('div','class="span6"');
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->inprime(ARMADURA.' '.$armaduraNome);
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(BONUS.' '.$armaduraBonusNaCa);
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(TIPO.' '.$armaduraTipo);
			$tag->close('li');			
		$tag->close('ul');
	$tag->close('div');
}

function itemArmas($preenchido=false){
	$tag= new tags();
	$tag->open('div','class="span6"');
		$tag->open('ul','class="pricing-table"');
			if($preenchido):
				$armaNome = $_POST['arma_nome'];
				$armaTipo = $_POST['arma_tipo'];
				$armaDano = $_POST['arma_dano'];
			else:
				$escolido = rand(1,4);
				if($escolido == 1):
					$arma = new armas();
					$arma->exibir_armas('armas');			
					$armas_resp = $arma->retorna_dados();
				elseif($escolido == 2):
					$arma = new armas();
					$arma->exibir_armas('armas_simples');			
					$armas_resp = $arma->retorna_dados();
				elseif($escolido == 3):
					$arma = new armas();
					$arma->exibir_armas('armas_exoticas');			
					$armas_resp = $arma->retorna_dados();
				elseif($escolido == 4):
					$arma = new armas();
					$arma->exibir_armas('armas_magicas');			
					$armas_resp = $arma->retorna_dados();
				endif;
				$armaNome = limpar_campo_excluir('nome', $armas_resp);
				$armaTipo = limpar_campo_excluir('tipo', $armas_resp);
				$armaDano = limpar_campo_excluir('dano', $armas_resp);
			endif;
			$tag->open('li','class="bullet-item"');
				$tag->inprime(ARMA.' '.$armaNome);
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(DANO.' '.$armaDano);
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(TIPO.' '.$armaTipo);
			$tag->close('li');			
		$tag->close('ul');
	$tag->close('div');
}

function itemKitInicial($preenchido=false,$personagem=null){
	$tag = new tags();
	if($preenchido):
		$itens = $_POST['item_magicos'];
		$armas = $_POST['arma_descricao'];
		$armaduras = $_POST['armadura_descricao'];
		$equipamentos = $_POST['item_comums'];
	else:
		$itens = $personagem->itens;
		$armas =  $personagem->armas;
		$armaduras = $personagem->armadura;
		$equipamentos = $personagem->equipamento;
	endif;
	$tag->open('div','class="span6"');	
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->inprime(ITENS.' '.$itens,'decode');
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(ARMAS.' '.$armas,'decode');
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(ARMADURAS.' '.$armaduras,'decode');
			$tag->close('li');
			
			$tag->open('li','class="bullet-item"');
				$tag->inprime(EQUIPAMENTOS.' '.$equipamentos,'decode');
			$tag->close('li');
		
		$tag->close('ul');
	$tag->close('div');
}

function itemHistoria($preenchido=false,$historia_inicio,$historia_meio,$historia_fim,$personagem=null){
	$tag = new tags();
	if($preenchido):
		$historia = '<b>'.$personagem->nome.'</b>'.$_POST['personagem_historia'];
	else:
		$historia = '<b>'.$personagem->nome.'</b>'.$historia_inicio.''.$historia_meio.''.$historia_fim;
	endif;
	$tag->open('div','class="span6"');	
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->inprime(HISTORIA);
			$tag->close('li');
		
			$tag->open('li','class="bullet-item"');
				$tag->inprime($historia);
			$tag->close('li');	
		$tag->close('ul');	
	$tag->close('div');
}

function itemGrimorio($personagem=null,$preenchido=false){
	$tag = new tags();
	if($preenchido):
		$grimorio = $_POST['personagem_grimorio'];
	else:
		$grimorio = $personagem->grimorio;
	endif;
	$tag->open('div','class="span12"');	
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->inprime(GRIMORIO);
			$tag->close('li');
		
			$tag->open('li','class="bullet-item"');
				$tag->inprime($grimorio);
			$tag->close('li');	
		$tag->close('ul');	
	$tag->close('div');
}

function itemPericias($personagem=null){
	$tag = new tags();
	$tag->open('div','class="span6"');	
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->inprime(PERICIAS);
			$tag->close('li');
			
			for($i=0; $i<=$personagem->qtd_pericias(); $i++):
				if(!empty($personagem->pericias_nome[$i])):
					$tag->open('li','class="bullet-item"');
						$total = $personagem->pericias_grad[$i]+$personagem->pericias_mod[$i];
						$tag->inprime($personagem->pericias_nome[$i].' '.$total.' = '.$personagem->pericias_grad[$i].$personagem->pericias_mod[$i],'decode');
					$tag->close('li');
				endif;
			endfor;
		$tag->close('li');
	$tag->close('div');
}

function itemTalentos($personagem=null){
	$tag= new tags();
	$tag->open('div','class="span6"');	
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->inprime(TALENTOS);
			$tag->close('li');
			
			for($i=0; $i<=count($personagem->talentos)-1; $i++):
				if(!empty($personagem->talentos[$i])):
					$tag->open('li','class="bullet-item"');
						$tag->inprime($personagem->talentos[$i],'decode');
					$tag->close('li');
				endif;
			endfor;
		$tag->close('ul');
		
	$tag->close('div');
}
?>