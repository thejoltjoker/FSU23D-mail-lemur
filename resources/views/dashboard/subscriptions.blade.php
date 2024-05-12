<x-dashboard.layout>
  <div class="fixed h-20 w-full z-10">
    <x-dashboard.content-header>
      My subscriptions
    </x-dashboard.content-header>
  </div>
  <div class="mt-20">
    <x-dashboard.newsletters.table :newsletters="$subscriptions" />
  </div>
</x-dashboard.layout>