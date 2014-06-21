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

class usuarioAventureiro extends usuario {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'usuario_aventureiro';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"nome" 			=> NULL,
				"email"			=> NULL,
				"login"			=> NULL,
				"senha"			=> NULL,
				"ativo"			=> null,
				"tipo"			=> 'cliente',
				"data_cadastro"	=> NULL,
				"data_inicio"	=> NULL
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct

	public function logar($objeto){
		$objeto->extras_select = " WHERE login = '".$objeto->getValor('login')."' AND
		senha = '".codificarSenha($objeto->getValor('senha'))."' AND ativo = 's' AND tipo = 'cliente'";
		$this->seleciona_tudo($objeto);
		
		$atual = retornar_data_atual();
		$resp = $this->retorna_dados();
		$data_inicio = date("d/m/Y",strtotime($resp->data_inicio));
		$fim = retornar_data_final(date("d/m/Y",strtotime($resp->data_inicio)));
		$sessao = new Sessao();
		
		if($this->linhas_afetadas == 1 && $data_inicio == '31/12/1969'):	
			$usu_logado = $objeto->retorna_dados();
			$sessao->setVar('id_user', $usu_logado->id);
			$sessao->setVar('nome_user', $usu_logado->nome);
			$sessao->setVar('login_user', $usu_logado->login);
			$sessao->setVar('tipo_user', $usu_logado->tipo);
			$sessao->setVar('logado',TRUE);
			$sessao->setVar('ip', $_SERVER['REMOTE_ADDR']);
			return TRUE;
		elseif($this->linhas_afetadas == 1 && $atual >= $fim):
			$resp->ativo_pago = 's';
			$sessao->destroy(TRUE);
			return FALSE;
		elseif($this->linhas_afetadas == 1):
			$usu_logado = $objeto->retorna_dados();
			$sessao->setVar('id_user', $usu_logado->id);
			$sessao->setVar('nome_user', $usu_logado->nome);
			$sessao->setVar('login_user', $usu_logado->login);
			$sessao->setVar('tipo_user', $usu_logado->tipo);
			$sessao->setVar('logado',TRUE);
			$sessao->setVar('ip', $_SERVER['REMOTE_ADDR']);
			return TRUE;
		else:
			$sessao->destroy(TRUE);
			return FALSE; 
		endif;
	}//fim logar
	
	function logoff(){
		$sessao = new Sessao();
		$sessao->destroy(TRUE);
		redireciona('?p=cliente&erro=1');
	}//fim logoff

}//fim classe usuarioAdmin

?>