<div class="menu">
	<ol id="cufon-menu">
		{foreach from=$menu item=menu_item}
			<li><a href="/{$menu_item.lang}/{$menu_item.uri}/">{$menu_item.title}</a></li>
		{/foreach}
	</ol>
</div>
{*a href="?app=index&method=clanek&id={$menu_item.uri}&lang={$menu_item.lang}">*}