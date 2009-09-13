<div class="testimonial">
  <p>{if $testimonial.tm_desc}{$testimonial.tm_desc}{else}{$testimonial.tm_body|truncate:200}{/if}<br />
  <em>{$testimonial.tm_contact}</em><br />
  <strong>{if $testimonial.tm_url}<a href="{$testimonial.tm_url}" target="new" rel="nofollow">{/if}{$testimonial.tm_name}{if $testimonial.tm_url}</a>{/if}</strong>
  </p>
</div>