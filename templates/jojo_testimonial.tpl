{if $testimonial}

<p>{$testimonial.tm_body}</p>
<strong>{$testimonial.name}</strong>

{elseif $maintestimonials}

{if $content}{$content}{/if}
{foreach from=$maintestimonials item=t}
<h3><a href="{$t.url}">{$t.name}</a></h3>
{$t.tm_body|truncate:200}
{if $t.tm_body|truncate:200 != $t.tm_body}<br /><a href="{$t.url}">read full testimonial...</a>{/if}
{/foreach}

{/if}