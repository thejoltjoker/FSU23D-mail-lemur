<x-layout>
  <h2 class="pt-8 text-2xl font-bold">My subscriptions</h2>
  <div class="flex flex-col gap-2 pt-4">
    @foreach ($subscriptions as $subscription)
    <x-newsletter-list-item :newsletter="$subscription" />
    @endforeach

  </div>
</x-layout>