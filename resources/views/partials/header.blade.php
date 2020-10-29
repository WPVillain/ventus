<header id="nav-header" class="sticky top-0 z-50 max-h-screen pt-4 overflow-auto transition-shadow duration-300 bg-white lg:relative lg:pt-10 overscroll-contain">
  <div class="container flex mx-auto header">
    <div class="flex flex-col flex-1">
      <div class="flex items-end justify-between px-4 mb-4 lg:mb-10 lg:pl-10">
        <a href="{{ home_url('/') }}">
          <img src="@asset('images/logos/logotype_ah_lama_final.png')" alt="Ah-Lama" class="w-48 max-w-sm lg:w-full">
        </a>
      </div>
      <nav class="border-t border-solid">
        <button id="btn-toggle-nav-menu" class="flex px-4 py-2 lg:hidden text-theme-yellow">Menu</button>
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation',
          'depth'           => 2,
          'container'       => 'div',
          'container_class' => 'nav-menu-wrapper hidden lg:block pl-4 lg:pl-0',
          'container_id'    => 'nav-menu-wrapper',
          'menu_class'      => 'nav-menu flex-col lg:flex-row',
          'fallback_cb'     => 'Tailwind_Navwalker::fallback',
          'walker'          => new Tailwind_Navwalker(),]) !!}
        @endif
      </nav>
    
  </div>
</header>