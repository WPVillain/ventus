{{--
  Title: Contact Form
  Description: Contact form
  Category: ava_block_category
  Icon: admin-comments
  Keywords: contact, form
  Mode: edit
  Align: full
  PostTypes: page post
  SupportsAlign: true
  SupportsMode: true
  SupportsMultiple: true
--}}

@php
$flds  = get_fields(  );
$secProp = $flds[ 'sec_prop' ];

$active = $secProp[ 'active' ];

if ( ! $active ) {
  return;
}

$contactFormID  = $flds[ 'contact_form_id' ];
$backImg        = $flds[ 'background_image' ];

if ( !$contactFormID ) {
  return;
}

$getOptions = App::getOptions(  );

$contactDetails = $getOptions[ 'contact_details' ][ 'contact_details' ];
$openingHours = $getOptions[ 'opening_hours' ][ 'opening_hours' ];

$contactFormTitle = $getOptions[ 'contact_details' ][ 'contact_form_title' ];
$contactFormText = $getOptions[ 'contact_details' ][ 'contact_form_text' ];

$sectionTitle = $flds[ 'section_title' ];

$componentVars = [
  'id'              => $block[ 'id' ],
  'classes'         => $block[ 'classes' ],
  'slug'            => $block[ 'slug' ],
  'other_classes'   => " {$other_classes}",
  'title'           => $sectionTitle,
  'backImg'         => $image,
  'has_deco'        => 1
];
@endphp

@component( 'comps.blocks.blocks', $componentVars )
  @foreach ( $contactDetails as $loc )
    @php
    $location   = $loc[ 'location' ];
    $street     = $loc[ 'street' ];
    $locality   = $loc[ 'locality' ];
    $post_code  = $loc[ 'post_code' ];
    $lat        = $loc[ 'latitude' ];
    $lng        = $loc[ 'longitude' ];
    $contacts   = $loc[ 'contacts' ];

    $telNums     = [  ];
    $emails     = [  ];

    foreach ( $contacts as $contact ) {
      $typeVal      = $contact[ 'type' ][ 'value' ];
      $typeLab      = $contact[ 'type' ][ 'label' ];
      $cc           = $contact[ 'country_code' ];
      $num          = $contact[ 'number' ];
      $numNoSpace   = preg_replace( '/[^0-9]/', '', $num );
      $email        = $contact[ 'email' ];

      if ( $typeVal != 'email' ) {
        array_push( $telNums, [ 'href' => "+{$cc}{$numNoSpace}", 'name' => "+{$cc} {$num}" ]);
      } else {
        array_push( $emails, $email);
      }
    }
    @endphp

    <div class="flex-wrapper">
      <div class="location-address{{ $loop->last ? ' last-item' : '' }}">
        <div class="contact-opening">
          <h3 class="contact-form-title">{{ $contactFormTitle }}</h3>
          <p class="contact-form-text">{{ $contactFormText }}</p>
          <div class="shop-details">
            <div class="phone-numbers">
              <div class="icon"><img src="@asset( 'images/icons/telephone.png' )" alt="telephone icon"></div>
              @foreach ( $telNums as $telNum )
                <span class="contact-detail"><a href="tel:{{ $telNum[ 'href' ] }}">{{ $telNum[ 'name' ] }}</a></span>
              @endforeach
            </div>
            <div class="email-addresses">
              <div class="icon"><img src="@asset( 'images/icons/email.png' )" alt="email icon"></div>
              @foreach ( $emails as $email )
                <span class="contact-detail"><a href="mailto:{{ $email }}">{{ $email }}</a></span>
              @endforeach
            </div>
            <div class="brick-address">
              <div class="icon"><img src="@asset( 'images/icons/shop.png' )" alt="shop icon"></div>
              <address class="contact-detail">{{ $street }} {{ $locality }}, {{ $post_code }} {{ $location }}</address>
            </div>
            @include ( 'partials.opening-hours' )
          </div>
        </div>
      </div>

      @if ( $loop->first )
        <div class="keen-contact-form" style="background-image: url( '{{ $backImg }}' );">
          @php
          echo do_shortcode( "[formidable id={$contactFormID}]" );
          @endphp
        </div>
      @endif
    </div>
    <div id="mapid_{{ $mapID }}" style="height: 400px;"></div>
    <script>
      jQuery( document ).ready( function( $ ) {
        var map_{{ $mapID }} = L.map( 'mapid_{{ $mapID }}' ).setView( [ {{ $lat }}, {{ $lng }} ], 16 );
        var mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';


        L.tileLayer(
          'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            //minZoom: 11,
            //maxZoom: 11,
          }).addTo(map_{{ $mapID }});

        var agIcon = L.icon({
          iconUrl: "@asset( 'images/icons/map-marker.png' )",
          iconSize: [ 47, 57 ],
          iconAnchor: [ 23, 57 ]
        });

        $( '.get-in-touch .btn' ).on( 'click', function(  ) {
          let $id = $( this ).data( 'id' );
          $( '.contact-map' ).css( 'display', 'none' );
          $( '#' + $id ).css( 'display', 'block' )
          setTimeout(function() {
            map_{{ $mapID }}.invalidateSize(false);
          }, 400);
        } );

        {{--
        --}}

        marker = new L.marker( [ {{ $lat }}, {{ $lng }} ], {icon: agIcon} ).addTo( map_{{ $mapID }} );
      } );
    </script>
  @endforeach
@endcomponent
