@include("partials._header")
<main class="max-w-screen-lg mx-auto px-4 min-h-[calc(100vh-3rem)] relative">
  {{$slot}}
  <x-alert-message />
</main>
@include("partials._footer")