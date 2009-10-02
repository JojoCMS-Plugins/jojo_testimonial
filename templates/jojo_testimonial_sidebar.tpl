<div class="testimonial">
  <p>{if $testimonial.tm_desc}{$testimonial.tm_desc}{else}{$testimonial.tm_body|truncate:200}{/if}<br />
  <em>{$testimonial.tm_contact}</em><br />
  <strong>{if $testimonial.url}<a href="{$testimonial.url}">{/if}{$testimonial.tm_name}{if $testimonial.url}</a>{/if}</strong>
  </p>
</div>