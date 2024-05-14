<form method="POST" action="{{route('dashboard.subscriptions.destroy')}}">
  @csrf
  @method('DELETE')
  <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
  <sl-button variant="danger" outline type="submit" size="{{$size}}">
    <sl-icon slot="prefix" name="dash-circle"></sl-icon>
    Unsubscribe
  </sl-button>
</form>