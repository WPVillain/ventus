@php
$emailAddress = $email[ 'email' ];
@endphp

<li class="detail-wrapper">
  <span class="icon"><i class="fas fa-at"></i></span>
  <a href="mailto:{{ $emailAddress }}" title="Email">
    <span class="email">{{ $emailAddress }}</span>
  </a>
</li>
