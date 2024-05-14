<x-dashboard.layout>
  <div class="fixed h-20 w-full z-10">
    <x-dashboard.content-header>
      <h2 class="text-2xl font-bold">
        Your subscribers
      </h2>
    </x-dashboard.content-header>
  </div>
  <div class="mt-20">
    <x-dashboard.subscribers.table :$newsletters />
  </div>
</x-dashboard.layout>