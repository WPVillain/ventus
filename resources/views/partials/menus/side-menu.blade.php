@php
$contactDetails   = $opts[ 'contact_details' ];
$phones           = $contactDetails[ 'phone_numbers' ];
$emails           = $contactDetails[ 'emails' ];
$lat              = $contactDetails[ 'location_latitude' ];
$lng              = $contactDetails[ 'location_longitude' ];
@endphp

<div class="side-menu">
  <button class="close btn small"><i class="fas fa-times"></i></button>
  <ul class="phone-numbers">
    @each ( 'comps.phones', $phones, 'phone' )
  </ul>
  <ul class="email-addresses">
    @each ( 'comps.emails', $emails, 'email' )
  </ul>

  @include ( 'partials.map' )
  @include ( 'partials.menus.social-menu', [ 'position' => 'side-menu' ] )
  <div class="underlay"></div>
</div>
