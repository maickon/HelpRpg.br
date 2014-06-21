<?php
//Atributos
define('NAME_FOR','forca');
define('NAME_DES','destreza');
define('NAME_CON','constituicao');
define('NAME_INT','inteligencia');
define('NAME_SAB','sabedoria');
define('NAME_CAR','carisma');

//Grupo A
define('NAME_NAME','nome');
define('NAME_PLAYER','jogador');
define('NAME_RACA','raca');
define('NAME_CLASSE','classe');
define('NAME_NIVEL','nivel');

//Grupo B
define('NAME_ALTURA','altura');
define('NAME_PESO','peso');
define('NAME_IDADE','idade');
define('NAME_OLHOS','olhos');
define('NAME_PELE','pele');

//Grupo C
define('NAME_SEXO','sexo');
define('NAME_TENDENCIA','tendencia');
define('NAME_DIVINDADE','divindade');
define('NAME_CABELO','cabelo');
define('NAME_LUGAR','lugar');

//Itens
define('NAME_ITENS_COMUM','item_comums');
define('NAME_ITEN_MAGICOS','item_magicos');

//Arma usada
define('NAME_ARMA','arma_nome');
define('NAME_TIPO','arma_tipo');
define('NAME_DADO_DANO','arma_dano');
define('NAME_DESCRICAO_ARMA','arma_descricao');

//Armadura
define('NAME_ARMADURA_BONUS_NA_CA','armadura_bonus_na_ca');
define('NAME_ARMADURA_TIPO','armadura_tipo');
define('NAME_ARMADURA','armadura_nome');
define('NAME_DESCRICAO_ARMADURA','armadura_descricao');

//Historia
define('NAME_HISTORIA','personagem_historia');

//Grimorio
define('NAME_GRIMORIO','personagem_grimorio');

function habilidades_input($objeto_edit=null,$disabled=null){
	$tag = new tags();

	forca_input($tag,$objeto_edit,$disabled);
	destreza_input($tag,$objeto_edit,$disabled);
	constituicao_input($tag,$objeto_edit,$disabled);
	inteligencia_input($tag,$objeto_edit,$disabled);
	sabedoria_input($tag,$objeto_edit,$disabled);
	carisma_input($tag,$objeto_edit,$disabled);	
}

function forca_input($tag,$objeto_edit,$disabled){
	$for = (NAME_FOR);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$for.'"':$value=' ';
	$tag->open('div','class="span2"');
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->open('label');
					$tag->inprime('Força');
				$tag->close('label');
				$tag->open('input','class="input-small" placeholder="Força" '.$disabled.' '.$value.' title="Digite seu valor de força aqui!" name="'.NAME_FOR.'" type="text"');
			$tag->close('li');
		$tag->close('ul');
	$tag->close('div');
}

function destreza_input($tag,$objeto_edit,$disabled){
	$des = (NAME_DES);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$des.'"':$value=' ';
	$tag->open('div','class="span2"');
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->open('label');
					$tag->inprime('Destreza');
				$tag->close('label');
				$tag->open('input','class="input-small" placeholder="Destreza" '.$disabled.' '.$value.' title="Digite seu valor de destreza aqui!" name="'.NAME_DES.'" type="text"');
			$tag->close('li');
		$tag->close('ul');
	$tag->close('div');
}

function constituicao_input($tag,$objeto_edit,$disabled){
	$con = (NAME_CON);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$con.'"':$value=' ';
	$tag->open('div','class="span2"');
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->open('label');
					$tag->inprime('Constitiução');
				$tag->close('label');
				$tag->open('input','class="input-small" placeholder="Constitiução" '.$disabled.' '.$value.' title="Digite seu valor de constituiçao aqui!" name="'.NAME_CON.'" type="text"');	
			$tag->close('li');
		$tag->close('ul');
	$tag->close('div');	
}

function inteligencia_input($tag,$objeto_edit,$disabled){
	$int = (NAME_INT);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$int.'"':$value=' ';
	$tag->open('div','class="span2"');
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->open('label');
					$tag->inprime('Inteligência');
				$tag->close('label');
				$tag->open('input','class="input-small" placeholder="Inteligência" '.$disabled.' '.$value.' title="Digite seu valor de inteligência aqui!" name="'.NAME_INT.'" type="text"');
			$tag->close('li');
		$tag->close('ul');
	$tag->close('div');
}

function sabedoria_input($tag,$objeto_edit,$disabled){
	$sab = (NAME_SAB);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$sab.'"':$value=' ';
	$tag->open('div','class="span2"');
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->open('label');
					$tag->inprime('Sabedoria');
				$tag->close('label');
				$tag->open('input','class="input-small" placeholder="Sabedoria" '.$disabled.' '.$value.' title="Digite seu valor de sabedoria aqui!" name="'.NAME_SAB.'" type="text"');
			$tag->close('li');
		$tag->close('ul');
	$tag->close('div');
}

function carisma_input($tag,$objeto_edit,$disabled){
	$car = (NAME_CAR);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$car.'"':$value=' ';
	$tag->open('div','class="span2"');
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->open('label');
					$tag->inprime('Carisma');
				$tag->close('label');
				$tag->open('input','class="input-small" placeholder="Carisma" '.$disabled.' '.$value.' title="Digite seu valor de  carisma aqui!" name="'.NAME_CAR.'" type="text"');
			$tag->close('li');
		$tag->close('ul');
	$tag->close('div');
}

function descricao_part_A($tag,$objeto_edit=null,$disabled=null){
	$tag->open('div','class="span4"');
		$tag->open('ul','class="pricing-table"');
			input_nome($tag,$objeto_edit,$disabled);
			input_nome_jogador($tag,$objeto_edit,$disabled);
			input_raca($tag,$objeto_edit,$disabled);
			inputSelectClasse($objeto_edit,$disabled);
			inputSelectNivel($objeto_edit,$disabled);
		$tag->close('ul');
	$tag->close('div');
}

function descricao_part_B($tag,$objeto_edit=null,$disabled=null){
	$tag->open('div','class="span4"');
		$tag->open('ul','class="pricing-table"');
			input_altura($tag,$objeto_edit,$disabled);
			input_peso($tag,$objeto_edit,$disabled);
			input_idade($tag,$objeto_edit,$disabled);
			input_olhos($tag,$objeto_edit,$disabled);
			input_pele($tag,$objeto_edit,$disabled);
		$tag->close('ul');
	$tag->close('div');
}

function descricao_part_C($tag,$objeto_edit=null,$disabled=null){
	$tag->open('div','class="span4"');
		$tag->open('ul','class="pricing-table"');
			inputSelectSexo($objeto_edit,$disabled);
			inputSelectTendencia($objeto_edit,$disabled);
			input_divindade($tag,$objeto_edit,$disabled);
			input_cabelo($tag,$objeto_edit,$disabled);
			input_lugar($tag,$objeto_edit,$disabled);
		$tag->close('ul');
	$tag->close('div');
}

function descricao_arma_earmadura_usada_A($tag,$objeto_edit=null){
	$tag->open('div','class="span4"');
		$tag->open('ul','class="pricing-table"');
			input_arma_usada($tag,$objeto_edit);
			input_tipo_arma($tag,$objeto_edit);
		$tag->close('ul');
	$tag->close('div');
}

function descricao_arma_earmadura_usada_B($tag,$objeto_edit=null){
	$tag->open('div','class="span4"');
		$tag->open('ul','class="pricing-table"');
			input_dado_dano($tag,$objeto_edit);
			input_armadura_usada($tag,$objeto_edit);
		$tag->close('ul');
	$tag->close('div');
}

function descricao_arma_earmadura_usada_C($tag,$objeto_edit=null){
	$tag->open('div','class="span4"');
		$tag->open('ul','class="pricing-table"');
			input_armadura_bonus_na_ca($tag,$objeto_edit);
			input_armadura_tipo($tag,$objeto_edit);
		$tag->close('ul');
	$tag->close('div');
}

function descricao_arma($tag,$objeto_edit=null){
	$tag->open('div','class="span6"');
		$tag->open('ul','class="pricing-table"');
			input_descricao_arma_usada($tag,$objeto_edit);
		$tag->close('ul');
	$tag->close('div');
}

function descricao_armadura($tag,$objeto_edit=null){
	$tag->open('div','class="span6"');
		$tag->open('ul','class="pricing-table"');
			input_descricao_armadura_usada($tag,$objeto_edit);
		$tag->close('ul');
	$tag->close('div');
}

function descricao_historia($tag,$objeto_edit=null){
	$tag->open('div','class="span12"');
		$tag->open('ul','class="pricing-table"');
			input_historia($tag,$objeto_edit);
		$tag->close('ul');
	$tag->close('div');
}

function descricao_grimorio($tag,$objeto_edit=null){
	$tag->open('div','class="span12"');
		$tag->open('ul','class="pricing-table"');
			input_grimorio($tag,$objeto_edit);
		$tag->close('ul');
	$tag->close('div');
}



function descricao_iten_comum($tag,$objeto_edit=null){
	$tag->open('div','class="span6"');
		$tag->open('ul','class="pricing-table"');
			input_itens_comum($tag,$objeto_edit);
		$tag->close('ul');
	$tag->close('div');	
}

function descricao_iten_magico($tag,$objeto_edit=null){
	$tag->open('div','class="span6"');
		$tag->open('ul','class="pricing-table"');
			input_itens_magico($tag,$objeto_edit);
		$tag->close('ul');
	$tag->close('div');	
}

function input_nome($tag,$objeto_edit,$disabled){
	$nome = (NAME_NAME);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$nome.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual é o nome do seu personagem?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o nome dele aqui!" '.$disabled.' '.$value.' title="Digite o nome do personagem aqui!" name="'.NAME_NAME.'" type="text"');
	$tag->close('li');
}

function input_nome_jogador($tag,$objeto_edit,$disabled){
	$jogador = (NAME_PLAYER);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$jogador.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Seu nome de jogador é?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o seu nome aqui!" '.$disabled.' '.$value.' title="Digite o nome do dono do personagem aqui!" name="'.NAME_PLAYER.'" type="text"');
	$tag->close('li');
}

function input_raca($tag,$objeto_edit,$disabled){
	$raca = (NAME_RACA);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$raca.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual é a raça do seu personagem?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira a sua raça aqui!" '.$disabled.' '.$value.' title="Digite o nome da raça do personagem aqui!" name="'.NAME_RACA.'" type="text"');
	$tag->close('li');
}

function inputSelectClasse($objeto_edit,$disabled,$classes = array("barbaro","guerreiro","paladino","monge","ladino","clerigo","bardo","feiticeiro","mago","druida","ranger","barbara","guerreira","paladina","monge","ladina","cleriga","barda","feiticeira","maga","druida","ranger")){
	$classe_name = (NAME_CLASSE);
	isset($objeto_edit)?$value=$objeto_edit->$classe_name:$value=' ';
	$tag = new tags();
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Classe');
		$tag->close('label');
	
		$tag->open('select',''.$disabled.' name="'.NAME_CLASSE.'" title="Informe a classe do seu personagem aqui!"');
		
			$tag->open('option','selected="SELECTED"');
				$tag->inprime($value);
			$tag->close('option');
			
			for($i=0; $i<=count($classes)-1; $i++):
				$tag->open('option');
					$tag->inprime(''.$classes[$i].'');
				$tag->close('option');
			endfor;						
		$tag->close('select');
	$tag->close('li');
}

function inputSelectNivel($objeto_edit,$disabled,$nivel = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20')){
	$nivel_name = (NAME_NIVEL);
	isset($objeto_edit)?$value=$objeto_edit->$nivel_name:$value=' ';
	$tag = new tags();
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Nivel');
		$tag->close('label');
	
		$tag->open('select',''.$disabled.' name="'.NAME_NIVEL.'" title="Informe o nivel do seu personagem aqui!"');
		
			$tag->open('option','selected="SELECTED"');
				$tag->inprime($value);
			$tag->close('option');
			
			for($i=0; $i<=count($nivel)-1; $i++):
				$tag->open('option');
					$tag->inprime(''.$nivel[$i].'');
				$tag->close('option');
			endfor;						
		$tag->close('select');
	$tag->close('li');
}

function input_altura($tag,$objeto_edit,$disabled){
	$altura = (NAME_ALTURA);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$altura.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual é a altura do seu personagem?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira a altura dele aqui!" '.$disabled.' '.$value.' title="Digite a Altura do seu personagem aqui!" name="'.NAME_ALTURA.'" type="text"');
	$tag->close('li');
}

function input_peso($tag,$objeto_edit,$disabled){
	$peso = (NAME_PESO);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$peso.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Quanto pesa o seu personagem?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o peso dele aqui!" '.$disabled.' '.$value.' title="Digite o peso do seu personagem aqui!" name="'.NAME_PESO.'" type="text"');
	$tag->close('li');
}

function input_idade($tag,$objeto_edit,$disabled){
	$idade = (NAME_IDADE);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$idade.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual é a idade do seu personagem?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira a idade dele aqui!" '.$disabled.' '.$value.' title="Digite a idade do personagem aqui!" name="'.NAME_IDADE.'" type="text"');
	$tag->close('li');
}

function input_olhos($tag,$objeto_edit,$disabled){
	$olhos = (NAME_OLHOS);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$olhos.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Como é a cor dos olhos do seu personagem?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira a cor dos olhos aqui!" '.$disabled.' '.$value.' title="Digite a cor dos olhos do seu personagem aqui!" name="'.NAME_OLHOS.'" type="text"');
	$tag->close('li');
}

function input_pele($tag,$objeto_edit,$disabled){
	$pele = (NAME_PELE);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$pele.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Como é a cor da pele do seu personagem?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira a cor da pele aqui!" '.$disabled.' '.$value.' title="Digite o cor da pele do seu personagem aqui!" name="'.NAME_PELE.'" type="text"');
	$tag->close('li');
}

function input_arma_usada($tag,$objeto_edit){
	$arma = (NAME_ARMA);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$arma.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual arma o seu personagem usa?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o nome da arma aqui!" '.$value.' title="Nome da arma." name="'.NAME_ARMA.'" type="text"');
	$tag->close('li');
}

function input_tipo_arma($tag,$objeto_edit){
	$arma_tipo = (NAME_TIPO);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$arma_tipo.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual é tipo da arma?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o tipo da arma aqui!" '.$value.' title="Digite o tipo da sua arma. Ex: arma leve, pesada, exotica ou etc." name="'.NAME_TIPO.'" type="text"');
	$tag->close('li');
}

function input_dado_dano($tag,$objeto_edit){
	$dado = (NAME_DADO_DANO);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$dado.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual o dado de dano da arma?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o dado de dano aqui!" '.$value.' title="Digite o dado de dano da arma aqui!." name="'.NAME_DADO_DANO.'" type="text"');
	$tag->close('li');
}

function input_descricao_arma_usada($tag,$objeto_edit){
	$descricao = (NAME_DESCRICAO_ARMA);
	isset($objeto_edit)?$value=$objeto_edit->$descricao:$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Descrição de sua arma usada?');
		$tag->close('label');
		$tag->open('textarea','placeholder="Descreva com maiores destalhes sobre sua arma aqui."
				 			   title="Digite a descrição da arma usada aqui!."
							   class="ckeditor-" id="editor1" name="'.NAME_DESCRICAO_ARMA.'"');
			$tag->inprime($value);
		$tag->close('textarea');
		$tag->close('li');
}

function input_armadura_usada($tag,$objeto_edit){
	$armadura = (NAME_ARMADURA);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$armadura.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual armadura seu personagem usa?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o nome da armadura aqui!" '.$value.' title="Digite o nome da armadura aqui!" name="'.NAME_ARMADURA.'" type="text"');
	$tag->close('li');
}

function input_armadura_bonus_na_ca($tag,$objeto_edit){
	$armadura_bonus = (NAME_ARMADURA_BONUS_NA_CA);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$armadura_bonus.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Quanto de bônus na CA esta armadura concede?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o bônus da armadura aqui!" '.$value.' title="Digite o bônus de armadura na CA aqui!" name="'.NAME_ARMADURA_BONUS_NA_CA.'" type="text"');
	$tag->close('li');
}

function input_armadura_tipo($tag,$objeto_edit){
	$armadura_tipo = (NAME_ARMADURA_TIPO);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$armadura_tipo.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual o tipo da sua armadura?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o tipo da armadura aqui!" '.$value.' title="Digite o tipo aqui! Exemplo: Leve, média ou pesada." name="'.NAME_ARMADURA_TIPO.'" type="text"');
	$tag->close('li');
}

function input_descricao_armadura_usada($tag,$objeto_edit){
	$armadura_descricao = (NAME_DESCRICAO_ARMADURA);
	isset($objeto_edit)?$value=$objeto_edit->$armadura_descricao:$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Descrição de sua armadura usada?');
		$tag->close('label');
		$tag->open('textarea','placeholder="Descreva com maiores destalhes sobre sua armadura é aqui."
				 			   title="Digite a descrição da armadura usada aqui!"
							   class="ckeditor-" id="editor1" name="'.NAME_DESCRICAO_ARMADURA.'"');
			$tag->inprime($value);
		$tag->close('textarea');
		$tag->close('li');
}


function inputSelectSexo($objeto_edit,$disabled,$sexo = array('masculino','feminino')){
	$sexo_name = (NAME_SEXO);
	isset($objeto_edit)?$value=$objeto_edit->$sexo_name:$value=' ';
	$tag = new tags();
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Sexo');
		$tag->close('label');
	
		$tag->open('select',''.$disabled.' name="'.NAME_SEXO.'"');
		
			$tag->open('option','selected="SELECTED" title="Informe o sexo do seu personagem aqui!"');
				$tag->inprime($value);
			$tag->close('option');
			
			for($i=0; $i<=count($sexo)-1; $i++):
				$tag->open('option');
					$tag->inprime(''.$sexo[$i].'');
				$tag->close('option');
			endfor;						
		$tag->close('select');
	$tag->close('li');
}

function inputSelectTendencia($objeto_edit,$disabled,$tendencia = array('Leal e Bom','Caótico e Bom','Neutro e Bom','Leal e Mau','Cótico e Mau','Neutro e Mau')){
	$tendencia_name = (NAME_TENDENCIA);
	isset($objeto_edit)?$value=$objeto_edit->$tendencia_name:$value=' ';
	$tag = new tags();
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Tendencia');
		$tag->close('label');
	
		$tag->open('select',''.$disabled.' name="'.NAME_TENDENCIA.'"');
		
			$tag->open('option','selected="SELECTED" title="Informe o alinhamento do seu personagem aqui!"');
				$tag->inprime($value);
			$tag->close('option');
			
			for($i=0; $i<=count($tendencia)-1; $i++):
				$tag->open('option');
					$tag->inprime(''.$tendencia[$i].'');
				$tag->close('option');
			endfor;						
		$tag->close('select');
	$tag->close('li');
}

function input_divindade($tag,$objeto_edit,$disabled){
	$divindade = (NAME_DIVINDADE);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$divindade.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('A qual divindade o seu personagem segue?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o nome do deus aqui!" '.$disabled.' '.$value.' title="Digite o nome do deus que o personagem segue aqui!." name="'.NAME_DIVINDADE.'" type="text"');
	$tag->close('li');
}

function input_cabelo($tag,$objeto_edit,$disabled){
	$cabelo = (NAME_CABELO);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$cabelo.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Qual a cor do cabelo do seu personagem?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira a cor do cabelo dele aqui!" '.$disabled.' '.$value.' title="Digite a cor do cabelo do seu personagem aqui!" name="'.NAME_CABELO.'" type="text"');
	$tag->close('li');
}

function input_lugar($tag,$objeto_edit,$disabled){
	$lugar = (NAME_LUGAR);
	isset($objeto_edit)?$value='value="'.$objeto_edit->$lugar.'"':$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('De qual lugar o seu personagem veio?');
		$tag->close('label');
		$tag->open('input','placeholder="Insira o nome do lugar aqui!" '.$disabled.' '.$value.' title="Digite o nome da cidade, região ou reinado de onde seu personagem veio aqui!." name="'.NAME_LUGAR.'" type="text"');
	$tag->close('li');
}

function input_itens_comum($tag,$objeto_edit){
	$item_comum = (NAME_ITENS_COMUM);
	isset($objeto_edit)?$value=$objeto_edit->$item_comum:$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('O que você carrega?');
		$tag->close('label');
		$tag->open('textarea','placeholder="Liste aqui apenas coisas comuns que você carrega como, tocha, corda, livro e etc. 
							   Obs: Preencha os 4 campos, caso algum fique faltando, todos eles serão preenchidos de forma aleatória."
				 			   title="Digite o nome dos itens comuns que carrega aqui!."
							   class="ckeditor-" id="editor1" name="'.NAME_ITENS_COMUM.'"');
			$tag->inprime($value);
		$tag->close('textarea');
	$tag->close('li');
}

function input_itens_magico($tag,$objeto_edit){
	$item_magico = (NAME_ITEN_MAGICOS);
	isset($objeto_edit)?$value=$objeto_edit->$item_magico:$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Quais itens mágicos você carrega?');
		$tag->close('label');
		$tag->open('textarea','placeholder="Digite tudo que for mágico que você carrega."
				 			   title="Digite o nome dos itens mágicos que carrega aqui!"
							   class="ckeditor-" id="editor1" name="'.NAME_ITEN_MAGICOS.'"');
			$tag->inprime($value);
		$tag->close('textarea');
	$tag->close('li');
}

function input_historia($tag,$objeto_edit){
	$historia = (NAME_HISTORIA);
	isset($objeto_edit)?$value=$objeto_edit->$historia:$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Descreva a história do seu personagem.');
		$tag->close('label');
		$tag->open('textarea','placeholder="Conte-nos um pouco sobre sua história."
				 			   title="Digite a história do seu personagem aqui!"
							   class="ckeditor" id="editor1" name="'.NAME_HISTORIA.'"');
			$tag->inprime($value);
		$tag->close('textarea');
	$tag->close('li');
}

function input_grimorio($tag,$objeto_edit){
	$grimorio = (NAME_GRIMORIO);
	isset($objeto_edit)?$value=$objeto_edit->$grimorio:$value=' ';
	$tag->open('li','class="bullet-item"');
		$tag->open('label');
			$tag->inprime('Caso seja um conjurador, preencha sua lista de magias aqui. Descreva-as com detalhes.');
		$tag->close('label');
		$tag->open('textarea','placeholder="Seu grimório."
				 			   title="Digite sobre o Grimório do seu personagem aqui!"
							   class="ckeditor" id="editor1" name="'.NAME_GRIMORIO.'"');
			$tag->inprime($value);
		$tag->close('textarea');
	$tag->close('li');
}

function item_botao_save_char(){
	$tag = new tags();
	$tag->open('div','class="span12"');
		$tag->open('ul','class="pricing-table"');
			$tag->open('li','class="bullet-item"');
				$tag->open('label');
					$tag->inprime('Visualizar Personagem.');
				$tag->close('label');
				$tag->open('input','name="ver_char" type="submit" value="Ver personagem" class="btn"');
			$tag->close('li');
		$tag->close('ul');
	$tag->close('div');	
}






?>