<!-- TODO Add remove button-->
@php
$user = Auth::user();
@endphp
<x-dashboard.layout>
  <div class="fixed h-20 z-10 w-full w-[calc(100vw-18rem)]">
    <x-dashboard.content-header>
      <div class="grid grid-cols-3 w-full">

        <div>
          <sl-button variant="neutral" outline href="{{ url()->previous() }}">
            <sl-icon slot="prefix" name="arrow-left"></sl-icon>
            Go back
          </sl-button>
        </div>

        @if ($newsletter->author->id != $user->id)
        <div class="text-center">
          <x-dashboard.subscribe-button size="medium" :$newsletter :$user />
        </div>
        @elseif ($newsletter->author->id == $user->id)
        <div class="text-center">
          <sl-button variant="primary" outline href="{{ route('dashboard.newsletters.edit', $newsletter) }}">
            <sl-icon slot="prefix" name="pencil"></sl-icon>
            Edit
          </sl-button>
        </div>
        @endif

      </div>

    </x-dashboard.content-header>
  </div>
  <div class="flex flex-col gap-2 mt-20 z-0">
    <div class="relative isolate px-6 pt-14 lg:px-8">
      <div class="mx-auto max-w-screen-md flex flex-col">
        <div class="flex items-end justify-between w-full">
          <h2 class="font-bold text-3xl">
            {{$newsletter->title}}
          </h2>
          <span class="text-base font-normal text-right">
            By {{$newsletter->author->name}}
          </span>
        </div>

        <p class="italic text-lg">
          {{$newsletter->tagline}}
        </p>
        <p class="opacity-50 mb-4">
          Created <sl-relative-time date="{{$newsletter->created_at}}"></sl-relative-time>
        </p>
        <p class="">
          {{$newsletter->description}}
        </p>



        @auth
        @if ($newsletter->author->id == Auth::id())
        <h3 id="subscribers" class="font-bold text-3xl mt-8 mb-2">
          Subscribers
        </h3>
        <div class="flex justify-between flex-col gap-2">
          @foreach ($newsletter->subscriptions as $subscription)
          <sl-card class="card-basic w-full text-sm">
            <div class="w-full flex items-center gap-4">
              <sl-avatar label="User avatar"></sl-avatar>
              <div class="flex flex-col">
                <h4 class="text-base font-bold">
                  {{$subscription->name}}
                </h4>
                <p class="opacity-50">{{$subscription->email}}</p>
              </div>
              <!-- TODO Add remove subscriber functionality -->
              {{-- <sl-button variant="danger" class="ml-auto" outline>Remove</sl-button> --}}
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