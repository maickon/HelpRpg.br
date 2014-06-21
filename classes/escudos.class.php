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

class escudos extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'escudos';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"nome" 					=> NULL,
				"dominio" 				=> NULL,
				"categoria" 			=> NULL,
				"tipo"	 				=> NULL,
				"custo" 				=> NULL,
				"bonusNaCa" 			=> NULL,
				"destrezaMaxima" 		=> NULL,
				"penalidadeNaPericia" 	=> NULL,
				"falhaDeMagiaArcana" 	=> NULL,
				"deslocamentoMedio" 	=> NULL,
				"deslocamentoPequeno" 	=> NULL,
				"peso" 					=> NULL,
				"descricao" 			=> NULL,
				"lv" 					=> NULL
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
	
	function exibir_escudos($categoria){
		switch($categoria):
				case 'leves':
					$this->extras_select = utf8_decode("WHERE categoria = 'Escudos Leves' ORDER BY rand() limit 3");
					break;
				
				case 'medias':
					$this->extras_select = utf8_decode("WHERE categoria = 'Escudos Médio' ORDER BY rand() limit 3");
					break;
					
				case 'pesadas':
					$this->extras_select = utf8_decode(" WHERE categoria = 'Escudos Pesados' ORDER BY rand() limit 3");
					break;
					
				case 'todos':
					$this->extras_select = utf8_decode("ORDER BY rand() limit 3");
					break;
			endswitch;
			$this->seleciona_tudo($this);
			$this->retorna_dados();
			if($this->linhas_afetadas == 0):
				$tag = new tags();
				$tag->open('div','class="alert alert-error"');
					$tag->open('button','type="button" class="close" data-dismiss="alert"');
						$tag->inprime('&times;');
					$tag->close('button');
					$tag->open('h4');
						$tag->inprime('Desculpe!');
					$tag->close('h4');	
					$tag->inprime('Esta categoria de escudo não consta em nosso banco de dados.');
				$tag->close('div');
			endif;
			
		return $this->seleciona_tudo($this);
	}				
}//fim classe home
?>