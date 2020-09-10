@if (!is_page_template('template-sidebar-left.blade.php') || !is_page_template('template-sidebar-right.blade.php'))
@php(dynamic_sidebar('sidebar-primary'))
@endif
@if (is_page_template('template-sidebar-left.blade.php'))
@php(dynamic_sidebar('sidebar-left'))
@endif
@if (is_page_template('template-sidebar-right.blade.php'))
@php(dynamic_sidebar('sidebar-right'))
@endif

