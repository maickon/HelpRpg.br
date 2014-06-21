<?php
/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmail.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @category RPG <helprpg.br@gmail.com>
 * @version   1.2
 * @link      http://www.helprpg.com.br
 */
protegeArquivo(basename(__FILE__));

class personagem_db extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'personagem';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				//Atributos fisicos
				"forca" 				=> NULL,
				"destreza" 				=> NULL,
				"constituicao" 			=> NULL,
				"inteligencia" 			=> NULL,
				"sabedoria" 			=> NULL,
				"carisma" 				=> NULL,
				//descrição do personagem
				"nome" 					=> NULL,
				"jogador" 				=> NULL,
				"raca" 					=> NULL,
				"classe" 				=> NULL,
				"nivel" 				=> NULL,
				"altura" 				=> NULL,
				"peso" 					=> NULL,
				"idade" 				=> NULL,
				"olhos" 				=> NULL,
				"pele"		 			=> NULL,
				"sexo"	 				=> NULL,
				"tendencia" 			=> NULL,
				"divindade" 			=> NULL,
				"cabelo" 				=> NULL,
				"lugar" 				=> NULL,
				//iten que carrega
				"item_comums" 			=> NULL,
				"item_magicos" 			=> NULL,
				"arma_nome" 			=> NULL,
				"arma_bonus_magico"		=> NULL,
				"arma_dano" 			=> NULL,
				"arma_descricao" 		=> NULL,
				"armadura_bonus_na_ca" 	=> NULL,
				"armadura_tipo" 		=> NULL,
				"armadura_nome"			=> NULL,
				"armadura_descricao" 	=> NULL,
				"personagem_historia" 	=> NULL,
				"personagem_grimorio" 	=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
	
	function gerar_boss($classe='',$raca='',$nivel=''){
		$where='';
		if(($classe!='')&&($raca!='')&&($nivel!='')):
			$where .= "WHERE classe='$classe' AND raca='$raca' AND nivel=$nivel ORDER BY RAND()";
		elseif(($classe!='')&&($raca!='')):
			$where .= "WHERE classe='$classe' AND raca='$raca' ORDER BY RAND()";
		elseif($classe!=''):
			$where .= "WHERE classe='$classe'";
		endif;
		$this->extras_select = " WHERE RAND() LIMIT 1";
		$this->seleciona_tudo($this);
	}
	
}//fim classe personagem_db

?>