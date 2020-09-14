@php
$postID = $ppost->ID;

$thumb = get_the_post_thumbnail_url( $postID, 'full' );
$thumb = aq_resize( $thumb, 100, 62, true, true, true );

$title = $ppost->post_title;
$link  = get_the_permalink( $postID );

$noThumb = '';
if ( !$thumb ) {
  $noThumb = ' no-image';
}
@endphp

<article {{ post_class( '', $postID ) }}>
  <a class="thumb-link" href="{{ $link }}" rel="bookmark" title="{{ $title }}">
    <div class="post-thumbnail{{ $noThumb }}">
      @if ( $thumb )
        <img src="{{ $thumb }}" alt="{{ $title }}">
      @endif
    </div>
  </a>
  <header>
    <div class="post-content">
      <a href="{{ $link }}" rel="bookmark" title={{ $title }}><h2 class="post-title">{{ $title }}</h2></a>
    </div>
  </header>
</article>
