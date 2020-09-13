@include('partials.header')
{{-- section for background image or color behind the container --}}
<section class="section-top bg-white border-b py-8">
  {{-- page container, generally centered on the page section --}}
  <div class="container {{ $classes['container'] }}">
    {{-- flex wrap block allowing items to wrap --}}
    <div class="flex {{ $classes['reverse'] }} flex-wrap">
      {{-- main content block, can be accompanied by sidebar if loaded --}}
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
