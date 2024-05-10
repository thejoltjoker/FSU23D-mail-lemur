@include("partials._header")
<main class="min-h-[calc(100vh-3rem)] relative flex border-t w-full border-stone-300 bg-stone-100">
    <x-dashboard.sidebar />
    <section class="p-4 w-full overflow-y-auto h-[calc(100vh-3rem-2px)] relative">
        {{ $slot }}
    </section>
    <x-alert-message />
</main>
@include("partials._footer")