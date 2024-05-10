<x-layout>
  <div class="flex justify-center items-center h-[calc(100vh-6rem)]">
    <form method="POST" action="/reset-password">
      @csrf
      <sl-card class="card-header">
        <div slot="header" class="font-bold text-center">
          Reset password
        </div>
        <div class="flex flex-col gap-4">
          <sl-input placeholder="Email" label="Email" value="{{old('email')}}" name="email"></sl-input>
          @error('email')
          <p class="text-red-500 text-xs -mt-1">
            {{$message}}
          </p>
          @enderror

        </div>
        <div slot="footer">
          <sl-button variant="primary" type="submit" class="w-full">Reset password</sl-button>

        </div>
      </sl-card>
    </form>
  </div>
</x-layout>