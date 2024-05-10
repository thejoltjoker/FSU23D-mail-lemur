{{-- TODO Change items depending on role --}}
<nav class="flex items-center justify-between px-4 w-full h-12">
  <h1 class="font-bold text-xl">

    <a href="/" class="inline-flex items-center gap-2">
      <sl-icon name="mailbox-flag"></sl-icon>
      Newspaper
    </a>
  </h1>
  <ul class="flex gap-5 items-center">



    @auth
    <li>
      <form method="POST" action="{{route('logout')}}">
        @csrf
        <sl-button type="submit" class="hover:text-[--sl-color-primary-600] transition" variant="text">
          <sl-icon slot="prefix" name="box-arrow-right"></sl-icon>
          Sign out
        </sl-button>
      </form>
    </li>

    @else
    <li>
      <a href="/newsletters" class="hover:text-[--sl-color-primary-600] transition">
        All newsletters
      </a>
    </li>

    <li>
      <a href="/login" class="hover:text-[--sl-color-primary-600] transition">
        Log in
      </a>
    </li>

    <li>
      <a href="/register" class="hover:text-[--sl-color-primary-600] transition">
        Create account
      </a>
    </li>

    @endauth
  </ul>
</nav>