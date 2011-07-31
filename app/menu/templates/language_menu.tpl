<div class="language-bar">
	{foreach from=$lang_link item=link}
	<a href="?app=index&method=clanek&id={$link.uri}&lang={$link.lang}"><img src="/img/{$link.lang}.png" /></a>	
	{/foreach}
</div>