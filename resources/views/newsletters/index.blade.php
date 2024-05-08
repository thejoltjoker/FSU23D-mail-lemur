<x-layout>
  <h2 class="pt-8 text-2xl font-bold">All newspapers</h2>
  <div class="flex flex-col gap-2 pt-4">
    @foreach ($newsletters as $newsletter)
    <x-newsletter-list-item :newsletter="$newsletter" />
    @endforeach

  </div>
</x-layout>