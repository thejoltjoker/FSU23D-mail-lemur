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
        Edit details
      </sl-button>


      <sl-button variant="danger" outline type="submit">
        <sl-icon slot="prefix" name="envelope-dash"></sl-icon>
        Delete
      </sl-button>


      <sl-button variant="success" type="submit">
        <sl-icon slot="prefix" name="envelope-plus"></sl-icon>
        Send
      </sl-button>


    </div>
  </div>
</sl-card>