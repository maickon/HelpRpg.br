<?php

function rotear_pagina($pagina){
	if(isset($pagina)):
		switch($pagina):
			case PAGEFICHAS: loadPage(PAGEFICHASFILE,'index');
			break;
			
			case PAGEPOST: loadPage(PAGEPOSTFILE,'index');
			break;
			
			case PAGEBLOG: loadPage(PAGEBLOGFILE,'index');
			break;
			
			case PAGEMONSTROS: loadPage(PAGEMONSTROSFILE,'index');
			break;
			
			case MODULOADM: loadModuo(MODULOUSUARIO,'login');
			break;
			
			case MODULOCLIENTE: loadModuo(MODULOUSUARIOCLIENTE,'login');
			break;
			
			case MODULOADMCLIENTE: loadModuo(MODULOUSUARIOCLIENTE,'incluir');
			break;
			
			case PAGEMONTARFICHA: loadPage(PAGEMONTARFICHAFILE,'index');
			break;
			
			case PAGEHISTORIAS: loadPage(PAGEHISTORIASFILE,'index');
			break;
			
			case PAGEHISTORIASPLAY: loadPage(PAGEHISTORIASPLAYFILE,'index');
			break;
			
			case PAGEAVENTURAS: loadPage(PAGEAVENTURASFILE,'index');
			break;
			
			case PAGEARMAS: loadPage(PAGEARMASFILE,'index');
			break;
			
			case PAGEARMADURAS: loadPage(PAGEARMADURASFILE,'index');
			break;
			
			case PAGEARMADURASMAGICAS: loadPage(PAGEARMADURASMAGICAFILE,'index');
			break;
			
			case PAGEARTEFATOS: loadPage(PAGEARTEFATOSFILE,'index');
			break;
			
			case PAGEESCUDOS: loadPage(PAGEESCUDOSFILE,'index');
			break;
			
			case PAGEESCUDOSMAGICOS: loadPage(PAGEESCUDOSMAGICOSFILE,'index');
			break;
			
			case PAGESOBRE: loadPage(PAGESOBREFILE,'index');
			break;
			
			case PAGECADASTRO: loadPage(PAGECADASTROFILE,'index');
			break;
			
			case PAGEBOSS: loadPage(PAGEBOSS,'index');
			break;
			
			case PAGEFICHAMONTADA: loadPage(PAGEFICHAMONTADA,'ficha_montada');
			break;

			default: loadPage('home_page','index');		
		endswitch;
	else:
		loadPage('home_page','index');
	endif;
}

function redireciona($url=''){
	header("Location:".$url);
}
?>