<?php
/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon Jos� Rangel <maickonmaickonmaickon@Gmail.com>
 * @copyright 2012-2013 Maickon Jos� Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @category RPG <helprpg.br@gmail.com>
 * @version   1.2
 * @link      http://www.helprpg.com.br
 */
protegeArquivo(basename(__FILE__));

class msg_anuncio extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'msg_anuncio';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"nome" 				=> NULL,
				"texto" 			=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
		
}//fim classe home

?>