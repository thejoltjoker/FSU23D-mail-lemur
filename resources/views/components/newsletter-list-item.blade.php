{{-- TODO change button if subscribed --}}
<sl-card class="card-basic w-full">
  <div class="w-full flex items-center">
    <div>
      <h4 class="text-lg font-bold">
        {{$newsletter->title}}
      </h4>
      <p>
        {{$newsletter->description}}
      </p>
    </div>
    <div class="ml-auto flex gap-2">
      <sl-button variant="primary" class="" outline href="{{route('dashboard.newsletters.show', $newsletter->id)}}">
        <sl-icon slot="prefix" name="eyeglasses"></sl-icon>
        Read more
      </sl-button>
      @if (Auth::user()->subscriptions->where('id', $newsletter->id)->isNotEmpty())
      <form method="POST" action="{{route('dashboard.subscriptions.destroy')}}">
        @method('DELETE')
        @csrf
        <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
        <sl-button variant="danger" outline type="submit">
          <sl-icon slot="prefix" name="envelope-dash"></sl-icon>
          Unsubscribe
        </sl-button>
      </form>
      @else
      <form method="POST" action="{{route('dashboard.subscriptions.store')}}">
        @csrf
        <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
        <sl-button variant="success" type="submit">
          <sl-icon slot="prefix" name="envelope-plus"></sl-icon>
          Subscribe
        </sl-button>
      </form>
      @endif


    </div>
  </div>
</sl-card>