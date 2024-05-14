<x-dashboard.layout>
  <x-dashboard.content-header>
    <h2 class="text-2xl font-bold">
      Create newsletter
    </h2>
  </x-dashboard.content-header>

  <form method="POST" action="{{route('dashboard.newsletters.update', $newsletter)}}"
    class="w-full max-w-screen-md p-4 mx-auto">
    @csrf
    @method('PUT')
    <div class="flex flex-col gap-4">

      <sl-input placeholder="My Newsletter" label="Title" value="{{$newsletter->title}}" name="title"
        class="[&::part(form-control-label)]:text-lg [&::part(form-control-label)]:mb-2">
      </sl-input>
      @error('title')
      <p class="text-red-500 text-xs -mt-1">
        {{$message}}
      </p>
      @enderror

      <sl-input placeholder="The latest about me" label="Tagline" value="{{$newsletter->tagline}}" name="tagline"
        class="[&::part(form-control-label)]:text-lg [&::part(form-control-label)]:mb-2">
      </sl-input>
      @error('tagline')
      <p class="text-red-500 text-xs -mt-1">
        {{$message}}
      </p>
      @enderror

      <sl-textarea label="Description" name="description"
        class="[&::part(form-control-label)]:text-lg [&::part(form-control-label)]:mb-2"
        value="{{$newsletter->description}}">

      </sl-textarea>

      @error('description')
      <p class="text-red-500 text-xs -mt-1">
        {{$message}}
      </p>
      @enderror

      @auth
      <div>
        <p class="text-lg">Author</p>
        <p><span class="font-bold">{{auth()->user()->name}}</span>
          <span class="opacity-50">
            &lt;{{auth()->user()->email}}&gt;
          </span>
        </p>
        <input type="hidden" value="{{auth()->id()}}" class="hidden" name="user_id" />
      </div>
      @endauth

    </div>
    <div class="mt-8">

      <sl-button variant="primary" type="submit">Update</sl-button>
      <sl-button variant="danger" outline href="{{url()->previous()}}">Discard</sl-button>
    </div>
  </form>
</x-dashboard.layout>