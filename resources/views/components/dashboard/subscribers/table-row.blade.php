<tr class="bg-white border-b border-stone-300 hover:bg-stone-50 transition">
  <td class="py-4 ps-4">
    <a class="text-base font-bold transition-all">
      {{$user->name}}
    </a>

  </td>
  <td>
    <p class="text-stone-500">
      {{$user->email}}
    </p>
  <td>
    <a href="{{route('dashboard.newsletters.show', $newsletter)}}" class="text-[--sl-color-primary-600]">
      {{$newsletter->title}}
      {{-- {{$user->subscription}} --}}
    </a>
  </td>

  {{-- <td class="w-1 whitespace-nowrap pe-4">
    <div class="flex gap-2">
      <x-dashboard.subscribers.subscriber-button :newsletter="$subscriber" />
    </div>
  </td> --}}
</tr>