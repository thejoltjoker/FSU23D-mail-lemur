<x-dashboard.layout>
  <div class="fixed h-20 w-full z-10">
    <x-dashboard.content-header>
      Your subscribers
    </x-dashboard.content-header>
  </div>
  <div class="mt-20">
    <x-dashboard.subscribers.table :subscribers="$subscribers" />
  </div>
</x-dashboard.layout>