<table class="w-full text-sm">
  <thead class="text-left font-normal border-b border-stone-300 text-stone-400">
    <tr>
      <th class="font-normal px-4 py-2">Title</th>
      <th class="font-normal py-2">Author</th>
      <th class="font-normal py-2">Subscribers</th>
      <th class="font-normal py-2 pe-4">Actions</th>
    </tr>
  </thead>

  <tbody class="">
    @foreach ($newsletters as $newsletter)
    <x-dashboard.newsletters.table-row :newsletter="$newsletter" />
    @endforeach
  </tbody>

</table>