@include("partials._header")
<main class="max-w-screen-lg mx-auto min-h-[calc(100vh-3rem)] relative p-4">
  {{$slot}}
  <x-alert-message />
</main>
@include("partials._footer")