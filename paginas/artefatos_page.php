<?php
$tag = new tags();
$tag->open('div','class="countainer"');
		$tag->open('div','class="span12"');
			artefatosMenu();
			if(!isset($_POST["listar"]))apresentacaoArtefatos();
		$tag->close('div');
$tag->close('div');
?>