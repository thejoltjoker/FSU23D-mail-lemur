<x-dashboard.layout>
  <div class="fixed h-20 w-full z-10">
    <x-dashboard.content-header>
      All newsletters
    </x-dashboard.content-header>
  </div>
  <div class="mt-20">
    <table class="w-full">
      <thead class="text-left font-normal border-b border-stone-300 text-stone-500 text-sm">
        <tr>
          <th class="font-normal px-4 py-2">Title</th>
          <th class="font-normal py-2 pe-2">Subscribers</th>
          <th class="font-normal py-2 pe-4">Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($newsletters as $newsletter)
        <tr class="bg-white border-b border-stone-300">
          <td class="py-4 ps-4">
            <h4 class="text-lg font-bold">
              {{$newsletter->title}}
            </h4>
            <p>
              {{$newsletter->description}}
            </p>
          </td>
          <td>{{$newsletter->subscriptions->count()}}</td>
          <td class="w-1 whitespace-nowrap pe-4">
            <div class="flex gap-2">

              <sl-button variant="primary" class="" outline
                href="{{route('dashboard.newsletters.show', $newsletter->id)}}">
                <sl-icon slot="prefix" name="eyeglasses"></sl-icon>
                View
              </sl-button>
              <x-dashboard.subscribe-button :newsletter="$newsletter" />
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</x-dashboard.layout>