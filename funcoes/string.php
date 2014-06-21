<?php
function limitar($string, $tamanho, $encode = 'UTF-8') {
	if( strlen($string) > $tamanho )
		$string = mb_substr($string, 0, $tamanho - 3, $encode) . '...';
	else
		$string = mb_substr($string, 0, $tamanho, $encode);

	return $string;
}

function contatador(){
	$tag = new tags();

		$tag->inprime('
				<div class="span12" align="LEFT"><h5>Visitantes</h5>
					<script type="text/javascript" src="http://counter3.statcounterfree.com/private/counter.js?c=e1a2606a166e15b5deb0a15f9ac479ea">
					</script>
		
					<a href="http://www.webcontadores.com/geozoom.php?c=e1a2606a166e15b5deb0a15f9ac479ea&amp;base=counter3&amp;type_clic=1" target="_blank">
					</a>
					<img style="border:none" src="http://counter3.statcounterfree.com:8080/private/pointeur/pointeur.gif?|e1a2606a166e15b5deb0a15f9ac479ea|768*1366|pt|24|1402530095|0fedbf0cbe3110c52a1739a2d3e4704e|computer|windows|7|chrome|35|Brazil|BR|-10.000000|-55.000000||Netnt+Sistemas+e+Informatica+Ltda|-10800|1|1402530082|ok|http%3A//helprpg.com.br/index.php|http%3A//helprpg.com.com.br/index.php|js|177.84.251.220|||&amp;init=1402530095272" border="0" width="1" height="1">
				</div>
				
				');
	
}

?>