@include("partials._header")
<main class="min-h-[calc(100vh-3rem)] relative p-4">
  {{$slot}}
  <x-alert-message />
</main>
@include("partials._footer")