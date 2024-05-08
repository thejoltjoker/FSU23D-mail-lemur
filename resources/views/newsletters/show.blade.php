<x-layout>
  <div class="relative isolate px-6 pt-14 lg:px-8">
    <div class="mx-auto max-w-screen-md flex flex-col">
      <h2 class="font-bold text-3xl">
        {{$newsletter->title}}
      </h2>
      <p class="italic text-lg">
        {{$newsletter->description}}
      </p>
      <p class="opacity-50 mb-4">
        Created <sl-relative-time date="{{$newsletter->created_at}}"></sl-relative-time>
      </p>
      <p class="">
        {{$newsletter->content}}
      </p>
      <div class="mt-8 flex justify-between">
        <sl-button variant="neutral" outline href="{{ url()->previous() }}">
          <sl-icon slot="prefix" name="arrow-left"></sl-icon>
          Go back
        </sl-button>
        <sl-button variant="danger" outline>
          <sl-icon slot="prefix" name="envelope-dash"></sl-icon>
          Unsubscribe
        </sl-button>
        <sl-button variant="success" class="">
          <sl-icon slot="prefix" name="envelope-plus"></sl-icon>
          Subscribe
        </sl-button>
      </div>
    </div>
  </div>
</x-layout>