@php
$postID = $ppost->ID;
$postExcerpt = get_the_excerpt( $postID );

$thumb = get_the_post_thumbnail_url( $postID, 'full' );
$thumb = aq_resize( $thumb, 550, 340, true, true, true );

$link = get_the_permalink( $postID );

$noThumb = '';
if ( !$thumb ) {
  $noThumb = ' no-image';
}
@endphp

<article {{ post_class( '', $postID ) }}>
  <div class="article-slide-wrapper">
    <div class="article-slide-width">
      <div class="post-thumbnail{{ $noThumb }}">
        @if ( $thumb )
          <img src="{{ $thumb }}" alt="">
        @endif
      </div>
      <header>
        <div class="post-content">
          <h2 class="post-title">{{ $ppost->post_title }}</h2>
          @include('partials/entry-meta')
          <div class="entry-content">{!! $postExcerpt !!}</div>
        </div>
        @include (
          'comps.btns.btn',
          [
            'btnTitle'  => 'read more',
            'btnLink'   => $link,
            'btnType'   => 'outline',
          ]
        )
      </header>
    </div>
  </div>
</article>
