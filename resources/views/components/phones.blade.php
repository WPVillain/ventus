@php
$typeValue  = $phone[ 'type' ][ 'value' ];
$typeLabel  = $phone[ 'type' ][ 'label' ];
$cc         = $phone[ 'cc' ];
$number     = $phone[ 'number' ];
@endphp

<li class="detail-wrapper">
  <span class="icon"><i class="fas {{ $typeValue }}"></i></span>
  <a href="tel:+{{ $cc }}{{ $number }}" title="{{ $typeLabel }}">
    <span class="cc">+{{ $cc }}</span>
    <span class="number">{{ $number }}</span>
  </a>
</li>
