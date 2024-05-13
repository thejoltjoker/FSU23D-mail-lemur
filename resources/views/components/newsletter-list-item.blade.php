{{-- TODO change button if subscribed --}}
<sl-card class="card-basic w-full">
  <div class="w-full flex items-center">
    <div>
      <h4 class="text-lg font-bold">
        {{$newsletter->title}}
      </h4>
      <p>
        {{$newsletter->tagline}}
      </p>
    </div>
    <div class="ml-auto flex gap-2">
      <sl-button variant="primary" class="" outline href="{{route('dashboard.newsletters.show', $newsletter->id)}}">
        <sl-icon slot="prefix" name="eye"></sl-icon>
        View
      </sl-button>

      <sl-button variant="success" type="submit"
        href="{{route('login')}}?redirect={{route('dashboard.newsletters.show', $newsletter->id)}}">
        <sl-icon slot="prefix" name="bookmark"></sl-icon>
        Subscribe
      </sl-button>
    </div>
  </div>
</sl-card>