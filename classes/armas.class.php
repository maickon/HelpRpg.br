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

class armas extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'armas';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"nome" 			=> NULL,
				"dominio" 		=> NULL,
				"dano" 			=> NULL,
				"preco" 		=> NULL,
				"decisivo" 		=> NULL,
				"distancia" 	=> NULL,
				"peso" 			=> NULL,
				"tipo" 			=> NULL,
				"descricao" 	=> NULL,
				"categoria" 	=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
			
	function exibir_armas($tipo){
		switch($tipo):
			case 'armas_simples':
				$this->extras_select = "WHERE categoria='Armas Simples' ORDER BY RAND( )  LIMIT 3";
			break;
			
			case 'armas_comuns':
				$this->extras_select = "WHERE categoria='Armas Comuns' ORDER BY RAND( )  LIMIT 3";
			break;
			
			case 'armas_exoticas':
				$this->extras_select = "WHERE categoria='Armas Exóticas' ORDER BY RAND( )  LIMIT 3";
			break;
			
			case 'todos':
				$this->extras_select = "ORDER BY RAND( )  LIMIT 3";
			break;
				
			case 'armas_magicas':
				$this->extras_select = utf8_decode("WHERE categoria='Armas Mágicas' ORDER BY RAND( )  LIMIT 3");
			break;
		endswitch;
		return $this->seleciona_tudo($this);
	}	
	
	function qtd_armas_pesquisadas($armas){
		$cont=0;
		while($objeto_resp = $armas->retorna_dados()):
			$cont++;
		endwhile;
		return $cont;
	}
}//fim classe home
?>