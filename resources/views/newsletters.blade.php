@auth
{{redirect(route('dashboard.newsletters.index'))}}
@endauth
<x-layout>
    <h2 class="text-center text-2xl font-bold my-4">
        All newsletters
    </h2>
    <div class="mx-auto max-w-screen-md flex flex-col gap-2">
        @foreach ($newsletters as $newsletter)
        <x-newsletter-list-item :newsletter="$newsletter" />
        @endforeach
    </div>
</x-layout>