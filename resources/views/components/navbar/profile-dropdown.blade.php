<div class="relative group">
  <label for="menu-toggle" class="flex items-center gap-2 h-10 cursor-pointer group-hover:border-stone-200 border border-white rounded-md px-2 peer 
    has-[:checked]:border-stone-300 group-hover:has-[:checked]:border-stone-300 
    has-[:checked]:bg-stone-100 group-hover:has-[:checked]:bg-stone-100">
    <sl-avatar label="User avatar" style="--size:1.5rem"></sl-avatar>
    {{Auth::user()->name}}
    <input type="checkbox" name="menu-toggle" id="menu-toggle" class="hidden">
  </label>

  <ul
    class="absolute top-10 left-0 hidden z-50 bg-white border w-full rounded-md overflow-hidden py-2 peer-has-[:checked]:block">
    <li>
      <a href="/dashboard/profile" class="block py-2 hover:bg-stone-200 px-4">
        Profile
      </a>
    </li>
    <li>
      <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" name="button"
          class="block cursor-pointer w-full h-full text-left py-2 hover:bg-stone-200 px-4">Sign out</button>
      </form>

    </li>
  </ul>
</div>