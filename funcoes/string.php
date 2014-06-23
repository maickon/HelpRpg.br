<?php
function limitar($string, $tamanho, $encode = 'UTF-8') {
	if( strlen($string) > $tamanho )
		$string = mb_substr($string, 0, $tamanho - 3, $encode) . '...';
	else
		$string = mb_substr($string, 0, $tamanho, $encode);

	return $string;
}

function plugins(){
	$tag = new tags();
	$tag->open('div','class="row"');
		$tag->open('div','class="span3"');
			exibir_titulo($page='home_page',$classe='home_page');
		$tag->close('div');
		
		$tag->open('div','class="span3" align="right"');
			$tag->open('h5');
				$tag->inprime('Visitantes');
			$tag->close('h5');
			$tag->open('script','type="text/javascript" src="http://counter3.statcounterfree.com/private/counter.js?c=e1a2606a166e15b5deb0a15f9ac479ea"');
			$tag->close('script');
		$tag->close('div');
	$tag->close('div');		
}

function social_plugin_group(){
	$tag = new tags();
	$tag->open('div','class="row"');
		$tag->open('div','class="span6"');
			$tag->inprime('Aconpanhe o Help RPG nas rede sociais.');
		$tag->close('div');
		$tag->open('div','class="span2" align="right"');
			social_plugin_google_plus_one();
		$tag->close('div');
		
		$tag->open('div','class="span2" align="right"');
			social_plugin_like_button_facebook();
		$tag->close('div');
		
		$tag->open('div','class="span6" align="left"');
			social_plugin_google_selo();
		$tag->close('div');
	$tag->close('div');
}

function social_plugin_google_plus_one(){
	//<!-- Posicione esta tag onde você deseja que o botão +1 apareça. -->
	$tag = new tags();
	$tag->open('div','class="g-plusone" data-annotation="inline" data-width="300"');
	$tag->close('div');
	
	//<!-- Posicione esta tag depois da última tag do botão +1. -->
	$tag->open('script','type="text/javascript"');
	
		$script ="window.___gcfg = {lang: 'pt-BR'};
		
		(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/platform.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();";
		
		$tag->inprime($script);
	$tag->close('script');
}

function social_plugin_google_selo(){
	$tag = new tags();
	//<!-- Posicione esta tag onde você deseja que o widget apareça. -->
	$tag->open('div','class="g-person" data-width="450" data-href="//plus.google.com/u/0/102190444979303235797" data-layout="landscape" data-rel="author"');
	$tag->close('div');
	//<!-- Posicione esta tag depois da última tag do widget. -->
	$tag->open('script','type="text/javascript"');
	$script ="window.___gcfg = {lang: 'pt-BR'};
		
		(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/platform.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();";
	$tag->inprime($script);
	$tag->close('script');
}

function social_plugin_like_button_facebook(){
	$tag = new tags();
	$tag->open('iframe','src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FHelp-RPG%2F539011612872186%3Fref_type%3Dbookmark&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"');
	$tag->close('iframe');
}

function social_plugin_google_share(){
	//<!-- Posicione esta tag onde você deseja que o botão compartilhar apareça. -->
	$tag = new tags();
	$tag->open('div','class="g-plus" data-action="share" data-height="24"');
	$tag->close('div');
	
	//<!-- Posicione esta tag depois da última tag do compartilhar. -->
	$tag->open('script','type="text/javascript"');
	$script  = "window.___gcfg = {lang: 'pt-BR'};
	
	(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/platform.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})()";
	$tag->inprime($script);
	$tag->close('script');
}

function social_plugin_share(){
	$tag = new tags();
	$tag->open('div','id="fb-root"');
	$tag->close('div');
	
	$tag->open('script');
	$js_src = 'js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0';
	$script = "(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		.$js_src.	
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'))";
	$tag->close('script');
}

function social_plugin_fb_share($id){
	$tag = new tags();
	social_plugin_share();
	$tag->open('iframe','src="//www.facebook.com/plugins/like.php?href=http://www.helprpg.com.br/?p=post&amp;id='.$id.'k&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"');
	$tag->close('iframe');
	//$tag->open('div','class="fb-share-button" data-href="http://www.helprpg.com.br/?p=post&amp;id='.$id.'" data-type="button_count"');
	//$tag->close('div');
}

function social_share_plugins($id){
	$tag = new tags();
	$tag->open('div','class="row"');
		$tag->open('div','class="span12"');
			$tag->open('div','class="span4"');
				social_plugin_fb_share($id);
			$tag->close('div');
			
			$tag->open('div','class="span4"');
			social_plugin_google_share();
			$tag->close('div');
		$tag->close('div');
	$tag->close('div');
}
?>