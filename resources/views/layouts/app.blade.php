@include('partials.header')

<div class="container">
  <main class="main {{  $classes['main'] }}">
    @yield('content')
  </main>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif
</div>

@include('partials.footer')
