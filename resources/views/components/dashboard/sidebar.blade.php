<aside class="min-h-full border-r border-stone-300 min-w-64 w-64 bg-white">
  @if (Auth::user()->roles->where('name', 'customer')->isNotEmpty())
  <div class="p-4 h-20 flex items-center border-b border-stone-300">
    <sl-button class="w-full" variant="primary" outline href="{{route('dashboard.newsletters.create')}}">
      <a href="{{route('dashboard.newsletters.create')}}">
        <sl-icon name="pencil" slot="prefix"></sl-icon>
        Create
      </a>
    </sl-button>
  </div>
  @endif
  <ul class="py-2">
    <li class="font-bold px-4 pt-2">Newsletters</li>
    <x-dashboard.sidebar.link route="dashboard.newsletters.index" icon="list-ul">
      List all
    </x-dashboard.sidebar.link>
    <x-dashboard.sidebar.link route="dashboard.subscriptions.index" icon="inbox"
      badge="{{Auth::user()->subscriptions->count()}}">
      Subscriptions
    </x-dashboard.sidebar.link>

    {{-- Customer section --}}
    @if (Auth::user()->roles->where('name', 'customer')->isNotEmpty())
    <li class="font-bold px-4 pt-2">Manage</li>
    <x-dashboard.sidebar.link route="dashboard.newsletters.user" icon="envelope-paper">
      My newsletters
    </x-dashboard.sidebar.link>
    <x-dashboard.sidebar.link route="dashboard.subscribers" icon="envelope-at">
      Subscribers
    </x-dashboard.sidebar.link>
    @endif
  </ul>
</aside>