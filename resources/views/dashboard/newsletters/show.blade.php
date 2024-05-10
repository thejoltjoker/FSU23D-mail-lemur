<x-dashboard.layout>
  <div class="fixed h-20 w-full z-10">
    <x-dashboard.content-header>
      {{-- Newsletter #{{$newsletter->id}} --}}
      <sl-button variant="neutral" outline href="{{ url()->previous() }}">
        <sl-icon slot="prefix" name="arrow-left"></sl-icon>
        Go back
      </sl-button>
    </x-dashboard.content-header>
  </div>
  <div class="flex flex-col gap-2 mt-20 z-0">
    <div class="relative isolate px-6 pt-14 lg:px-8">
      <div class="mx-auto max-w-screen-md flex flex-col">
        <h2 class="font-bold text-3xl">
          {{$newsletter->title}} <span class="text-base font-normal">
            By {{$newsletter->author->name}}
          </span>
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

        <div class="flex justify-between mb-8">
          <sl-button variant="neutral" outline href="{{ url()->previous() }}">
            <sl-icon slot="prefix" name="arrow-left"></sl-icon>
            Go back
          </sl-button>

          <!-- TODO Add unsubscribe functionality -->
          
          <sl-button variant="success" class="">
            <sl-icon slot="prefix" name="envelope-plus"></sl-icon>
            Subscribe
          </sl-button>
        </div>

        @auth
        @if ($newsletter->author->id == Auth::id())
        <h3 class="font-bold text-3xl mt-8 mb-2">
          Subscribers
        </h3>
        <div class="flex justify-between flex-col gap-2">
          @foreach ($newsletter->subscribers as $subscriber)
          <sl-card class="card-basic w-full">
            <div class="w-full flex items-center gap-4">
              <sl-avatar label="User avatar"></sl-avatar>
              <div class="flex flex-col">
                <h4 class="text-lg font-bold">
                  {{$subscriber->name}}
                </h4>
                <p class="opacity-50">{{$subscriber->email}}</p>
              </div>
              <!-- TODO Add remove subscriber functionality -->
              <sl-button variant="danger" class="ml-auto" outline>Remove</sl-button>
            </div>
          </sl-card>
          @endforeach
        </div>
        @endif
        @endauth
      </div>
    </div>

  </div>
</x-dashboard.layout>