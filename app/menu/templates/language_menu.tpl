<div class="language-bar">
	{foreach from=$lang_link item=link}
	<a href="/{$link.lang}/{$link.uri}"><img src="/img/{$link.lang}.png" alt="{$link.lang}" /></a>	
	{/foreach}
</div>