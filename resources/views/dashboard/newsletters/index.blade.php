<x-dashboard.layout>
  <div class="fixed h-20 w-full z-10">
    <x-dashboard.content-header>
      All newsletters
    </x-dashboard.content-header>
  </div>
  <div class="flex flex-col gap-2 mt-20 z-0">
    @foreach ($newsletters as $newsletter)
    <x-newsletter-list-item :newsletter="$newsletter" />
    @endforeach

  </div>
</x-dashboard.layout>