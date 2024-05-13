<x-layout>
  <div class="flex justify-center items-center h-[calc(100vh-6rem)]">
    <form method="POST" action="/users/authenticate">
      @csrf
      <sl-card class="card-header">
        <div slot="header" class="font-bold text-center">
          Login
        </div>
        <div class="flex flex-col gap-4">
          <input type="hidden" name="redirect" value="{{$request->redirect}}">
          <sl-input placeholder="Email" label="Email" value="{{old('email')}}" name="email"></sl-input>
          @error('email')
          <p class="text-red-500 text-xs -mt-1">
            {{$message}}
          </p>
          @enderror
          <sl-input type="password" placeholder="Password" password-toggle label="Password" name="password"></sl-input>

          <p class="text-sm">Don't have an account? <a href="/register" class="text-[--sl-color-primary-500]">Sign
              up</a></p>
        </div>
        <div slot="footer">
          <sl-button variant="primary" type="submit" class="w-full">Log in</sl-button>

        </div>
      </sl-card>
    </form>
  </div>
</x-layout>