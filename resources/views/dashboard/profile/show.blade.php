<x-dashboard.layout>
  <div class="fixed h-20 z-10 w-full w-[calc(100vw-18rem)]">
    <x-dashboard.content-header>
      <h2 class="text-2xl font-bold">My Profile</h2>
    </x-dashboard.content-header>
  </div>
  <div class="flex flex-col gap-2 mt-20 z-0">
    <div class="relative">
      <div class="p-4 flex flex-col text-lg">
        <p class="font-bold">
          Name
        </p>
        <p>
          {{$user->name}}
        </p>
        <p class="font-bold mt-4">
          Email
        </p>
        <p>
          {{$user->email}}
        </p>


        <div class="flex gap-4 mt-16 flex-wrap">
          <p class="font-bold mt-4 w-full">
            Account
          </p>
          <form action="{{route('logout')}}" method="post">
            @csrf
            <sl-button type="submit" variant="neutral">Sign out</sl-button>
          </form>

          <form action="{{route('clear-sessions')}}" method="post">
            @csrf
            <sl-button type="submit" variant="neutral">Sign out everywhere</sl-button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-dashboard.layout>