<x-layout>
  <h2 class="pt-8 text-2xl font-bold">Your subscribers</h2>
  <div class="flex flex-col gap-2 pt-4">
    @foreach ($subscribers as $subscriber)
    <x-subscriber-list-item :subscriber="$subscriber" />
    @endforeach
  </div>
</x-layout>