<sl-button variant="neutral" outline type="submit" size="{{$size}}"
    href="{{route('dashboard.newsletters.show', $newsletter->id)}}#subscribers">
    <sl-icon slot="prefix" name="at"></sl-icon>
    Subscribers
</sl-button>