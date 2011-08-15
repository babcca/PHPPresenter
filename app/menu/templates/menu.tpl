<div class="menu">
	<ol id="cufon-menu">
		{foreach from=$menu item=menu_item}
			<li><a href="/{$menu_item.lang}/{$menu_item.uri}/">{$menu_item.menu_title}</a></li>
		{/foreach}
	</ol>
</div>