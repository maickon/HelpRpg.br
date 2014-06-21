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

class armaduras extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'armaduras';
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
				"lv"		 			=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
	
	function exibir_armaduras($tipo){
		switch($tipo):
			case 'comum':
				$this->extras_select = utf8_decode("ORDER BY rand() limit 0,3");
				break;
			
			case 'magicas':
				$this->extras_select = utf8_decode("WHERE dominio = 'Publico' AND tipo='Armadura M�gica' ORDER BY rand() limit 0,3");
				break;
		endswitch;
		return $this->seleciona_tudo($this);
	}

	function exibir_categoria_armaduras($categoria){
		switch($categoria):
			case 'leves':
				$this->extras_select = utf8_decode("WHERE categoria = 'Armaduras Leves' ORDER BY rand() limit 0,3");
				break;
			
			case 'medias':
				$this->extras_select = utf8_decode("WHERE categoria = 'Armaduras M�dias' ORDER BY rand() limit 0,3");
				break;
				
			case 'pesadas':
				$this->extras_select = utf8_decode(" WHERE categoria = 'Armaduras Pesadas' ORDER BY rand() limit 0,3");
				break;
				
			case 'todos':
				$this->extras_select = utf8_decode("ORDER BY rand() limit 0,3");
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
				$tag->inprime('Esta categoria de armadura n�o consta em nosso banco de dados.');
			$tag->close('div');
		endif;
		
		return $this->seleciona_tudo($this);
	}
}//fim classe home
 
 
class Armadura_magica extends armaduras{

	private $precoBase;
	private $habilidade;
	
	function getPrecoBase(){
		return $this->precoBase;
	}
	
	function setPrecoBase($preco){
		$this->precoBase = $preco;
	}
	
	function getHabilidade(){
		return $this->habilidade;
	}
	
	function setHabilidade($habilidade){
		$this->habilidade = $habilidade;
	}
	
	function gerarHabilidadeMagica(){
		
		$habilidadeMagica = array(
		"Camuflagem","Fortificação leve","Escorregadia","Sombria","Silenciosa","Resistência à magia (13)","Escorregadia aprimorada",
		"Sombria aprimorada","Silenciosa aprimorada","Resistência a ácido","Resistência a frio","Resistência a eletricidade",
		"Resistência ao fogo","Resistência sônica","Toque espectral","Invulnerabilidade","Fortificação moderada","Resistência à magia (15)",
		"Selvagem","Escorregadia maior","Sombria maior","Silenciosa maior","Resistência a ácido aprimorada","Resistência ao frio aprimorada",
		"Resistência à eletricidade aprimorada","Resistência ao fogo aprimorada","Resistência sônica aprimorada","Resistência à magia (17)",
		"Forma etéria","Controlar mortos-vivos","Fortificação pesada","Resistência à magia (19)","Resistência a ácido  maior",
		"Resistência ao frio maior","Resistência à eletricidade maior","Resistência ao fogo maior","Resistência sônica maior",
		"Resistência à magia (21)","Armadura do Urso","Armadura do Touro","Armadura do Gato");
		
		$tamanho  = count($habilidadeMagica);
		$escolido = rand(0, $tamanho-1);
		
		switch($habilidadeMagica[$escolido]){
		
		case "Camuflagem":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 2700;
			break;
			
		case "Fortificação leve":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 2000;
			break;
			
		case "Escorregadia":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 3750;
			break;
			
		case "Sombria":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 3750;
			break;
			
		case "Silenciosa":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 8000;
			break;
			
		case "Resistência à magia (13)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 15000;
			break;
			
		case "Escorregadia aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 15000;
			break;
			
		case "Sombria aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 15000;
			break;
			
		case "Silenciosa aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência a ácido":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência a frio":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência a eletricidade":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência ao fogo":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência sônica":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Toque espectral":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Invulnerabilidade":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Fortificação moderada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência à magia (15)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Selvagem":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Escorregadia maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 33750;
			break;
			
		case "Sombria maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 33750;
			break;
			
		case "Silenciosa maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 33750;
			break;
			
		case "Resistência a ácido aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência ao frio aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
		
		case "Resistência à eletricidade aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência ao fogo aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência sônica aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência à magia (17)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 32000;
			break;
			
		case "Forma etéria":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 49000;
			break;
			
		case "Controlar mortos-vivos":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 49000;
			break;

		case "Fortificação pesada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 50000;
			break;
			
		case "Resistência à magia (19)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 50000;
			break;
			
		case "Resistência a ácido  maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência ao frio maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência à eletricidade maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência ao fogo maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência sônica maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência à magia (21)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Armadura do Urso":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Armadura do Touro":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Armadura do Gato":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
		}
	}
	
	function gerarPrecoTotal(){
		return ($this->precoBase);
	}

}

?>