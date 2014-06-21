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

class registroDeServico extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->gerarSexo();
		$this->gerarNome($this->getSexo());
		$this->tabela = 'registroDeServico';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"id_usuario" 	=> NULL,
				"descricao" 	=> NULL,
				"preco" 		=> NULL,
				"duracao" 		=> NULL,
				"data_inicio" 	=> NULL,
				"data_termino" 	=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
	
}//fim classe home

?>