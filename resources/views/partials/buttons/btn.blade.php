@if ( $btnLink )
  <div class="btn-wrap">
    <a href="{{ $btnLink }}" class="btn btn-{{ $btnType ? $btnType : 'primary' }} {{ $classes }}"@if ( $btnTarget) target="_blank" @endif @if ( $btnID ) data-id="{{ $btnID }}" @endif>{{ $btnTitle ? $btnTitle : 'learn more' }}</a>
  </div>
@endif
