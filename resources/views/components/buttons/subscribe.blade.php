<form method="POST" action="{{route('dashboard.subscriptions.store')}}">
  @csrf
  <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
  <sl-button variant="success" type="submit" size="{{$size}}">
      <sl-icon slot="prefix" name="bookmark"></sl-icon>
      Subscribe
  </sl-button>
</form>