{{--
  Title: Hero Images
  Description: Display Team Block
  Category: ava_block_category
  Icon: admin-comments
  Keywords: team, our, members
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

$slides = $flds[ 'slides' ];

$sectionTitle = $secProp[ 'section_title' ];
$componentVars = [
  'id'              => $block[ 'id' ],
  'classes'         => $block[ 'classes' ],
  'slug'            => $block[ 'slug' ],
  'other_classes'   => " {$other_classes}",
  'title'           => $sectionTitle,
  'backImg'         => $image,
  'no_title'         => 1,
];
@endphp

@component( 'comps.blocks.blocks', $componentVars )
  <div class="hero-slides-wrapper">
    <div class="hero-slides">
      @foreach ( $slides as $slide )
        @php
        $image  = $slide[ 'image' ][ 'url' ];
        $image  = aq_resize( $image, 1920, 1080, false, true, true );
        @endphp
        <div class="hero-slide">
          <div class="image" style="background-image: url( '{{ $image }}' );"></div>
        </div>
      @endforeach
    </div>
    <div class="hero-slides-content">
      @foreach ( $slides as $slide )
        @php
        $title      = $slide[ 'title' ];
        $text       = $slide[ 'text' ];
        $link       = $slide[ 'link' ];
        $btnLink    = $link[ 'url' ];
        $btnType    = 'outline';
        $btnTitle   = $link[ 'title' ];
        $btnTarget  = $link[ 'target' ];
        @endphp
        <div class="hero-slide">
          <div class="hero-slide-wrapper">
            <div class="title">{{ $title }}</div>
            <div class="text">{{ $text }}</div>
            @include( 'partials.buttons.btn' )
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endcomponent
