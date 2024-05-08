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
    <div class="ml-auto">
      <sl-button variant="primary" class="" outline href="/newsletters/{{$newsletter->id}}">
        <sl-icon slot="prefix" name="eyeglasses"></sl-icon>
        Read more
      </sl-button>
      <sl-button variant="success" class="">
        <sl-icon slot="prefix" name="envelope-plus"></sl-icon>
        Subscribe
      </sl-button>
    </div>
  </div>
</sl-card>