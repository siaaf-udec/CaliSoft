@component('components.nav-link', [
  'icon' => 'fa fa-folder-open',
  'link' => '#', 'title' => 'Proyectos'
])
@endcomponent

@component('components.nav-link', [
  'icon' => 'fa fa-percent',
  'link' => route('evaluator.categorias'), 
  'title' => 'Porcentajes'
])
@endcomponent
