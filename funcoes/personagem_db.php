<?php
function itensInputConjunto($tag){
		$tag->open('div','class="span12 white"');
			$tag->open('ul','class=""');
				$tag->open('div','class="span3"');	
						input_classe($tag, $objeto_edit=null, $disabled=null);
				$tag->close('div');
						
				$tag->open('div','class="span3"');	
					input_raca($tag, $objeto_edit=null, $disabled=null);
				$tag->close('div');
				
				$tag->open('div','class="span3"');	
					itemSelectNivel();					
				$tag->close('div');
				
				$tag->open('div','class="span2"');
					itemBotaoDB();
				$tag->close('div');
			$tag->close('ul');
		$tag->close('div');
}

function itemBotaoDB(){
	$tag = new tags();	
		$tag->open('li','class="bullet-item"');
			$tag->open('label');
				$tag->inprime('Clique aqui!');
			$tag->close('label');
			$tag->open('input','name="botao" type="submit" value="Visualizar Chefe de fase" class="btn"');
		$tag->close('li');
}
?>