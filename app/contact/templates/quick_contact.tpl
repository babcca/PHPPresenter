<div class="box">
	<h1>{$trans.more_information}</h1>
	<br />
	<address>
	{foreach from=$contact item=val key=key}
		<img src="/img/{$key}.png" title="{$trans.$key}" alt="{$trans.$key}"/> 
		{if $key == 'mail'}{mailto address=$val encode="hex"}{else}{$val}{/if}<br/>
	{/foreach}
	</address>
</div>