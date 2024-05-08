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
      <sl-button variant="primary" class="" outline href="/newsletters/{{$newsletter->id}}">
        <sl-icon slot="prefix" name="eyeglasses"></sl-icon>
        Read more
      </sl-button>
      <form method="POST" action="/subscriptions">
        @csrf
        <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
        <sl-button variant="success" type="submit">
          <sl-icon slot="prefix" name="envelope-plus"></sl-icon>
          Subscribe
        </sl-button>
      </form>
    </div>
  </div>
</sl-card>