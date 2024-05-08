<nav class="max-w-screen-lg mx-auto flex items-center justify-between px-4 w-full h-12">
  <h1 class="font-bold text-xl">

    <a href="/" class="inline-flex items-center gap-2">
      <sl-icon name="mailbox-flag"></sl-icon>
      Newspaper
    </a>
  </h1>
  <ul class="flex gap-5 items-center">

    <li>
      <a href="/newsletters" class="hover:text-[--sl-color-primary-600] transition">
        All newsletters
      </a>
    </li>

    @auth

    <li>
      <sl-dropdown>
        <sl-button slot="trigger" caret>
          <sl-icon slot="prefix" name="person-circle"></sl-icon>
          {{auth()->user()->name}}
        </sl-button>
        <sl-menu>

          <sl-menu-item value="role" disabled>
            <sl-icon slot="prefix" name="person-circle"></sl-icon>
            {{ucfirst(auth()->user()->role)}}
          </sl-menu-item>

          <sl-divider></sl-divider>

          <a href="/newsletters/create">
            <sl-menu-item value="my-newsletter">
              <sl-icon slot="prefix" name="pencil-square"></sl-icon>
              My newsletter
            </sl-menu-item>
          </a>

          <a href="/subscribers">
            <sl-menu-item value="subscribers">
              <sl-icon slot="prefix" name="envelope-at"></sl-icon>
              Subscribers
            </sl-menu-item>
          </a>
          <a href="/subscriptions">
            <sl-menu-item value="subscriptions">
              <sl-icon slot="prefix" name="inbox"></sl-icon>
              Subscriptions
            </sl-menu-item>
          </a>
          <form action="/logout" method="POST" class="w-full">
            @csrf
            <sl-menu-item value="logout" type="submit">
              <button type="submit" class="w-full text-left">
                <sl-icon slot="prefix" name="box-arrow-right"></sl-icon>
                Sign out
              </button>
            </sl-menu-item>

          </form>
        </sl-menu>
      </sl-dropdown>
    </li>
    @else
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