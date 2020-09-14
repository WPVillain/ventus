{{--
  Title: Latest Posts
  Description: Latest posts
  Category: ava_block_category
  Icon: admin-comments
  Keywords: latest, posts
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

$numOfPosts = $flds[ 'number_of_posts_to_display' ];
$image      = $flds[ 'image' ];
$image      = aq_resize( $image, 1920, 550, true, true, true );

$args = [
  'post_type'             => 'post',
  'posts_per_page'        => $numOfPosts,
  'ignore_sticky_posts'   => 1
];

$pposts = get_posts( $args );

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
  <div class="posts-wrapper">
    @each( 'comps.post-secs.blog_post-slides', $pposts, 'ppost' )
  </div>
@endcomponent
