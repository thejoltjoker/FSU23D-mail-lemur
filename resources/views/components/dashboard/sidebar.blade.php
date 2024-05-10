<aside class="min-h-full border-r border-stone-300 w-80 bg-white">
  <div class="p-4 h-20 flex items-center border-b border-stone-300">
    <sl-button class="w-full" variant="primary" outline href="{{route('dashboard.newsletters.create')}}">
      <a href="{{route('dashboard.newsletters.create')}}">
        <sl-icon name="pencil" slot="prefix"></sl-icon>
        Create
      </a>
    </sl-button>
  </div>
  <ul class="py-2">
    <li class="font-bold px-4 pt-2">Newsletters</li>
    <li>
      <a href="{{route('dashboard.newsletters.index')}}"
        class="{{ Request::routeIs('dashboard.newsletters.index') ? 'active' : '' }} inline-flex gap-2 items-center w-full px-4 py-2">
        <sl-icon name="list-ul">
        </sl-icon>
        List all
      </a>
    </li>
    <li>
      <a href="{{route('dashboard.subscriptions')}}"
        class="{{ Request::routeIs('dashboard.subscriptions') ? 'active' : '' }} inline-flex gap-2 items-center w-full px-4 py-2">
        <sl-icon name="inbox">
        </sl-icon>
        Subscriptions
      </a>
    </li>

    {{-- Customer section --}}
    @if (Auth::user()->roles->where('name', 'customer')->isNotEmpty())
    <li class="font-bold px-4 pt-2">Manage</li>
    <li>
      <a href="{{route('dashboard.newsletters.index')}}"
        class="{{ Request::routeIs('dashboard.newsletters.index') ? 'active' : '' }} inline-flex gap-2 items-center w-full px-4 py-2">
        <sl-icon name="envelope-paper">
        </sl-icon>
        My newsletters
      </a>
    </li>
    <li>
      <a href="{{route('dashboard.subscribers')}}"
        class="{{ Request::routeIs('dashboard.subscribers') ? 'active' : '' }} inline-flex gap-2 items-center w-full px-4 py-2">
        <sl-icon name="envelope-at">
        </sl-icon>
        Subscribers
      </a>
    </li>
    @endif
  </ul>
</aside>