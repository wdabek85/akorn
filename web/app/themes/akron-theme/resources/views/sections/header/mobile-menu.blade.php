{{-- overlay --}}
<div id="mobile-menu-overlay" class="fixed inset-0 z-50 hidden bg-black/50" data-menu-close></div>

{{-- drawer --}}
<aside
  id="mobile-menu"
  class="fixed right-0 top-0 z-50 h-full w-80 translate-x-full bg-white transition-transform duration-200"
  aria-hidden="true"
>
  <div class="flex items-center justify-between border-b px-4 py-4">
    <span class="font-semibold">Menu</span>
    <button type="button" class="h-10 w-10" data-menu-close aria-label="Zamknij menu">✕</button>
  </div>

  <nav class="p-4">
    {!! wp_nav_menu([
      'theme_location' => 'primary_navigation',
      'menu_class' => 'flex flex-col gap-3 text-lg font-semibold',
      'container' => false,
      'echo' => false,
    ]) !!}
  </nav>
</aside>
