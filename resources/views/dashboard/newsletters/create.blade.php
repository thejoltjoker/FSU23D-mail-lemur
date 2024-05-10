<x-dashboard.layout>
  <x-dashboard.content-header>
    Create newsletter
  </x-dashboard.content-header>

  <form method="POST" action="/newsletters" class="w-full max-w-screen-md">
    @csrf
    <sl-card class="card-header w-full">
      <div slot="header" class="font-bold text-center">
        Create newsletter
      </div>
      <div class="flex flex-col gap-4">
        <sl-input placeholder="My Newsletter" label="Title" value="{{old('title')}}" name="title"></sl-input>
        @error('title')
        <p class="text-red-500 text-xs -mt-1">
          {{$message}}
        </p>
        @enderror

        <sl-input placeholder="Short description" label="Description" value="{{old('description')}}" name="description">
        </sl-input>
        @error('description')
        <p class="text-red-500 text-xs -mt-1">
          {{$message}}
        </p>
        @enderror

        @auth
        <div>
          <p>Author</p>
          <p><span class="font-bold">{{auth()->user()->name}}</span>
            <span class="opacity-50">
              &lt;{{auth()->user()->email}}&gt;
            </span>
          </p>
          <input type="hidden" value="{{auth()->id()}}" class="hidden" name="user_id" />
        </div>
        @endauth


        <sl-textarea label="Content" help-text="The content of your newsletter."
          placeholder="Lorem ipsum dolor sit, amet consectetur adipisicing elit..." name="content">
          {{old('content')}}
        </sl-textarea>

        </sl-input>
        @error('content')
        <p class="text-red-500 text-xs -mt-1">
          {{$message}}
        </p>
        @enderror



      </div>
      <div slot="footer" class="flex justify-between">
        <sl-button variant="primary" type="submit">Create</sl-button>
        <sl-button variant="danger" outline>Discard</sl-button>

      </div>
    </sl-card>
  </form>

</x-dashboard.layout>