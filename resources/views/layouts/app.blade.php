@include('partials.header')
{{-- section for background image or color behind the container --}}
<section class="section bg-white border-b py-8">
  {{-- page container, generally centered on the page section --}}
  <div class="container {{ $classes['container'] }}">
    {{-- Main Content Block, can be accompanied by sidebar if loaded --}}
    <main class="main {{  $classes['main'] }}">
      @yield('content')
    </main>

    @hasSection('sidebar')
      <aside class="sidebar {{ $classes['sidebar'] }}">
        @yield('sidebar')
      </aside>
    @endif
  </div>
</section>

@include('partials.footer')
