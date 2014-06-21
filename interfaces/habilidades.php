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

interface habilidadesBasicasIinterface {
	function habilidadeNormal(); //rola-se 4d6 descartando o menor...
	function habilidade85pts();// distribui-se 85pts na ficha...
	function habilidadeForte();// habilidades entre 18-30
	function habilidadeBrutal();// habilidades entre 30-52
	function habilidadeHardcore();// habilidades entre 52-70
	function habilidadeDeus();// habilidades entre 70-100
}

?>