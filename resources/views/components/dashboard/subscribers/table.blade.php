<table class="w-full text-sm">
  <thead class="text-left font-normal border-b border-stone-300 text-stone-400">
    <tr>
      <th class="font-normal px-4 py-2">Name</th>
      <th class="font-normal py-2">Email</th>
      <th class="font-normal py-2">Newsletter</th>
      {{-- <th class="font-normal py-2 pe-4">Actions</th> --}}
    </tr>
  </thead>

  <tbody class="">
    @foreach ($subscribers as $subscriber)
    {{-- {{dd($subscriber)}} --}}
    <x-dashboard.subscribers.table-row :subscriber="$subscriber" />
    @endforeach
  </tbody>

</table>