{{-- general sidebar layout  --}}
@if (!is_page_template('template-sidebar-left.blade.php') && !is_page_template('template-sidebar-right.blade.php'))
@php(dynamic_sidebar('sidebar-primary'))
@endif
{{-- sidebar left layout  --}}
@if (is_page_template('template-sidebar-left.blade.php'))
@php(dynamic_sidebar('sidebar-left'))
@endif
{{-- sidebar right layout  --}}
@if (is_page_template('template-sidebar-right.blade.php'))
@php(dynamic_sidebar('sidebar-right'))
@endif

