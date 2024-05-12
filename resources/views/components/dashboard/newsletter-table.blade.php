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
          <sl-button variant="primary" class="" outline href="{{route('dashboard.newsletters.show', $newsletter->id)}}">
            <sl-icon slot="prefix" name="eyeglasses"></sl-icon>
            View
          </sl-button>
          @if (Auth::user()->subscriptions->where('id', $newsletter->id)->isNotEmpty())
          <form method="POST" action="{{route('dashboard.subscriptions.destroy')}}">
            @method('DELETE')
            @csrf
            <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
            <sl-button variant="danger" outline type="submit" class="w-36">
              <sl-icon slot="prefix" name="envelope-dash"></sl-icon>
              Unsubscribe
            </sl-button>
          </form>
          @else
          <form method="POST" action="{{route('dashboard.subscriptions.store')}}">
            @csrf
            <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
            <sl-button variant="success" type="submit" class="w-36">
              <sl-icon slot="prefix" name="envelope-plus"></sl-icon>
              Subscribe
            </sl-button>
          </form>
          @endif
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>