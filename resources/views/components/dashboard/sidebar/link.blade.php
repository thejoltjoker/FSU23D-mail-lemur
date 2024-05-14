<li>
  <a href="{{route($route)}}"
    class="{{ Request::routeIs($route) ? 'bg-stone-200 text-stone-950 border-l-4 border-stone-500' : '' }} inline-flex gap-2 items-center w-full px-4 py-2 text-stone-600 hover:bg-[--sl-color-primary-100] hover:border-l-4 border-0 transition-all hover:text-[--sl-color-primary-800] border-stone-500 hover:border-[--sl-color-primary-500] group">
    <sl-icon name="{{$icon}}">
    </sl-icon>
    {{$slot}}
    @isset($badge)
    <sl-badge variant="primary" pill class="ml-auto">{{$badge}}
    </sl-badge>
    @endisset
  </a>
</li>