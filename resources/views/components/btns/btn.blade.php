@if ( $btnLink )
  <div class="btn-wrap">
    <a href="{{ $btnLink }}"{{ $id ? "id={$id}" : '' }} class="btn btn-{{ $btnType ? $btnType : 'primary' }} {{ $classes }}"@if ( $btnID ) data-id="{{ $btnID }}" @endif>{{ $btnTitle ? $btnTitle : 'learn more' }}</a>
  </div>
@endif
