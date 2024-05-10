@auth
<form method="POST" action="/subscriptions">
  @csrf
  <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
  <sl-button variant="success" type="submit">
    <sl-icon slot="prefix" name="envelope-plus"></sl-icon>
    Subscribe
  </sl-button>
</form>
@else
<sl-button variant="success" href="{{route('login')}}">
  <sl-icon slot="prefix" name="envelope-plus"></sl-icon>
  Subscribe
</sl-button>
@endauth