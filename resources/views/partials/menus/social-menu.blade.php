@php
$socials = $opts[ 'social_media' ][ 'social_icons' ];
@endphp

<div class="social-menu social-{{ $position }}">
  <ul class="social-links">
    @each( 'comps.social-links', $socials, 'social' )
  </ul>
</div>
