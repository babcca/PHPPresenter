<h1>{$images.0.title}</h1>
<p>{$images.0.text}</p>
<div id="gallery" class="gallery" >
   {foreach from=$images item=photo}
   <a href="/{$photo.big}" title="{$photo.desc}" rel="lightbox[roadtrip]">
      <img src="/{$photo.small}" alt="{$photo.desc}" />
   </a>
   {/foreach}
</div>
