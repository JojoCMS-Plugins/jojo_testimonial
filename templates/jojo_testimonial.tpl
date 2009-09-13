{if $testimonial}

<p>{$testimonial.tm_body}</p>
<strong>{$testimonial.tm_name}</strong>

{elseif $maintestimonials}
{$content}
{section name=t loop=$maintestimonials}
<h3><a href="{$maintestimonials[t].url}">{$maintestimonials[t].tm_name}</a></h3>
{$maintestimonials[t].tm_body|truncate:200}
{if $maintestimonials[t].tm_body|truncate:200 != $maintestimonials[t].tm_body}<br /><a href="{$maintestimonials[t].url}">read full testimonial...</a>{/if}
{/section}

{else}

{/if}