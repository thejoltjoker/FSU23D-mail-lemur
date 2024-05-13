@auth
{{redirect(route('dashboard.newsletters.index'))}}
@endauth
<x-layout>
    <ul>
        @foreach ($newsletters as $newsletter)
        <x-newsletter-list-item :newsletter="$newsletter" />
        @endforeach
    </ul>
</x-layout>