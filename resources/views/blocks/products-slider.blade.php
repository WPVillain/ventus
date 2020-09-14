{{--
  Title: Products Slider
  Description: Products slider
  Category: ava_block_category
  Icon: admin-comments
  Keywords: products, slider
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

$sectionTitle = $flds[ 'section_title' ];


$latest   = $flds[ 'select_latest' ];
$limit    = $flds[ 'limit_products_to' ];
$products = $flds[ 'chosen_products' ];

if ( $products ) {
  $products = implode( ', ', $products );
}

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
  <div class="products-slides">
    @if ( $latest == 'latest' )
      @php
      echo do_shortcode( "[products limit='{$limit}' columns='1' orderby='id' order='DESC' visibility='visible']" );
      @endphp
    @elseif ( $latest == 'manual' )
      @php
      echo do_shortcode( "[products ids='{$products}' columns=1]" );
      @endphp
    @endif
  </div>
@endcomponent
