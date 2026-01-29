<nav class="hidden lg:block">
    {!! wp_nav_menu([
      'theme_location' => 'primary_navigation',
      'menu_class' => 'primary-menu flex items-center gap-3 text-sm-regular text-white',
      'container' => false,
      'echo' => false,
    ]) !!}
  </nav>
  