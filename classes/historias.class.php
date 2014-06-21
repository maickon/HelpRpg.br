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

class historias extends base {
	private $nome;
	private $sexo;
	public function __construct($campos = array()){
		parent::__construct();
		$this->gerarSexo();
		$this->gerarNome($this->getSexo());
		$this->tabela = 'historias';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"nome" 		=> NULL,
				"inicio" 	=> NULL,
				"meio" 		=> NULL,
				"fim" 		=> NULL,
				"completa" 	=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
	
	function getNome(){
		return $this->nome;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function getSexo(){
		return $this->sexo;
	}
	
	function setSexo($sexo){
		$this->sexo = $sexo;
	}

	
	function historia_completa(){
	
		$historia = '';
		$this->del_campo('inicio');
		$this->del_campo('meio');
		$this->del_campo('fim');
		$this->extras_select = utf8_decode("WHERE completa!= ' ' ORDER BY RAND( )  LIMIT 1");
		$this->seleciona_campos($this);
		while($objeto_resp = $this->retorna_dados()):
			$historia = $objeto_resp->completa;
			$this->nome = $objeto_resp->nome;
		endwhile;
		return $historia;
	}
	
	function inicio(){
		$inicio = '';
		$this->del_campo('meio');
		$this->del_campo('fim');
		$this->del_campo('completa');
		$this->extras_select = utf8_decode("WHERE completa = ' ' AND inicio != ' ' ORDER BY RAND( )  LIMIT 1");
		$this->seleciona_campos($this);
		while($objeto_resp = $this->retorna_dados()):
			$inicio = $objeto_resp->inicio;
		endwhile;
		return $inicio;
	}
	
	function meio(){
		$meio = '';
		$this->del_campo('inicio');
		$this->del_campo('fim');
		$this->del_campo('completa');
		$this->extras_select = utf8_decode("WHERE completa = ' ' AND meio != ' ' ORDER BY RAND( )  LIMIT 1");
		$this->seleciona_campos($this);
		while($objeto_resp = $this->retorna_dados()):
			$meio = $objeto_resp->meio;
		endwhile;
		return $meio;
	}
	
	function fim(){
		$fim = '';
		$this->del_campo('inicio');
		$this->del_campo('meio');
		$this->del_campo('completa');
		$this->extras_select = utf8_decode("WHERE completa = ' ' AND fim != ' ' ORDER BY RAND( )  LIMIT 1");
		$this->seleciona_campos($this);
		while($objeto_resp = $this->retorna_dados()):
			$fim = $objeto_resp->fim;
		endwhile;
		return $fim;
	}
	
	function gerarSexo(){
		$valor = rand(1,2);
		if($valor == 1){
			$sexo = 'masculino';
		}else {
			$sexo = 'feminino';
		}
		$this->sexo = $sexo;
	}
	
	function gerarNome($sexo){
		include('classes/nomes.php');	
		if($sexo == 'masculino'){
			$posicao = rand(0,count($nomesMasculinos)-1);
			$this->nome = $nomesMasculinos[$posicao];
		}elseif($sexo == 'feminino'){
			$posicao = rand(0,count($nomesFemininos)-1);
			$this->nome = $nomesFemininos[$posicao];
		}
	}
}//fim classe home

?>