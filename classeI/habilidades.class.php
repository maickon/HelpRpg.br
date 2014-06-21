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
require_once 'interfaces/habilidades.php';
class habilidades implements habilidadesBasicasIinterface{
	public $for_;
	public $des_;
	public $con_;
	public $int_;
	public $sab_;
	public $car_;
	public $penalidade;
	
	public function habilidadeNormal(){
		$total_da_rolagem = 0;
		$total_geral = 0;
		
		for($x = 1;$x <= 6;$x++){
			
			$rolagem_1 =  rand(1, 6);
			$rolagem_2 =  rand(1, 6);
			$rolagem_3 =  rand(1, 6);
			$rolagem_4 =  rand(1, 6);
			
			if(($rolagem_1 < $rolagem_2) and ($rolagem_1 < $rolagem_3) and ($rolagem_1 < $rolagem_4)){
				$total_da_rolagem = ($rolagem_2 + $rolagem_3 + $rolagem_4);
			}
			elseif(($rolagem_2 < $rolagem_1) and ($rolagem_2 < $rolagem_3) and ($rolagem_2 < $rolagem_4)){
				$total_da_rolagem = ($rolagem_1 + $rolagem_3 + $rolagem_4);
			}
			elseif(($rolagem_3 < $rolagem_1) and ($rolagem_3 < $rolagem_2) and ($rolagem_3 < $rolagem_4)){
				$total_da_rolagem = ($rolagem_2 + $rolagem_1 + $rolagem_4);
			}
			elseif(($rolagem_4 < $rolagem_1) and ($rolagem_4 < $rolagem_2) and ($rolagem_4 < $rolagem_3)){
				$total_da_rolagem = ($rolagem_2 + $rolagem_3 + $rolagem_1);
			}
			elseif(($rolagem_1 == $rolagem_2)){
				$total_da_rolagem = ($rolagem_2 + $rolagem_3 + $rolagem_4);
			}
			elseif(($rolagem_1 == $rolagem_3)){
				$total_da_rolagem = ($rolagem_2 + $rolagem_3 + $rolagem_4);
			}
			elseif(($rolagem_1 == $rolagem_4)){
				$total_da_rolagem = ($rolagem_2 + $rolagem_3 + $rolagem_4);
			}
			elseif(($rolagem_2 == $rolagem_3)){
				$total_da_rolagem = ($rolagem_2 + $rolagem_1 + $rolagem_4);
			}
			elseif(($rolagem_2 == $rolagem_4)){
				$total_da_rolagem = ($rolagem_2 + $rolagem_1 + $rolagem_3);
			}
			elseif(($rolagem_4 == $rolagem_3)){
				$total_da_rolagem = ($rolagem_2 + $rolagem_1 + $rolagem_4);
			}
			//echo "{$x}- Rolagem: valor tirado: {$total_da_rolagem} <br />";
			if($x == 1){
				if($total_da_rolagem < 10):
					$this->for_ = 10;
				else:
					$this->for_ = $total_da_rolagem;
				endif;
			}
			elseif($x == 2){
				if($total_da_rolagem < 10):
					$this->con_ = 10;
				else:
					$this->con_ = $total_da_rolagem;
				endif;	
			}
			elseif($x == 3){
				if($total_da_rolagem < 10):
					$this->des_ = 10;
				else:
					$this->des_ = $total_da_rolagem;
				endif;
			}
			elseif($x == 4){
				if($total_da_rolagem < 10):
					$this->int_ = 10;
				else:
					$this->int_ = $total_da_rolagem;
				endif;
			}
			elseif($x == 5){
				if($total_da_rolagem < 10):
					$this->sab_ = 10;
				else:
					$this->sab_ = $total_da_rolagem;
				endif;
			}
			elseif($x == 6){
				if($total_da_rolagem < 10):
					$this->car_ = 10;
				else:
					$this->car_ = $total_da_rolagem;
				endif;
			}
			
			$total_geral += $total_da_rolagem;
		}
		
	}

	public function habilidade85pts(){
		
		
	}

	public function habilidadeForte(){// habilidades entre 14-18
		$this->penalidade=4;
		$this->for_ = rand(14,18);
		$this->con_ = rand(14,18);
		$this->des_ = rand(14,18);
		$this->int_ = rand(14,18);
		$this->sab_ = rand(14,18);
		$this->car_ = rand(14,18);
	}

	public function habilidadeBrutal(){//habilidades entre 16-20
		$this->penalidade =6;
		$this->for_ = rand(16,20);
		$this->con_ = rand(16,20);
		$this->des_ = rand(16,20);
		$this->int_ = rand(16,20);
		$this->sab_ = rand(16,20);
		$this->car_ = rand(16,20);
	}

	public function habilidadeHardcore(){// habilidades entre 18-24
		$this->penalidade =8;
		$this->for_ = rand(18,24);
		$this->con_ = rand(18,24);
		$this->des_ = rand(18,24);
		$this->int_ = rand(18,24);
		$this->sab_ = rand(18,24);
		$this->car_ = rand(18,24);
	}

	public function habilidadeDeus(){
		$this->penalidade =10;
		$this->for_ = rand(20,26);
		$this->con_ = rand(20,26);
		$this->des_ = rand(20,26);
		$this->int_ = rand(20,26);
		$this->sab_ = rand(20,26);
		$this->car_ = rand(20,26);
	}

	public function adequarHabilidadeClasse(){
		
		if($this->classe == 'barbaro' || $this->classe == 'barbara'):
			$this->for_ +=0;
			$this->con_ +=0;
			$this->des_ +=0;
			$this->int_ -=rand(1,$this->penalidade); 
			$this->sab_ -=rand(1,$this->penalidade); 
			$this->car_ -=rand(1,$this->penalidade); 
		elseif($this->classe == 'guerreiro' || $this->classe == 'guerreira'):
			$this->for_ +=0;
			$this->con_ +=0;
			$this->des_ +=0;
			$this->int_ -=rand(0,$this->penalidade); 
			$this->sab_ -=rand(1,$this->penalidade); 
			$this->car_ -=rand(1,$this->penalidade);
		elseif($this->classe == 'paladino' || $this->classe == 'paladina'):
			$this->for_ -=rand(1,$this->penalidade);
			$this->con_ +=0;
			$this->des_ -=rand(1,$this->penalidade);
			$this->int_ -=rand(1,$this->penalidade);
			$this->sab_ -=rand(1,$this->penalidade);
			$this->car_ +=0;
		elseif($this->classe == 'monge'):
			$this->for_ -=rand(1,$this->penalidade);
			$this->con_ -=rand(1,$this->penalidade);
			$this->des_ +=0;
			$this->int_ -=rand(1,$this->penalidade);
			$this->sab_ +=0;
			$this->car_ -=rand(1,$this->penalidade);
		elseif($this->classe == 'ladino' || $this->classe == 'ladina'):
			$this->for_ -=rand(1,$this->penalidade);
			$this->con_ -=rand(1,$this->penalidade);
			$this->des_ +=0;
			$this->int_ +=0;
			$this->sab_ -=rand(1,$this->penalidade);
			$this->car_ -=rand(1,$this->penalidade);
		elseif($this->classe == 'clerigo' || $this->classe == 'cleriga'):
			$this->for_ -=rand(1,$this->penalidade);
			$this->con_ -=rand(1,$this->penalidade);
			$this->des_ +=0;
			$this->int_ -=rand(1,$this->penalidade);
			$this->sab_ +=0;
			$this->car_ -=rand(0,$this->penalidade);
		elseif($this->classe == 'bardo'):
			$this->for_ -=rand(1,$this->penalidade);
			$this->con_ -=rand(1,$this->penalidade);
			$this->des_ -=rand(1,$this->penalidade);
			$this->int_ -=rand(1,$this->penalidade);
			$this->sab_ +=0;
			$this->car_ +=0;
		elseif($this->classe == 'feiticeiro' || $this->classe == 'feiticeira'):
			$this->for_ -=rand(1,$this->penalidade);
			$this->con_ +=0;
			$this->des_ -=rand(1,$this->penalidade);
			$this->int_ +=0;
			$this->sab_ +=0;
			$this->car_ +=0;
		elseif($this->classe == 'mago' || $this->classe == 'maga'):
			$this->for_ -=rand(1,$this->penalidade);
			$this->con_ +=0;
			$this->des_ -=rand(1,$this->penalidade);
			$this->int_ +=0;
			$this->sab_ -=rand(1,$this->penalidade);
			$this->car_ -=rand(1,$this->penalidade);
		elseif($this->classe == 'druida'):
			$this->for_ -=rand(1,$this->penalidade);
			$this->con_ +=0;
			$this->des_ -=rand(1,$this->penalidade);
			$this->int_ -=rand(1,$this->penalidade);
			$this->sab_ +=0;
			$this->car_ -=rand(1,$this->penalidade);
		elseif($this->classe == 'ranger'):
			$this->for_ +=0;
			$this->con_ -=rand(1,$this->penalidade);
			$this->des_ -=rand(1,$this->penalidade);
			$this->int_ -=rand(1,$this->penalidade);
			$this->sab_ +=0;
			$this->car_ -=rand(1,$this->penalidade);
		endif;			
	}	
}
?>